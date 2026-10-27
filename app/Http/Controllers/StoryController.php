<?php

namespace App\Http\Controllers;

use App\Services\LegacyStoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class StoryController extends Controller
{
    public function __construct(private readonly LegacyStoryRepository $stories) {}

    public function index(): View
    {
        $stories = $this->stories->stories(null, 60);

        return view('stories.index', [
            'stories' => $stories,
            'featured' => $stories->first(),
            'activeTag' => 'all',
            'advertisements' => $this->stories->advertisements()->first(),
        ]);
    }

    public function category(string $tag): View
    {
        if ($tag === 'buku-dongeng-anak') {
            $tag = 'dongeng';
        }

        abort_unless(in_array($tag, ['dongeng', 'fabel', 'folklore'], true), 404);
        $stories = $this->stories->stories($tag, 60);

        return view('stories.index', [
            'stories' => $stories,
            'featured' => $stories->first(),
            'activeTag' => $tag,
            'advertisements' => $this->stories->advertisements()->first(),
        ]);
    }

    public function showByPath(Request $request, string $path): View
    {
        $story = $this->stories->findByUri($path);
        abort_if($story === null, 404);

        $related = $this->stories->stories($story->tag ?? null, 4)
            ->reject(fn (object $item): bool => ($item->id_art_user_category ?? null) === ($story->id_art_user_category ?? null));

        return view('stories.show', [
            'story' => $story,
            'related' => $related,
            'activeTag' => $story->tag,
            'advertisements' => $this->stories->advertisements()->first(),
        ]);
    }

    public function author(string $author): View
    {
        return view('stories.index', [
            'stories' => $this->stories->stories(null, 18),
            'featured' => null,
            'activeTag' => 'all',
            'author' => Str::of($author)->replace('-', ' ')->title()->toString(),
            'advertisements' => $this->stories->advertisements()->first(),
        ]);
    }

    public function comment(Request $request, string $id): RedirectResponse|JsonResponse
    {
        $data = $request->validate([
            'commentator' => ['required', 'string', 'max:100'],
            'comment' => ['required', 'string', 'max:2000'],
            'website' => ['nullable', 'url', 'max:255'],
        ]);

        if (! $this->stories->addComment($id, $data)) {
            if ($request->expectsJson()) {
                return response()->json(['status' => false, 'message' => 'Komentar belum dapat disimpan.'], 422);
            }

            return back()->withErrors(['comment' => 'Komentar belum dapat disimpan. Periksa koneksi database Go-Dongeng.'])->withInput();
        }

        if ($request->expectsJson()) {
            return response()->json(['status' => true]);
        }

        return back()->with('status', 'Terima kasih. Komentar menunggu moderasi.');
    }

    public function showJson(string $id)
    {
        $story = $this->stories->findByUri($id);
        abort_if($story === null, 404);

        return response()->json([
            'description' => $story->description ?? '',
            'paragraph1' => $story->attributes['paragraph1'] ?? '',
            'paragraph2' => $story->attributes['paragraph2'] ?? '',
            'paragraph3' => $story->attributes['paragraph3'] ?? '',
            'tag' => $story->tag,
            'status' => true,
            'id' => $story->id_art_user_category,
        ]);
    }

    public function allArticles()
    {
        return response()->json($this->stories->stories(null, 250)->map(fn (object $story): array => [
            'title' => $story->title,
            'picture' => $story->picture,
            'id_art_user_category' => $story->id_art_user_category,
            'uri' => $story->uri,
            'created_on' => $story->created_on,
        ]));
    }

    public function updateArticle(Request $request)
    {
        $data = $request->validate([
            'id' => ['required', 'string', 'max:80'],
            'description' => ['nullable', 'string', 'max:15000'],
            'paragraph1' => ['nullable', 'string', 'max:15000'],
            'paragraph2' => ['nullable', 'string', 'max:15000'],
            'paragraph3' => ['nullable', 'string', 'max:15000'],
        ]);

        $id = $data['id'];
        unset($data['id']);

        if (! $this->stories->updateAttributes($id, $data)) {
            return response()->json(['status' => false, 'message' => 'Cerita belum dapat diperbarui.'], 422);
        }

        return response()->json(['status' => true]);
    }

    public function uploadPicture(Request $request)
    {
        $attributes = ['picture_description', 'first_picture', 'second_picture', 'third_picture', 'fourth_picture'];
        $rules = ['id' => ['required', 'string', 'max:80']];

        foreach ($attributes as $attribute) {
            $rules[$attribute] = ['sometimes', 'image', 'mimes:jpg,jpeg,png,webp', 'max:6144'];
        }

        $data = $request->validate($rules);
        $attribute = collect($attributes)->first(fn (string $field): bool => $request->hasFile($field));

        if ($attribute === null) {
            return response()->json(['status' => false, 'message' => 'Pilih gambar terlebih dahulu.'], 422);
        }

        $file = $request->file($attribute);
        $file = is_array($file) ? reset($file) : $file;
        $imageName = Str::uuid()->toString().'.'.$file->extension();
        $file->move(public_path('assets/theme/default/images/content'), $imageName);

        if (! $this->stories->updatePicture($data['id'], $attribute, $imageName)) {
            @unlink(public_path('assets/theme/default/images/content/'.$imageName));

            return response()->json(['status' => false, 'message' => 'Gambar belum dapat disimpan.'], 422);
        }

        return response('<img src="'.e(asset('assets/theme/default/images/content/'.$imageName)).'" alt="Ilustrasi cerita" loading="lazy">');
    }

    public function loadMore(Request $request)
    {
        $page = max(1, $request->integer('page', 1));
        $stories = $this->stories->stories(null, 250)->slice(($page - 1) * 3, 3)->values();

        return response()->json($stories);
    }
}
