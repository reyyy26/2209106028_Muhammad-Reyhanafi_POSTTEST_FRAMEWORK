@extends('layouts.app')

@section('title', 'Tambah Hewan')

@section('content')
    <div class="space-y-8">
        <div>
            <h1 class="text-3xl font-semibold text-white">Tambah Data Hewan</h1>
            <p class="text-sm text-slate-300/80">Lengkapi formulir berikut untuk menambahkan hewan baru.</p>
        </div>

        @if ($errors->any())
            <div class="rounded-2xl border border-rose-500/40 bg-rose-500/10 p-4 text-sm text-rose-100">
                <ul class="list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="panel">
            <form method="POST" action="{{ route('dashboard.animals.store') }}" class="space-y-6">
                @include('dashboard.animals._form')
            </form>
        </div>
    </div>
@endsection
