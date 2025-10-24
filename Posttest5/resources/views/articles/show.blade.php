@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="space-y-10">
    <section class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-emerald-500/10 via-slate-950 to-slate-950 p-10 shadow-2xl shadow-black/40">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -left-12 top-10 h-64 w-64 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -right-16 bottom-0 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>
        </div>

        <div class="space-y-4">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.4em] text-white/80">Artikel</span>
            <h1 class="text-3xl font-semibold text-white sm:text-4xl">{{ $article->title }}</h1>

            <div class="flex flex-wrap items-center gap-3 text-xs uppercase tracking-wide text-slate-300/80">
                <span>Oleh {{ $article->author ?? 'Tim Nyxx' }}</span>
                <span>•</span>
                <span>{{ $article->published_at?->format('d M Y') ?? '-' }}</span>
                @if($article->category)
                    <span>•</span>
                    <span class="rounded-full border border-emerald-400/30 bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-200">{{ $article->category->name }}</span>
                @endif
            </div>

            @if($article->tags->count())
                <div class="flex flex-wrap gap-2 pt-2">
                    @foreach($article->tags as $tag)
                        <span class="rounded-full border border-white/10 bg-white/10 px-3 py-1 text-xs font-semibold text-slate-100/80">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <article class="panel space-y-6">
        <div class="space-y-4 whitespace-pre-line text-slate-200 leading-relaxed">
            {!! nl2br(e($article->content)) !!}
        </div>

        <div class="flex items-center justify-between border-t border-white/10 pt-6 text-sm text-slate-300/80">
            <a href="{{ route('articles.index') }}" class="inline-flex items-center text-sm font-medium text-emerald-300 transition hover:text-emerald-200">
                ← Kembali ke daftar artikel
            </a>
            <span>Diperbarui {{ $article->updated_at?->diffForHumans() ?? '—' }}</span>
        </div>
    </article>
</div>
@endsection
