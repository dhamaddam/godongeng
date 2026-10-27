@extends('layouts.app')
@section('title', 'Buat Kata Sandi Baru — Go-Dongeng')
@section('content')
<section class="auth-wrap"><div class="auth-card"><span class="eyebrow">Pemulihan akun</span><h1>Buat kata sandi baru</h1><p>Gunakan minimal 10 karakter.</p>
    <form method="post" action="{{ route('password.store') }}" class="form-stack">@csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label>Email<input type="email" name="email" value="{{ old('email', request('email')) }}" autocomplete="email" required></label>
        <label>Kata sandi baru<input type="password" name="password" autocomplete="new-password" required minlength="10"></label>
        <label>Ulangi kata sandi<input type="password" name="password_confirmation" autocomplete="new-password" required minlength="10"></label>
        @if ($errors->any())<div class="form-error">{{ $errors->first() }}</div>@endif
        <button class="button" type="submit">Simpan kata sandi</button>
    </form>
</div></section>
@endsection
