@extends('layouts.app')
@section('title', 'Masuk — Go-Dongeng')
@section('content')
<section class="auth-wrap"><div class="auth-card"><span class="eyebrow">Selamat datang kembali</span><h1>Masuk ke Go-Dongeng</h1><p>Kelola cerita dan lanjutkan berbagi kisah.</p>
    @if (session('status'))<div class="flash-message">{{ session('status') }}</div>@endif
    <form method="post" action="{{ route('login') }}" class="form-stack">@csrf
        <label>Email<input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus></label>
        <label>Kata sandi<input type="password" name="password" autocomplete="current-password" required></label>
        @error('email')<p class="form-error">{{ $message }}</p>@enderror
        <label class="checkbox-label"><input type="checkbox" name="remember" value="1"> Ingat saya</label>
        <button class="button" type="submit">Masuk</button>
    </form><p class="auth-switch"><a href="{{ route('password.request') }}">Lupa kata sandi?</a></p><p class="auth-switch">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
</div></section>
@endsection
