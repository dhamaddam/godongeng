@extends('layouts.app')

@section('title', isset($author) ? 'Cerita oleh '.$author.' — Go-Dongeng' : 'Baca Dongeng, Fabel & Cerita Rakyat — Go-Dongeng')

@section('content')
    <section class="hero-section">
        <div class="hero-copy">
            <span class="eyebrow eyebrow-pill"><span class="status-dot"></span> Rak cerita keluarga Indonesia</span>
            <h1>Masuk ke dunia<br><em>cerita</em> berikutnya.</h1>
            <p>Dongeng, fabel, dan cerita rakyat hadir seperti buku kecil yang bisa kamu putar, jelajahi, dan baca bersama.</p>
            <div class="hero-actions">
                <a class="button" href="#rak-cerita">Jelajahi cerita <span aria-hidden="true">↓</span></a>
                <a class="text-link" href="{{ route('stories.category', 'dongeng') }}">Mulai dari dongeng <span aria-hidden="true">↗</span></a>
            </div>
            <div class="hero-proof"><span class="avatar-stack" aria-hidden="true"><i>✿</i><i>☼</i><i>✦</i></span><span>Untuk dibaca bersama, kapan saja.</span></div>
        </div>
        @if ($featured)
            <div class="hero-art" aria-label="Buku cerita 3D interaktif">
                <span class="float-spark spark-one" aria-hidden="true">✦</span>
                <span class="float-spark spark-two" aria-hidden="true">✧</span>
                <span class="float-spark spark-three" aria-hidden="true">✺</span>
                <div class="hero-book-scene">
                    <div class="book-3d hero-book" data-tilt>
                        <span class="book-pages" aria-hidden="true"></span>
                        <span class="book-spine" aria-hidden="true"></span>
                        <span class="book-cover">
                            <img src="{{ $featured->image_url }}" alt="Sampul {{ $featured->title }}" fetchpriority="high">
                            <span class="cover-shade" aria-hidden="true"></span>
                            <span class="cover-title">{{ $featured->title }}</span>
                            <span class="cover-brand">GO-DONGENG · {{ strtoupper($featured->tag) }}</span>
                        </span>
                    </div>
                    <span class="hero-book-shadow" aria-hidden="true"></span>
                </div>
                <div class="floating-note"><span class="note-icon">☼</span><span><small>PILIHAN HARI INI</small><strong>{{ $featured->title }}</strong></span></div>
            </div>
        @else
            <div class="hero-art hero-art-empty"><div class="empty-orbit">✦</div><span>Setiap gambar menyimpan sebuah cerita.</span></div>
        @endif
        <span class="hero-index" aria-hidden="true">01 <i></i> 04</span>
    </section>

    @include('partials.ad', ['slot' => config('ads.slots.leaderboard')])

    <section class="collection-section" id="rak-cerita">
        <div class="section-heading">
            <div><span class="eyebrow">Koleksi Go-Dongeng</span><h2>{{ isset($author) ? 'Cerita oleh '.$author : 'Pilih suasana ceritamu' }}</h2></div>
            <p>Setiap ilustrasi tampil sebagai sampul buku tiga dimensi. Arahkan kursor atau sentuh untuk melihatnya bergerak.</p>
        </div>
        <div class="category-switch" role="navigation" aria-label="Pilih kategori cerita">
            <a class="theme-chip {{ $activeTag === 'all' ? 'is-active' : '' }}" href="{{ route('stories.index') }}" data-theme-choice="dongeng">Semua cerita <span>✦</span></a>
            <a class="theme-chip {{ $activeTag === 'dongeng' ? 'is-active' : '' }}" href="{{ route('stories.category', 'dongeng') }}" data-theme-choice="dongeng">Dongeng</a>
            <a class="theme-chip {{ $activeTag === 'fabel' ? 'is-active' : '' }}" href="{{ route('stories.category', 'fabel') }}" data-theme-choice="fabel">Fabel</a>
            <a class="theme-chip {{ $activeTag === 'folklore' ? 'is-active' : '' }}" href="{{ route('stories.category', 'folklore') }}" data-theme-choice="folklore">Cerita rakyat</a>
        </div>

        @if ($stories->isNotEmpty())
            <div class="story-grid">
                @foreach ($stories as $story)
                    @if (! $featured || $story->id_art_user_category !== $featured->id_art_user_category)
                        @include('partials.book-card', ['story' => $story])
                        @if ($loop->iteration === 5)
                            @include('partials.ad', ['slot' => config('ads.slots.inline')])
                        @endif
                    @endif
                @endforeach
            </div>
        @else
            <div class="empty-state"><span>✧</span><h3>Rak cerita sedang disiapkan</h3><p>Hubungkan database Go-Dongeng untuk menampilkan koleksi cerita yang tersimpan.</p></div>
        @endif
    </section>

    <section class="feature-band">
        <div class="feature-orbit" aria-hidden="true"><span>✦</span><i>✧</i><b>☼</b></div>
        <div><span class="eyebrow">Satu cerita sebelum tidur</span><h2>Jadikan waktu membaca<br>lebih dekat dan menyenangkan.</h2></div>
        <a class="button button-light" href="{{ route('stories.category', 'dongeng') }}">Temukan cerita <span aria-hidden="true">↗</span></a>
    </section>
@endsection
