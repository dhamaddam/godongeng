<?php

namespace App\Services;

use Illuminate\Database\Connection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class LegacyStoryRepository
{
    public function stories(?string $tag = null, int $limit = 18): Collection
    {
        if ($this->isConfigured()) {
            try {
                $query = $this->connection()->table('article')
                    ->select('id_article', 'id_art_user_category', 'title', 'picture', 'uri', 'created_on', 'updated_on', 'tag', 'description')
                    ->whereNotNull('uri');

                if ($tag !== null && $tag !== '' && $tag !== 'all') {
                    $query->where('tag', $tag);
                }

                $stories = $query->orderByDesc('created_on')->limit($limit)->get();

                if ($stories->isNotEmpty()) {
                    return $stories->map(fn (object $story): object => $this->normalizeStory($story));
                }
            } catch (Throwable) {
                // Keep local preview available until the legacy database is configured.
            }
        }

        return $this->fallbackStories($tag, $limit);
    }

    public function findByUri(string $uri): ?object
    {
        $path = trim(rawurldecode($uri), '/');

        if ($this->isConfigured()) {
            try {
                $story = $this->connection()->table('article')
                    ->where('uri', $path)
                    ->orWhere('uri', '/'.$path)
                    ->orWhere('id_art_user_category', $path)
                    ->first();

                if ($story !== null) {
                    return $this->withStoryDetails($story);
                }
            } catch (Throwable) {
                // Keep local stories available when the legacy database is offline.
            }
        }

        $slug = Str::slug(pathinfo($path, PATHINFO_FILENAME) ?: basename($path));

        return $this->fallbackStories(null, 250)->first(function (object $story) use ($path, $slug): bool {
            return trim($story->uri, '/') === $path || $story->slug === $slug;
        });
    }

    public function comments(string $storyId): Collection
    {
        if (! $this->isConfigured()) {
            return collect();
        }

        try {
            return $this->connection()->table('comments')
                ->select('comment', 'commentator', 'website', 'created_on')
                ->where('id_art_user_category', $storyId)
                ->where('status', 1)
                ->where('created_on', '<=', now())
                ->orderByDesc('created_on')
                ->limit(20)
                ->get();
        } catch (Throwable) {
            return collect();
        }
    }

    public function advertisements(): Collection
    {
        if (! $this->isConfigured()) {
            return collect();
        }

        try {
            return $this->connection()->table('advertisement')->get();
        } catch (Throwable) {
            return collect();
        }
    }

    public function addComment(string $storyId, array $comment): bool
    {
        if (! $this->isConfigured()) {
            return false;
        }

        try {
            $this->connection()->table('comments')->insert([
                'id_art_user_category' => $storyId,
                'commentator' => $comment['commentator'],
                'comment' => $comment['comment'],
                'website' => $comment['website'] ?? '',
                'created_on' => now()->toDateString(),
                'status' => 0,
            ]);

            return true;
        } catch (Throwable) {
            return false;
        }
    }

    public function updateAttributes(string $storyId, array $attributes): bool
    {
        if (! $this->isConfigured()) {
            return false;
        }

        $allowed = ['description', 'paragraph1', 'paragraph2', 'paragraph3'];

        try {
            return $this->connection()->transaction(function () use ($storyId, $attributes, $allowed): bool {
                foreach ($attributes as $name => $value) {
                    if (! in_array($name, $allowed, true)) {
                        continue;
                    }

                    $query = $this->connection()->table('global_article')
                        ->where('id_art_user_category', $storyId)
                        ->where('attribute', $name);

                    if ($query->exists()) {
                        $query->update(['value' => $value]);
                    } else {
                        $this->connection()->table('global_article')->insert([
                            'id_art_user_category' => $storyId,
                            'attribute' => $name,
                            'value' => $value,
                        ]);
                    }
                }

                return true;
            });
        } catch (Throwable) {
            return false;
        }
    }

    public function updatePicture(string $storyId, string $attribute, string $imageName): bool
    {
        $allowed = ['picture_description', 'first_picture', 'second_picture', 'third_picture', 'fourth_picture'];

        if (! $this->isConfigured() || ! in_array($attribute, $allowed, true)) {
            return false;
        }

        try {
            $query = $this->connection()->table('global_article')
                ->where('id_art_user_category', $storyId)
                ->where('attribute', $attribute);

            if ($query->exists()) {
                $query->update(['value' => $imageName]);
            } else {
                $this->connection()->table('global_article')->insert([
                    'id_art_user_category' => $storyId,
                    'attribute' => $attribute,
                    'value' => $imageName,
                ]);
            }

            return true;
        } catch (Throwable) {
            return false;
        }
    }

    public function saveStory(array $story, int $userId, string $imageName): ?string
    {
        if (! $this->isConfigured()) {
            return null;
        }

        try {
            return $this->connection()->transaction(function () use ($story, $userId, $imageName): string {
                $connection = $this->connection();
                $categoryId = (int) ($connection->table('category')->where('alias', $story['tag'])->value('id') ?? 32);
                $prefix = str_pad((string) $userId, 3, '0', STR_PAD_LEFT)
                    .str_pad((string) $categoryId, 2, '0', STR_PAD_LEFT);

                $articleId = $connection->table('article')->insertGetId([
                    'id_art_user_category' => $prefix,
                    'title' => $story['title'],
                    'picture' => $imageName,
                    'rating' => 1,
                    'tag' => $story['tag'],
                    'is_viewed' => 1,
                    'created_on' => now()->toDateTimeString(),
                ], 'id_article');

                $key = $prefix.str_pad((string) $articleId, 4, '0', STR_PAD_LEFT);
                $uri = 'p/cerita-dongeng-bergambar/'.Str::slug($story['title']);

                $connection->table('article')->where('id_article', $articleId)->update([
                    'id_art_user_category' => $key,
                    'uri' => $uri,
                ]);

                $attributes = [
                    'picture_description' => $imageName,
                    'description' => $story['description'],
                    'paragraph1' => $story['paragraph1'] ?? '',
                    'paragraph2' => $story['paragraph2'] ?? '',
                    'paragraph3' => $story['paragraph3'] ?? '',
                    'first_picture' => $imageName,
                    'second_picture' => $imageName,
                    'third_picture' => $imageName,
                    'fourth_picture' => $imageName,
                    'tag' => $story['tag'],
                ];

                foreach ($attributes as $attribute => $value) {
                    $connection->table('global_article')->insert([
                        'id_art_user_category' => $key,
                        'attribute' => $attribute,
                        'value' => $value,
                    ]);
                }

                return $uri;
            });
        } catch (Throwable) {
            return null;
        }
    }

    public function legacyIsConfigured(): bool
    {
        return $this->isConfigured();
    }

    private function isConfigured(): bool
    {
        return filled(config('database.connections.legacy.database'));
    }

    private function connection(): Connection
    {
        return DB::connection('legacy');
    }

    private function withStoryDetails(object $story): object
    {
        $attributes = [];

        try {
            $attributes = $this->connection()->table('global_article')
                ->where('id_art_user_category', $story->id_art_user_category)
                ->pluck('value', 'attribute')
                ->all();
        } catch (Throwable) {
            // Some older installations keep story text on the article row.
        }

        $story = $this->normalizeStory($story);
        $story->attributes = $attributes;
        $story->description = $attributes['description'] ?? $story->description ?? '';
        $story->sections = $this->sectionsFromAttributes($attributes, $story->picture);
        $story->comments = $this->comments((string) ($story->id_art_user_category ?? ''));

        return $story;
    }

    private function normalizeStory(object $story): object
    {
        $story->title = (string) ($story->title ?? 'Cerita Go-Dongeng');
        $story->picture = (string) ($story->picture ?? 'background-go-dongeng.png');
        $story->tag = strtolower((string) ($story->tag ?? 'dongeng'));
        $story->uri = trim((string) ($story->uri ?? ''), '/');
        $story->slug = Str::slug(pathinfo($story->picture, PATHINFO_FILENAME) ?: $story->title);
        $story->image_url = $this->imageUrl($story->picture);

        return $story;
    }

    private function fallbackStories(?string $tag, int $limit): Collection
    {
        $directory = public_path('assets/theme/default/images/content');
        $files = glob($directory.'/Cerita*') ?: [];
        $stories = collect($files)
            ->filter(fn (string $file): bool => ! str_contains(strtolower(basename($file)), 'mobile_')
                && ! preg_match('/-part[2-9][0-9]*\./i', basename($file)))
            ->map(function (string $file): object {
                $picture = basename($file);
                $title = preg_replace('/^cerita[-_]?/i', '', pathinfo($picture, PATHINFO_FILENAME)) ?? pathinfo($picture, PATHINFO_FILENAME);
                $title = preg_replace('/[-_]?part1$/i', '', $title) ?? $title;
                $title = Str::of(str_replace(['-', '_'], ' ', $title))->squish()->title()->toString();
                $tag = Str::contains(strtolower($picture), 'fabel') ? 'fabel'
                    : (Str::contains(strtolower($picture), 'folklore') ? 'folklore' : 'dongeng');
                $slug = Str::slug(pathinfo($picture, PATHINFO_FILENAME));

                return (object) [
                    'id_art_user_category' => $slug,
                    'title' => $title,
                    'picture' => $picture,
                    'uri' => 'cerita/'.$slug,
                    'created_on' => null,
                    'updated_on' => null,
                    'tag' => $tag,
                    'description' => 'Buka buku ini dan temukan cerita tentang '.Str::lower($title).'.',
                    'slug' => $slug,
                    'image_url' => $this->imageUrl($picture),
                    'attributes' => [],
                    'sections' => [],
                    'comments' => collect(),
                ];
            })
            ->filter(fn (object $story): bool => $tag === null || $tag === '' || $tag === 'all' || $story->tag === $tag)
            ->sortBy('title')
            ->values();

        return $stories->take($limit);
    }

    private function sectionsFromAttributes(array $attributes, string $cover): array
    {
        $sections = [];
        $pairs = [
            ['picture_description', 'description'],
            ['first_picture', 'paragraph1'],
            ['second_picture', 'paragraph2'],
            ['third_picture', 'paragraph3'],
            ['fourth_picture', 'paragraph4'],
        ];

        foreach ($pairs as [$pictureKey, $textKey]) {
            $text = trim((string) ($attributes[$textKey] ?? ''));
            $picture = trim((string) ($attributes[$pictureKey] ?? ''));

            if ($text !== '' || $picture !== '') {
                $sections[] = [
                    'picture' => $this->imageUrl($picture !== '' ? $picture : $cover),
                    'text' => $text,
                ];
            }
        }

        return $sections;
    }

    private function imageUrl(string $picture): string
    {
        $picture = basename($picture);
        $path = 'assets/theme/default/images/content/'.$picture;

        return file_exists(public_path($path)) ? asset($path) : asset('assets/theme/default/images/content/background-go-dongeng.png');
    }
}
