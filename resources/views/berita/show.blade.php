@extends('layout.app')

@section('title', $berita->judul_berita)

@section('content')
<div class="bg-white p-6 rounded shadow">
    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="w-full h-64 object-cover rounded mb-4">
    <h1 class="text-3xl font-bold mb-2">{{ $berita->judul_berita }}</h1>
    <p class="text-gray-600 text-sm mb-4">Oleh {{ $berita->author }} | {{ $berita->created_at->format('d M Y') }}</p>
    <div class="text-gray-800 leading-relaxed">
        {!! $berita->konten_berita !!}
    </div>
</div>
@endsection