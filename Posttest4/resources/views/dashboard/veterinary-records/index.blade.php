@extends('layouts.app')

@section('title', 'Kelola Rekam Medis')

@section('content')
    <div class="space-y-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-semibold text-white">Kelola Rekam Medis</h1>
                <p class="text-sm text-slate-300/80">Pantau dan kelola riwayat perawatan hewan.</p>
            </div>
            <a href="{{ route('dashboard.veterinary-records.create') }}" class="button-primary">Tambah Rekam Medis</a>
        </div>

        @if (session('status'))
            <div class="rounded-2xl border border-emerald-500/30 bg-emerald-500/10 p-4 text-sm text-emerald-100">
                {{ session('status') }}
            </div>
        @endif

        <div class="panel overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[880px] text-left text-sm text-slate-200/90">
                    <thead>
                        <tr class="bg-white/5 text-xs uppercase tracking-wide text-slate-400">
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">Hewan</th>
                            <th class="px-4 py-3">Perawatan</th>
                            <th class="px-4 py-3">Dokter</th>
                            <th class="px-4 py-3">Keparahan</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Darurat</th>
                            <th class="px-4 py-3">Tindak Lanjut</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse ($records as $record)
                            <tr class="transition hover:bg-white/5">
                                <td class="px-4 py-3">
                                    {{ $record->treatment_date?->format('d M Y') }}
                                    @if ($record->treatment_time)
                                        <span class="block text-xs text-slate-400">{{ $record->treatment_time->format('H:i') }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 font-semibold text-white">{{ $record->animal?->name ?? '-' }}</td>
                                <td class="px-4 py-3 text-slate-300/90">{{ $record->treatment_type }}</td>
                                <td class="px-4 py-3">{{ $record->veterinarian_name }}</td>
                                <td class="px-4 py-3 capitalize">{{ $record->severity }}</td>
                                <td class="px-4 py-3 capitalize">{{ str_replace('_', ' ', $record->status) }}</td>
                                <td class="px-4 py-3">{{ $record->is_emergency ? 'Ya' : 'Tidak' }}</td>
                                <td class="px-4 py-3">{{ $record->requires_followup ? 'Perlu' : 'Tidak' }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('dashboard.veterinary-records.edit', $record) }}" class="nav-link text-xs">Edit</a>
                                        <form method="POST" action="{{ route('dashboard.veterinary-records.destroy', $record) }}" onsubmit="return confirm('Hapus rekam medis ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="nav-link text-xs text-rose-200">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-4 py-6 text-center text-slate-300/70">Belum ada rekam medis tersimpan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $records->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection
