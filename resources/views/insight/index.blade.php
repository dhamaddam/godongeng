@extends('layouts.app')
@section('title', 'Ruang Penulis — Go-Dongeng')
@section('content')
<section class="dashboard-head"><div><span class="eyebrow">Ruang penulis</span><h1>Halo, {{ auth()->user()->name }}.</h1><p>Kelola cerita dan bagikan kisah baru.</p></div><a class="button" href="{{ route('insight.create') }}">Tulis cerita <span>＋</span></a></section>
<section class="collection-section dashboard-stories"><div class="section-heading"><div><span class="eyebrow">Koleksi terbaru</span><h2>Cerita di Go-Dongeng</h2></div></div><div class="story-grid">@foreach ($stories as $story)@include('partials.book-card', ['story' => $story])@endforeach</div></section>
@endsection
