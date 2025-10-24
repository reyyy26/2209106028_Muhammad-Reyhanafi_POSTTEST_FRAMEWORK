@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-10">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-xs uppercase tracking-[0.4em] text-emerald-200/70">Nyxx Farm</p>
                <h1 class="mt-2 text-3xl font-semibold text-white">Dashboard Pengelolaan</h1>
                <p class="mt-2 text-sm text-slate-300/80">Ringkasan data hewan dan catatan medis dalam satu panel terkendali.</p>
            </div>

            <div class="flex flex-wrap gap-4">
                <a href="{{ route('dashboard.animals.create') }}" class="button-primary">Tambah Hewan</a>
                <a href="{{ route('dashboard.veterinary-records.create') }}" class="nav-link">Tambah Rekam Medis</a>
            </div>
        </div>

        <div class="grid gap-5 md:grid-cols-3">
            <div class="rounded-3xl border border-white/10 bg-gradient-to-br from-emerald-400/10 via-slate-950 to-slate-950 p-6 shadow-xl">
                <p class="text-xs font-semibold uppercase tracking-wide text-emerald-200/70">Total Hewan</p>
                <p class="mt-4 text-3xl font-semibold text-white">{{ number_format($animalsCount) }}</p>
            </div>
            <div class="rounded-3xl border border-white/10 bg-gradient-to-br from-sky-400/10 via-slate-950 to-slate-950 p-6 shadow-xl">
                <p class="text-xs font-semibold uppercase tracking-wide text-sky-200/70">Rekam Medis</p>
                <p class="mt-4 text-3xl font-semibold text-white">{{ number_format($recordsCount) }}</p>
            </div>
            <div class="rounded-3xl border border-white/10 bg-gradient-to-br from-rose-400/10 via-slate-950 to-slate-950 p-6 shadow-xl">
                <p class="text-xs font-semibold uppercase tracking-wide text-rose-200/70">Kasus Darurat</p>
                <p class="mt-4 text-3xl font-semibold text-white">{{ number_format($emergencyRecords) }}</p>
            </div>
        </div>

        <div class="panel">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="panel-title">Rekam Medis Terbaru</h2>
                    <p class="panel-subtitle">Pemantauan singkat aktivitas perawatan terakhir.</p>
                </div>
                <a href="{{ route('dashboard.veterinary-records.index') }}" class="text-sm font-semibold text-emerald-300 hover:text-emerald-200">Kelola rekam medis</a>
            </div>

            <div class="mt-6 overflow-x-auto">
                <table class="w-full min-w-[640px] text-left text-sm text-slate-200/90">
                    <thead>
                        <tr class="bg-white/5 text-xs uppercase tracking-wide text-slate-400">
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Hewan</th>
                            <th class="px-4 py-3">Perawatan</th>
                            <th class="px-4 py-3">Dokter</th>
                            <th class="px-4 py-3">Keparahan</th>
                            <th class="px-4 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($latestRecords as $record)
                            <tr class="transition hover:bg-white/5">
                                <td class="px-4 py-3">
                                    {{ $record->treatment_date?->format('d M Y') }}
                                    @if($record->treatment_time)
                                        <span class="block text-xs text-slate-400">{{ $record->treatment_time->format('H:i') }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 font-semibold text-white">{{ $record->animal?->name ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $record->treatment_type }}</td>
                                <td class="px-4 py-3">{{ $record->veterinarian_name }}</td>
                                <td class="px-4 py-3">
                                    <span class="rounded-full border border-white/10 bg-white/10 px-3 py-1 text-xs font-semibold capitalize">{{ $record->severity }}</span>
                                </td>
                                <td class="px-4 py-3 capitalize">{{ str_replace('_', ' ', $record->status) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-slate-300/70">Belum ada rekam medis tersimpan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
