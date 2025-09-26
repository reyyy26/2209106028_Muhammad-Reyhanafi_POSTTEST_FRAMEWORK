@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-2xl font-bold mb-2">{{ $article->title }}</h1>

    <div class="text-xs text-gray-500 mb-4">
        Oleh {{ $article->author ?? 'Tim Nyxx' }} • 
        {{ $article->published_at?->format('d M Y') ?? '-' }}
    </div>

    @if($article->category)
        <div class="mb-3">
            <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded">
                Kategori: {{ $article->category->name }}
            </span>
        </div>
    @endif

    <div class="prose max-w-none text-gray-700 mb-4">
        {!! nl2br(e($article->content)) !!}
    </div>

    @if($article->tags->count())
        <div class="mt-4">
            <span class="text-sm text-gray-600">Tag:</span>
            @foreach($article->tags as $tag)
                <span class="inline-block bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">
                    {{ $tag->name }}
                </span>
            @endforeach
        </div>
    @endif

    <div class="mt-6">
        <a href="{{ route('articles.index') }}" class="text-sm text-green-600 hover:underline">
            ← Kembali ke daftar artikel
        </a>
    </div>
</div>
@endsection
