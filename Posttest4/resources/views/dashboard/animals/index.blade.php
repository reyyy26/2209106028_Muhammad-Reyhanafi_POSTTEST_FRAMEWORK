@extends('layouts.app')

@section('title', 'Kelola Hewan')

@section('content')
    <div class="space-y-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-semibold text-white">Kelola Hewan</h1>
                <p class="text-sm text-slate-300/80">Tambah, ubah, dan hapus data hewan kandang.</p>
            </div>
            <a href="{{ route('dashboard.animals.create') }}" class="button-primary">Tambah Hewan</a>
        </div>

        @if (session('status'))
            <div class="rounded-2xl border border-emerald-500/30 bg-emerald-500/10 p-4 text-sm text-emerald-100">
                {{ session('status') }}
            </div>
        @endif

        <div class="panel overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[720px] text-left text-sm text-slate-200/90">
                    <thead>
                        <tr class="bg-white/5 text-xs uppercase tracking-wide text-slate-400">
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3">Spesies</th>
                            <th class="px-4 py-3">Breed</th>
                            <th class="px-4 py-3">Umur</th>
                            <th class="px-4 py-3">Catatan Medis</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($animals as $animal)
                            <tr class="transition hover:bg-white/5">
                                <td class="px-4 py-3 font-semibold text-white">{{ $animal->name }}</td>
                                <td class="px-4 py-3 text-slate-300/90">{{ $animal->species }}</td>
                                <td class="px-4 py-3 text-slate-300/70">{{ $animal->breed ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $animal->age }} th</td>
                                <td class="px-4 py-3">{{ $animal->veterinary_records_count }} catatan</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('dashboard.animals.edit', $animal) }}" class="nav-link text-xs">Edit</a>
                                        <form method="POST" action="{{ route('dashboard.animals.destroy', $animal) }}" onsubmit="return confirm('Hapus data hewan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="nav-link text-xs text-rose-200">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-slate-300/70">Belum ada data hewan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $animals->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection
