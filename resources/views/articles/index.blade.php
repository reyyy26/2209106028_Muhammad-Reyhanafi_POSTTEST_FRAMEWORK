@extends('layouts.app')

@section('title', 'Artikel Peternakan')

@section('content')
<div class="space-y-6">

    {{-- Header & controls --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Artikel & Info Terbaru</h1>
            <p class="text-sm text-gray-500 mt-1">Tips, berita, dan panduan seputar peternakan.</p>
        </div>

        {{-- Search + per-page --}}
        <form method="GET" action="{{ route('articles.index') }}" class="flex gap-2 items-center">
            <input
                type="text"
                name="q"
                value="{{ old('q', $q ?? '') }}"
                placeholder="Cari artikel..."
                class="border rounded px-3 py-2 w-56"
                aria-label="Cari artikel"
            >

            <select name="per_page" onchange="this.form.submit()" class="border rounded px-2 py-2 text-sm">
                @foreach([6,9,12,18] as $n)
                    <option value="{{ $n }}" {{ request('per_page', 6) == $n ? 'selected' : '' }}>
                        {{ $n }} / halaman
                    </option>
                @endforeach
            </select>

            <button type="submit" class="px-3 py-2 bg-green-600 text-white rounded text-sm">Cari</button>
        </form>
    </div>

    {{-- List of articles --}}
    <div class="grid gap-6">
        @forelse ($articles as $article)
            <article class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-2">
                    <a href="{{ route('articles.show', $article) }}" class="text-green-700 hover:underline">
                        {{ $article->title }}
                    </a>
                </h2>

                <div class="text-xs text-gray-500 mb-3">
                    Oleh {{ $article->author ?? 'Tim Nyxx' }}
                    • {{ $article->published_at ? $article->published_at->format('d M Y') : '-' }}
                    @if($article->category)
                        • <span class="text-green-600">Kategori: {{ $article->category->name }}</span>
                    @endif
                </div>

                <p class="text-gray-700 mb-4">
                    {{ \Illuminate\Support\Str::limit($article->excerpt ?? $article->content, 150) }}
                </p>

                @if($article->tags->isNotEmpty())
                    <div class="mb-4">
                        @foreach($article->tags as $tag)
                            <span class="inline-block bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded mr-1">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <a href="{{ route('articles.show', $article) }}" class="text-sm text-green-600 hover:underline">
                    Baca selengkapnya →
                </a>
            </article>
        @empty
            <div class="bg-white rounded-lg shadow p-6 text-gray-600">Belum ada artikel tersedia.</div>
        @endforelse
    </div>

    {{-- Pagination and stats --}}
    <div class="flex items-center justify-between mt-6">
        <div class="text-sm text-gray-600">
            Menampilkan {{ $articles->firstItem() ?? 0 }} - {{ $articles->lastItem() ?? 0 }} dari {{ $articles->total() }} artikel
        </div>

        <div>
            {{-- Tailwind pagination view --}}
            {{ $articles->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
