@php($medicalCount = $animal->veterinary_records_count ?? $animal->veterinaryRecords()->count())

<div class="group overflow-hidden rounded-3xl border border-white/10 bg-slate-900/70 shadow-xl shadow-black/40 transition duration-300 hover:-translate-y-1 hover:border-emerald-400/40 hover:shadow-emerald-500/20">
    <div class="relative h-48 w-full overflow-hidden">
        @if($animal->image_url)
            <img src="{{ $animal->image_url }}" alt="{{ $animal->name }}" class="h-full w-full object-cover">
        @else
            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-slate-800 via-slate-900 to-slate-950 text-slate-400">
                <div class="text-center">
                    <svg class="mx-auto mb-2 h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 002 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-sm">Belum ada foto</p>
                </div>
            </div>
        @endif

        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/30 to-transparent opacity-0 transition duration-300 group-hover:opacity-100"></div>
        <div class="absolute inset-x-0 bottom-0 flex items-center justify-between px-5 pb-4">
            <span class="rounded-full border border-white/20 bg-white/15 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-white">{{ $animal->species }}</span>
            <span class="text-xs text-slate-200/80">ID #{{ $animal->id }}</span>
        </div>
    </div>

    <div class="space-y-4 p-6">
        <div class="min-w-0 space-y-1">
            <h3 class="truncate text-xl font-semibold text-white">{{ $animal->name }}</h3>
            <p class="text-sm text-slate-300/80">{{ $animal->breed ?? 'Breed belum ditentukan' }}</p>
        </div>

        <p class="text-sm leading-relaxed text-slate-300/80">{{ $animal->description }}</p>

        <div class="grid grid-cols-2 gap-3 text-xs text-slate-200">
            <div class="rounded-2xl border border-white/10 bg-white/5 p-3">
                <p class="font-semibold text-white">Umur</p>
                <div class="mt-1 flex items-center gap-1.5 text-sm">
                    <svg class="h-4 w-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium text-white">{{ $animal->age }}</span> tahun
                </div>
                <span class="mt-2 inline-flex items-center rounded-full border {{ $animal->age >= 5 ? 'border-amber-400/30 bg-amber-400/10 text-amber-200' : 'border-emerald-400/30 bg-emerald-400/10 text-emerald-200' }} px-2.5 py-1 text-[11px] font-semibold">
                    {{ $animal->age >= 5 ? 'Usia senior' : 'Usia muda' }}
                </span>
            </div>

            <div class="rounded-2xl border border-white/10 bg-white/5 p-3">
                <p class="font-semibold text-white">Catatan Medis</p>
                <div class="mt-1 flex items-center gap-1.5 text-sm">
                    <svg class="h-4 w-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-2.016A11.955 11.955 0 0112 5c-2.26 0-4.37.627-6.18 1.712L3 5l1.288 2.82A11.955 11.955 0 003 12c0 2.26.627 4.37 1.712 6.18L3 21l2.82-1.288A11.955 11.955 0 0012 21c2.26 0 4.37-.627 6.18-1.712L21 21l-1.288-2.82A11.955 11.955 0 0021 12c0-2.26-.627-4.37-1.712-6.18z"></path>
                    </svg>
                    <span class="font-medium text-white">{{ $medicalCount }}</span>
                    <span>riwayat</span>
                </div>
                <p class="mt-2 text-[11px] text-slate-300/70">Termasuk pemeriksaan rutin hingga penanganan darurat.</p>
            </div>
        </div>
    </div>
</div>
