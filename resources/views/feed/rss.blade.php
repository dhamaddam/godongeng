{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<rss version="2.0"><channel><title>Go-Dongeng</title><link>{{ $feedUrl }}</link><description>Dongeng, fabel, dan cerita bergambar untuk keluarga.</description><language>id-ID</language>
@foreach ($stories as $story)<item><title>{{ $story->title }}</title><link>{{ url('/'.ltrim($story->uri, '/')) }}</link><guid>{{ url('/'.ltrim($story->uri, '/')) }}</guid><description>{{ strip_tags((string) ($story->description ?? '')) }}</description><pubDate>{{ $story->created_on ? \Illuminate\Support\Carbon::parse($story->created_on)->toRfc2822String() : now()->toRfc2822String() }}</pubDate></item>@endforeach
</channel></rss>
