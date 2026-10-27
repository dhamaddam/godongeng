<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f3f6ef">
    <meta name="description" content="Baca dongeng, fabel, dan cerita rakyat bergambar di Go-Dongeng.">
    <title>@yield('title', 'Go-Dongeng — Dunia Cerita Anak')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ config('ads.client') }}" crossorigin="anonymous"></script>
    @stack('head')
</head>
<body data-theme="{{ $activeTag ?? 'dongeng' }}">
    <div class="site-shell">
        <header class="site-header">
            <a class="brand" href="{{ route('home') }}" aria-label="Go-Dongeng — beranda">
                <span class="brand-mark" aria-hidden="true">✦</span>
                <span><strong>go-dongeng</strong><small>cerita kecil, dunia besar</small></span>
            </a>
            <nav class="main-nav" aria-label="Navigasi utama">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('stories.category', 'dongeng') }}">Dongeng</a>
                <a href="{{ route('stories.category', 'fabel') }}">Fabel</a>
                <a href="{{ route('stories.category', 'folklore') }}">Cerita rakyat</a>
            </nav>
            <div class="header-actions">
                @auth
                    <a class="quiet-link" href="{{ route('insight.index') }}">Ruang penulis</a>
                    <form method="post" action="{{ route('logout') }}">@csrf<button class="button button-small button-outline" type="submit">Keluar</button></form>
                @else
                    <a class="quiet-link" href="{{ route('login') }}">Masuk</a>
                    <a class="button button-small" href="{{ route('register') }}">Gabung</a>
                @endauth
            </div>
        </header>

        @if (session('status'))
            <div class="flash-message" role="status">{{ session('status') }}</div>
        @endif

        <main id="main-content">
            @yield('content')
        </main>

        <footer class="site-footer">
            <a class="brand brand-footer" href="{{ route('home') }}"><span class="brand-mark" aria-hidden="true">✦</span><span><strong>go-dongeng</strong><small>Jendela cerita untuk keluarga</small></span></a>
            <div class="footer-links"><a href="{{ route('stories.index') }}">Semua cerita</a><a href="{{ route('feed') }}">RSS</a><a href="mailto:appdorms@gmail.com">Kontak</a></div>
            <span class="footer-note">© {{ now()->year }} Go-Dongeng</span>
        </footer>
    </div>
    <script src="{{ asset('js/site.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
