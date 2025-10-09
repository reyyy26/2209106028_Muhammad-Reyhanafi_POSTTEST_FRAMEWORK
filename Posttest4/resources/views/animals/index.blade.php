@extends('layouts.app')

@section('title', 'Daftar Hewan')

@section('content')
    <div class="space-y-12">
        <section class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-emerald-500/10 via-slate-950 to-slate-950 p-10 shadow-2xl shadow-black/40">
            <div class="absolute inset-0 -z-10">
                <div class="absolute -left-16 top-10 h-64 w-64 rounded-full bg-emerald-400/20 blur-3xl"></div>
                <div class="absolute -right-20 bottom-0 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>
            </div>

            <div class="flex flex-col gap-10 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-xl space-y-4">
                    <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.4em] text-white/80">Hello Fam</span>
                    <h1 class="text-3xl font-semibold text-white sm:text-4xl">Kelola populasi hewan dengan mudah menggunakan NYXX-FARM.</h1>
                    <p class="text-sm text-slate-200/80">Gunakan pencarian, filter spesies, dan statistik dinamis untuk memastikan setiap kandang terpantau dengan baik.</p>

                    <div class="flex flex-wrap gap-3 text-xs font-semibold uppercase tracking-wide text-slate-200/70">
                        <span class="rounded-full border border-emerald-400/40 bg-emerald-400/10 px-4 py-2">Integrasi rekam medis</span>
                        <span class="rounded-full border border-slate-400/40 bg-slate-900/70 px-4 py-2">Statistik real-time</span>
                    </div>
                </div>

                <div class="grid w-full max-w-sm gap-4 rounded-3xl border border-white/10 bg-slate-950/60 p-6 backdrop-blur">
                    <div class="rounded-2xl border border-emerald-400/30 bg-emerald-400/10 p-4">
                        <p class="text-xs uppercase tracking-wide text-emerald-100/80">Total Hewan</p>
                        <p class="mt-3 text-3xl font-semibold text-white">{{ number_format($total) }}</p>
                    </div>
                    <div class="rounded-2xl border border-sky-400/20 bg-sky-400/10 p-4">
                        <p class="text-xs uppercase tracking-wide text-sky-100/80">Varian Spesies</p>
                        <p class="mt-3 text-2xl font-semibold text-white">{{ $speciesList->count() }}</p>
                        <p class="mt-2 text-xs text-slate-200/70">Rata-rata umur {{ number_format($bySpecies->avg('avg_age') ?? 0, 1) }} tahun</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-6 lg:grid-cols-[2fr_3fr]">
            <div class="panel">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="panel-title">Filter &amp; Pencarian</h2>
                        <p class="panel-subtitle">Sesuaikan hasil sesuai kebutuhan kandang.</p>
                    </div>
                    <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-200">{{ $animals->total() }} hasil</span>
                </div>

                <form method="GET" action="{{ route('nyxx.farm') }}" class="mt-6 grid gap-4">
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wide text-slate-400">Kata kunci</label>
                        <input
                            type="text"
                            name="q"
                            value="{{ old('q', $q ?? '') }}"
                            placeholder="Cari nama, breed, atau deskripsi..."
                            class="mt-2 input-field"
                        >
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wide text-slate-400">Spesies</label>
                        <select name="species" class="mt-2 input-field">
                            <option class="bg-slate-900" value="">Semua spesies</option>
                            @foreach($speciesList as $s)
                                <option class="bg-slate-900" value="{{ $s }}" {{ (isset($speciesFilter) && $speciesFilter === $s) ? 'selected' : '' }}>
                                    {{ $s }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        <button type="submit" class="button-primary">Terapkan Filter</button>
                        <a href="{{ route('nyxx.farm') }}" class="inline-flex items-center rounded-full border border-white/10 px-5 py-2 text-sm font-semibold text-slate-200 transition hover:border-emerald-400/40 hover:text-emerald-200">Reset</a>
                    </div>
                </form>
            </div>

            <div class="panel">
                <h2 class="panel-title">Statistik Spesies</h2>
                <p class="panel-subtitle">Lihat distribusi hewan beserta rerata umur untuk evaluasi cepat.</p>

                <div class="mt-6 grid gap-3 sm:grid-cols-2">
                    @foreach($bySpecies as $b)
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="font-semibold text-white">{{ $b->species }}</span>
                                <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-200">{{ $b->count }} ekor</span>
                            </div>
                            <p class="mt-3 text-xs text-slate-300/80">Umur rata-rata {{ number_format($b->avg_age, 1) }} tahun</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @if($animals->count() === 0)
            <div class="panel text-center text-slate-300/80">Belum ada data untuk kriteria ini.</div>
        @else
            <section class="space-y-10">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
                    @foreach($animals as $animal)
                        <x-animal-card :animal="$animal" />
                    @endforeach
                </div>

                <div class="panel overflow-hidden">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <h3 class="panel-title">Detail Hewan (Halaman {{ $animals->currentPage() }})</h3>
                        <span class="text-xs uppercase tracking-wide text-slate-400">Menampilkan {{ $animals->firstItem() }}-{{ $animals->lastItem() }} dari {{ $animals->total() }} data</span>
                    </div>

                    <div class="mt-4 overflow-x-auto">
                        <table class="w-full min-w-[720px] text-left text-sm text-slate-200/90">
                            <thead>
                                <tr class="bg-white/5 text-xs uppercase tracking-wide text-slate-400">
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3">Spesies</th>
                                    <th class="px-4 py-3">Breed</th>
                                    <th class="px-4 py-3">Umur</th>
                                    <th class="px-4 py-3">Catatan Medis</th>
                                    <th class="px-4 py-3">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                @foreach($animals as $idx => $a)
                                    <tr class="transition hover:bg-white/5">
                                        <td class="px-4 py-3 text-slate-400">{{ $animals->firstItem() + $idx }}</td>
                                        <td class="px-4 py-3 font-medium text-white">{{ $a->name }}</td>
                                        <td class="px-4 py-3">{{ $a->species }}</td>
                                        <td class="px-4 py-3">{{ $a->breed ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $a->age }} th</td>
                                        <td class="px-4 py-3">{{ $a->veterinary_records_count ?? $a->veterinaryRecords()->count() }} catatan</td>
                                        <td class="px-4 py-3 text-slate-300/80">{{ $a->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex justify-end">
                    {{ $animals->links('pagination::tailwind') }}
                </div>
            </section>
        @endif
    </div>
@endsection
