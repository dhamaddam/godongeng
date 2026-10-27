@extends('layouts.app')
@section('title', 'Daftar — Go-Dongeng')
@section('content')
<section class="auth-wrap"><div class="auth-card"><span class="eyebrow">Mari menulis cerita</span><h1>Bergabung dengan Go-Dongeng</h1><p>Buat akun untuk mengirim cerita dan ilustrasi.</p>
    <form method="post" action="{{ route('register') }}" class="form-stack">@csrf
        <label>Nama<input name="name" value="{{ old('name') }}" autocomplete="name" required maxlength="120"></label>
        <label>Email<input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required></label>
        <label>Kata sandi<input type="password" name="password" autocomplete="new-password" required minlength="10"></label>
        <label>Ulangi kata sandi<input type="password" name="password_confirmation" autocomplete="new-password" required minlength="10"></label>
        @if ($errors->any())<div class="form-error">{{ $errors->first() }}</div>@endif
        <button class="button" type="submit">Buat akun</button>
    </form><p class="auth-switch">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
</div></section>
@endsection
