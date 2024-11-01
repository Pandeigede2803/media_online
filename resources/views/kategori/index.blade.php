@extends('layout.app')

@section('title', 'Kategori Berita')

@section('header-title', 'Kategori Berita')
@section('header-subtitle', 'Jelajahi berbagai kategori berita menarik')

@section('breadcrumbs')
    <div class="flex items-center space-x-2 text-gray-600">
        <a href="/" class="hover:text-blue-600 transition-colors duration-200">Home</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="text-gray-800">Kategori</span>
    </div>
@endsection

@section('content')
    <!-- Search and Filter Section -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0 md:space-x-4">
            <!-- Search Input -->
            <div class="relative flex-grow max-w-md">
                <input type="text" placeholder="Cari kategori..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <!-- Sort Dropdown -->
            <select
                class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white">
                <option value="name_asc">Nama (A-Z)</option>
                <option value="name_desc">Nama (Z-A)</option>
                <option value="latest">Terbaru</option>
                <option value="popular">Terpopuler</option>
            </select>
        </div>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($categories as $kategori)
            <div class="group bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                <!-- Category Image -->
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('storage/' . $kategori->image) }}" alt="{{ $kategori->nama_kategori }}"
    class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                </div>

                <!-- Category Content -->
                <div class="p-6">
                    <!-- Category Header -->
                    <div class="flex items-center justify-between mb-4">
                        <h2
                            class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors duration-200">
                            {{ $kategori->nama_kategori }}
                        </h2>
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </span>
                    </div>

                    <!-- Category Description -->
                    <p class="text-gray-600 mb-4">{{ $kategori->description ?: $kategori->slug }}</p>

                    <!-- Stats Row -->
                    <div class="flex items-center space-x-4 text-sm text-gray-500 mb-4">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2">
                                </path>
                            </svg>
                            <span>{{ $kategori->articles_count ?? rand(10, 100) }} Artikel</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            <span>{{ rand(100, 1000) }} Views</span>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <a href="{{ route('kategori.show', $kategori->id) }}"
                        class="inline-flex items-center justify-center w-full px-4 py-2 bg-gray-100 text-gray-700 rounded-lg
                      group-hover:bg-blue-600 group-hover:text-white transition-all duration-200">
                        <span>Lihat Berita</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

        @endforeach

        @endsection

        @push('styles')
            <style>
                /* Custom hover effect for category cards */
                .group:hover {
                    transform: translateY(-2px);
                }
            </style>
        @endpush
