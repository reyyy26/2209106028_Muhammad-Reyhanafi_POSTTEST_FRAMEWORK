@extends('layouts.app')

@section('title', 'About Nyxx Farm')

@section('content')
<div class="space-y-10">
    <section class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-emerald-500/10 via-slate-950 to-slate-950 p-10 shadow-2xl shadow-black/40">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -left-16 top-10 h-64 w-64 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -right-20 bottom-0 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>
        </div>

        <div class="max-w-2xl space-y-4">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.4em] text-white/80">Tentang</span>
            <h1 class="text-3xl font-semibold text-white sm:text-4xl">Menghubungkan peternak dengan data yang akurat dan mudah dipahami.</h1>
            <p class="text-sm leading-relaxed text-slate-200/80">Nyxx Farm lahir dari kolaborasi praktisi peternakan dan developer lokal yang percaya bahwa insight yang tepat waktu dapat meningkatkan kesejahteraan hewan sekaligus produktivitas usaha ternak.</p>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-3">
        <div class="panel space-y-3">
            <h2 class="panel-title">Misi Kami</h2>
            <ul class="space-y-3 text-sm text-slate-300/80">
                <li>Memberikan informasi teknis yang mudah dipahami untuk peternak di semua skala.</li>
                <li>Mendorong adopsi teknologi terjangkau yang meningkatkan efisiensi operasional.</li>
                <li>Menyajikan data ternak secara akurat untuk keputusan yang lebih cepat dan tepat.</li>
            </ul>
        </div>

        <div class="panel space-y-3">
            <h2 class="panel-title">Pendekatan Produk</h2>
            <p class="text-sm text-slate-300/80">Kami membangun modul demi modul berdasarkan umpan balik lapangan: mulai dari monitoring populasi ternak, visualisasi rekam medis, hingga otomasi pengingat vaksinasi.</p>
            <p class="text-sm text-slate-300/80">Setiap fitur dikurasi agar familiar bagi peternak sekaligus modern untuk tim operasional.</p>
        </div>

        <div class="panel space-y-3">
            <h2 class="panel-title">Nilai Inti</h2>
            <ul class="space-y-2 text-sm text-slate-300/80">
                <li>• Transparansi data dan catatan medis.</li>
                <li>• Kolaborasi antara dokter hewan dan peternak.</li>
                <li>• Keberlanjutan melalui edukasi dan insight terukur.</li>
            </ul>
        </div>
    </section>

    <section class="panel space-y-4">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="panel-title">Hubungi Tim Nyxx Farm</h2>
                <p class="panel-subtitle">Kami siap berdiskusi terkait implementasi, integrasi, atau kolaborasi penyuluhan.</p>
            </div>
            <a href="{{ route('contact.create') }}" class="button-primary">Buka Form Kontak</a>
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4 text-sm text-slate-300/80">
                <p class="font-semibold text-white">Alamat</p>
                <p class="mt-1">Jl. Perjuangan 3 - Samarinda, Kalimantan Timur</p>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4 text-sm text-slate-300/80">
                <p class="font-semibold text-white">Email</p>
                <p class="mt-1">nyxxfarm@gmail.com</p>
            </div>
        </div>
    </section>
</div>
@endsection
