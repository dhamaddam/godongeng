@extends('layouts.app')
@section('title', 'Atur Ulang Kata Sandi — Go-Dongeng')
@section('content')
<section class="auth-wrap"><div class="auth-card"><span class="eyebrow">Pemulihan akun</span><h1>Lupa kata sandi?</h1><p>Masukkan email akunmu. Kami akan mengirim tautan untuk membuat kata sandi baru.</p>
    @if (session('status'))<div class="flash-message">{{ session('status') }}</div>@endif
    <form method="post" action="{{ route('password.email') }}" class="form-stack">@csrf
        <label>Email<input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus></label>
        @error('email')<p class="form-error">{{ $message }}</p>@enderror
        <button class="button" type="submit">Kirim tautan</button>
    </form><p class="auth-switch"><a href="{{ route('login') }}">Kembali ke masuk</a></p>
</div></section>
@endsection
