@extends('layouts.app')
@section('title', 'Tulis Cerita — Go-Dongeng')
@section('content')
<section class="auth-wrap"><div class="auth-card story-form-card"><span class="eyebrow">Ruang penulis</span><h1>Tulis cerita baru</h1><p>Ceritakan kisah dengan kata-katamu sendiri dan pilih satu gambar sampul.</p>
    <form method="post" action="{{ route('insight.store') }}" enctype="multipart/form-data" class="form-stack">@csrf
        <label>Judul cerita<input name="title" value="{{ old('title') }}" required maxlength="180"></label>
        <label>Jenis cerita<select name="tag" required><option value="dongeng">Dongeng</option><option value="fabel" @selected(old('tag') === 'fabel')>Fabel</option><option value="folklore" @selected(old('tag') === 'folklore')>Cerita rakyat</option></select></label>
        <label>Gambar sampul<input type="file" name="picture" accept="image/jpeg,image/png,image/webp" required><small>JPG, PNG, atau WebP; maksimal 6 MB.</small></label>
        <label>Awal cerita<textarea name="description" rows="6" required>{{ old('description') }}</textarea></label>
        <label>Halaman berikutnya<textarea name="paragraph1" rows="5">{{ old('paragraph1') }}</textarea></label>
        <label>Halaman ketiga<textarea name="paragraph2" rows="5">{{ old('paragraph2') }}</textarea></label>
        <label>Penutup<textarea name="paragraph3" rows="5">{{ old('paragraph3') }}</textarea></label>
        @if ($errors->any())<div class="form-error">{{ $errors->first() }}</div>@endif
        <button class="button" type="submit">Simpan dan terbitkan</button>
    </form>
</div></section>
@endsection
