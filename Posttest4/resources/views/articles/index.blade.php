@extends('layouts.app')

@section('title', 'Artikel Peternakan')

@section('content')
<div class="space-y-12">
    <section class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-sky-500/10 via-slate-950 to-slate-950 p-10 shadow-2xl shadow-black/40">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -left-12 top-8 h-64 w-64 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -right-16 bottom-0 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>
        </div>

        <div class="flex flex-col gap-10 lg:flex-row lg:items-start lg:justify-between">
            <div class="max-w-xl space-y-4">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.4em] text-white/80">Artikel</span>
                <h1 class="text-3xl font-semibold text-white sm:text-4xl">Wawasan terbaru untuk mendukung produktivitas kandang Anda.</h1>
                <p class="text-sm text-slate-200/80">Kumpulan artikel kurasi tim Nyxx Farm, mulai dari nutrisi, kesehatan ternak, hingga strategi bisnis peternakan.</p>

                <div class="flex flex-wrap gap-3 text-xs font-semibold uppercase tracking-wide text-slate-200/70">
                    <span class="rounded-full border border-emerald-400/40 bg-emerald-400/10 px-4 py-2">Update mingguan</span>
                    <span class="rounded-full border border-slate-400/40 bg-slate-900/70 px-4 py-2">Ditulis pakar kandang</span>
                </div>
            </div>

            <div class="grid w-full max-w-sm gap-4 rounded-3xl border border-white/10 bg-slate-950/60 p-6 backdrop-blur">
                <div class="rounded-2xl border border-emerald-400/30 bg-emerald-400/10 p-4">
                    <p class="text-xs uppercase tracking-wide text-emerald-100/80">Total Artikel</p>
                    <p class="mt-3 text-3xl font-semibold text-white">{{ $articles->total() }}</p>
                </div>
                <div class="rounded-2xl border border-sky-400/20 bg-sky-400/10 p-4">
                    <p class="text-xs uppercase tracking-wide text-sky-100/80">Halaman Saat Ini</p>
                    <p class="mt-3 text-2xl font-semibold text-white">{{ $articles->currentPage() }} / {{ $articles->lastPage() }}</p>
                    <p class="mt-2 text-xs text-slate-200/70">Menampilkan {{ $articles->perPage() }} artikel per halaman</p>
                </div>
            </div>
        </div>
    </section>

    <section class="panel">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <h2 class="panel-title">Cari topik spesifik</h2>
                <p class="panel-subtitle">Gunakan kombinasi kata kunci dan jumlah artikel per halaman.</p>
            </div>

            <form method="GET" action="{{ route('articles.index') }}" class="grid gap-3 sm:grid-cols-[minmax(0,1fr)_auto_auto] sm:items-center">
                <input
                    type="text"
                    name="q"
                    value="{{ old('q', $q ?? '') }}"
                    placeholder="Cari artikel, penulis, atau konten..."
                    class="input-field sm:w-72"
                    aria-label="Cari artikel"
                >

                <select name="per_page" onchange="this.form.submit()" class="input-field sm:w-40">
                    @foreach([6,9,12,18] as $n)
                        <option class="bg-slate-900" value="{{ $n }}" {{ ($perPage ?? 6) == $n ? 'selected' : '' }}>
                            {{ $n }} / halaman
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="button-primary">Telusuri</button>
            </form>
        </div>
    </section>

    <section class="grid gap-6">
        @forelse ($articles as $article)
            <article class="panel space-y-4">
                <div class="flex flex-col gap-2">
                    <h2 class="text-2xl font-semibold text-white">
                        <a href="{{ route('articles.show', $article) }}" class="transition hover:text-emerald-300">
                            {{ $article->title }}
                        </a>
                    </h2>

                    <div class="flex flex-wrap items-center gap-3 text-xs uppercase tracking-wide text-slate-400">
                        <span>Oleh {{ $article->author ?? 'Tim Nyxx' }}</span>
                        <span>•</span>
                        <span>{{ $article->published_at ? $article->published_at->format('d M Y') : '-' }}</span>
                        @if($article->category)
                            <span>•</span>
                            <span class="text-emerald-300">Kategori: {{ $article->category->name }}</span>
                        @endif
                    </div>
                </div>

                <p class="text-sm leading-relaxed text-slate-300">
                    {{ \Illuminate\Support\Str::limit($article->excerpt ?? $article->content, 180) }}
                </p>

                @if($article->tags->isNotEmpty())
                    <div class="flex flex-wrap gap-2">
                        @foreach($article->tags as $tag)
                            <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-200">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <a href="{{ route('articles.show', $article) }}" class="inline-flex items-center text-sm font-medium text-emerald-300 transition hover:text-emerald-200">
                    Baca selengkapnya →
                </a>
            </article>
        @empty
            <div class="panel text-center text-slate-300">Belum ada artikel tersedia.</div>
        @endforelse
    </section>

    <section class="flex flex-col items-start justify-between gap-4 text-sm text-slate-400 sm:flex-row sm:items-center">
        <div>
            Menampilkan {{ $articles->firstItem() ?? 0 }} – {{ $articles->lastItem() ?? 0 }} dari {{ $articles->total() }} artikel
        </div>

        <div class="w-full sm:w-auto">
            {{ $articles->links('pagination::tailwind') }}
        </div>
    </section>
</div>
@endsection
