@extends('layout.app')

@section('title', 'Berita - ' . $kategori->nama_kategori)

@section('content')
<h1 class="text-2xl font-bold mb-4">Berita dalam Kategori: {{ $kategori->nama_kategori }}</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($beritas as $berita)
    <div class="bg-white p-4 rounded shadow">
        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="w-full h-48 object-cover rounded mb-4">
        <h2 class="text-xl font-bold">{{ $berita->judul_berita }}</h2>
        <p class="text-gray-600 text-sm mb-2">Oleh {{ $berita->author }} | {{ $berita->created_at->format('d M Y') }}</p>
        <p class="text-gray-700 mb-4">{{ Str::limit(strip_tags($berita->konten_berita), 100) }}</p>
        <a href="{{ route('berita.show', $berita->id) }}" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
    </div>
    @endforeach
</div>
@endsection