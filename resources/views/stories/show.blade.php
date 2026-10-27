@extends('layouts.app')

@section('title', $story->title.' — Go-Dongeng')
@section('content')
    @push('head')<link rel="canonical" href="{{ url('/'.ltrim($story->uri, '/')) }}">@endpush
    <div class="story-topline"><a href="{{ route('home') }}">Beranda</a><span>/</span><a href="{{ route('stories.category', $story->tag) }}">{{ ucfirst($story->tag) }}</a><span>/</span><span>{{ $story->title }}</span></div>
    @include('partials.ad', ['slot' => config('ads.slots.leaderboard')])

    <section class="story-detail-hero">
        <div class="detail-book-scene">
            <span class="float-spark detail-spark-one" aria-hidden="true">✦</span>
            <div class="book-3d detail-book" data-tilt>
                <span class="book-pages" aria-hidden="true"></span><span class="book-spine" aria-hidden="true"></span>
                <span class="book-cover"><img src="{{ $story->image_url }}" alt="Sampul {{ $story->title }}"><span class="cover-shade"></span><span class="cover-title">{{ $story->title }}</span><span class="cover-brand">GO-DONGENG · {{ strtoupper($story->tag) }}</span></span>
            </div>
            <span class="hero-book-shadow" aria-hidden="true"></span>
        </div>
        <div class="detail-intro">
            <span class="eyebrow eyebrow-pill">{{ ucfirst($story->tag) }} <span class="status-dot"></span> Buku cerita bergambar</span>
            <h1>{{ $story->title }}</h1>
            <p class="detail-lede">{{ strip_tags((string) ($story->description ?? '')) }}</p>
            <div class="story-meta"><span>◷ 5 menit membaca</span><span>✧ Cocok dibaca bersama</span></div>
            <a class="button" href="#isi-cerita">Buka halaman cerita <span aria-hidden="true">↓</span></a>
        </div>
    </section>

    <div class="story-reading-layout" id="isi-cerita">
        <article class="story-reading">
            <span class="eyebrow">Cerita dimulai</span>
            <h2>{{ $story->title }}</h2>
            @if (! empty($story->sections))
                @foreach ($story->sections as $section)
                    <section class="story-page-block">
                        @if ($section['picture'])
                            <figure class="illustration-frame" data-tilt-card>
                                <img src="{{ $section['picture'] }}" alt="Ilustrasi cerita {{ $story->title }}" loading="lazy">
                                <span class="illustration-edge" aria-hidden="true"></span>
                            </figure>
                        @endif
                        @if ($section['text'] !== '')<p class="story-prose">{{ strip_tags($section['text']) }}</p>@endif
                    </section>
                    @if ($loop->iteration === 1)
                        @include('partials.ad', ['slot' => config('ads.slots.inline')])
                    @endif
                @endforeach
            @elseif (! empty($story->description))
                <p class="story-prose">{{ strip_tags($story->description) }}</p>
            @else
                <p class="story-prose">Pada suatu hari, dimulailah sebuah petualangan. Buka kembali cerita ini bersama keluarga untuk membaca kisah lengkapnya.</p>
            @endif

            <div class="story-ending"><span>✦</span><p>Terima kasih sudah membaca bersama Go-Dongeng.</p></div>

            <section class="comments-section" id="komentar">
                <div class="section-heading compact"><div><span class="eyebrow">Ruang berbagi</span><h2>Pesan untuk cerita ini</h2></div></div>
                @if ($story->comments?->isNotEmpty())
                    <div class="comment-list">
                        @foreach ($story->comments as $comment)
                            <article class="comment-card"><strong>{{ $comment->commentator }}</strong><time>{{ $comment->created_on }}</time><p>{{ $comment->comment }}</p></article>
                        @endforeach
                    </div>
                @endif
                <form class="comment-form" method="post" action="{{ route('legacy.comment', $story->id_art_user_category) }}">
                    @csrf
                    <label>Nama<input name="commentator" value="{{ old('commentator') }}" required maxlength="100" autocomplete="name"></label>
                    <label>Pesan<textarea name="comment" rows="4" required maxlength="2000">{{ old('comment') }}</textarea></label>
                    <label class="website-field">Website<input type="url" name="website" value="{{ old('website') }}" maxlength="255" tabindex="-1" autocomplete="off"></label>
                    @error('comment')<p class="form-error">{{ $message }}</p>@enderror
                    <button class="button" type="submit">Kirim pesan</button>
                </form>
            </section>
        </article>

        <aside class="story-sidebar">
            <div class="sidebar-card"><span class="eyebrow">Sampul cerita</span><img class="sidebar-cover" src="{{ $story->image_url }}" alt="Sampul {{ $story->title }}" loading="lazy"><strong>{{ $story->title }}</strong><span class="tag-label">{{ ucfirst($story->tag) }}</span></div>
            @include('partials.ad', ['slot' => config('ads.slots.sidebar')])
            @if ($advertisements?->image_ads_sidebar)
                <a class="sponsor-card" href="{{ $advertisements->url_ads_sidebar ?: '#' }}" rel="sponsored noopener" target="_blank"><img src="{{ asset('assets/theme/default/images/content/'.basename($advertisements->image_ads_sidebar)) }}" alt="Mitra Go-Dongeng" loading="lazy"></a>
            @endif
            <div class="sidebar-note"><span>☼</span><p>Temukan waktu tenang, lalu baca cerita ini bersama orang tersayang.</p></div>
        </aside>
    </div>

    @if ($related->isNotEmpty())
        <section class="related-section">
            <div class="section-heading"><div><span class="eyebrow">Halaman berikutnya</span><h2>Cerita lain untuk dijelajahi</h2></div><a class="text-link" href="{{ route('stories.category', $story->tag) }}">Lihat semuanya ↗</a></div>
            <div class="story-grid related-grid">@foreach ($related as $item)@include('partials.book-card', ['story' => $item])@endforeach</div>
            @include('partials.ad', ['slot' => config('ads.slots.article_sidebar')])
        </section>
    @endif
@endsection
