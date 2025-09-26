@extends('layouts.app')

@section('title', 'Daftar Hewan')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold">Daftar Hewan di Nyxx Farm</h2>
        <p class="text-sm text-gray-500 mt-1">Cari, filter, dan lihat statistik ringkas untuk mendapatkan data yang akurat.</p>
    </div>

    <!-- Search & Filter -->
    <form method="GET" action="{{ route('nyxx.farm') }}" class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-3">
        <div>
            <input
                type="text"
                name="q"
                value="{{ old('q', $q ?? '') }}"
                placeholder="Cari nama, breed, atau deskripsi..."
                class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
            >
        </div>

        <div>
            <select name="species" class="w-full border rounded-md px-3 py-2">
                <option value="">— Semua Species —</option>
                @foreach($speciesList as $s)
                    <option value="{{ $s }}" {{ (isset($speciesFilter) && $speciesFilter === $s) ? 'selected' : '' }}>
                        {{ $s }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md">Cari / Filter</button>
            <a href="{{ route('nyxx.farm') }}" class="px-4 py-2 border rounded-md text-gray-700">Reset</a>
        </div>
    </form>

    <!-- Statistik ringkas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-sm text-gray-500">Total Hewan</div>
            <div class="text-2xl font-bold">{{ number_format($total) }}</div>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-sm text-gray-500">Species Tersedia</div>
            <div class="text-lg font-semibold">{{ $speciesList->count() }}</div>
            <div class="mt-2 text-sm text-gray-600">
                @foreach($bySpecies as $b)
                    <div class="flex justify-between">
                        <div>{{ $b->species }}</div>
                        <div>{{ $b->count }} • rata-rata umur: {{ number_format($b->avg_age, 2) }} th</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <div class="text-sm text-gray-500">Catatan</div>
            <div class="text-sm text-gray-700 mt-2">Data diambil dari database MySQL — gunakan tombol reset untuk mengembalikan semua filter.</div>
        </div>
    </div>

    <!-- Grid kartu -->
    @if($animals->count() === 0)
        <div class="bg-white rounded-lg shadow p-6 text-center text-gray-600">Belum ada data untuk kriteria ini.</div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            @foreach($animals as $animal)
                <x-animal-card :animal="$animal" />
            @endforeach
        </div>

        <div class="mb-6">
            {{ $animals->links() }}
        </div>

        <!-- Tabel detail (untuk menampilkan data yang lebih akurat) -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="font-semibold mb-3">Detail (halaman sekarang)</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="text-gray-600">
                            <th class="px-3 py-2">#</th>
                            <th class="px-3 py-2">Nama</th>
                            <th class="px-3 py-2">Species</th>
                            <th class="px-3 py-2">Breed</th>
                            <th class="px-3 py-2">Umur</th>
                            <th class="px-3 py-2">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($animals as $idx => $a)
                        <tr class="{{ $idx % 2 == 0 ? 'bg-gray-50' : '' }}">
                            <td class="px-3 py-2">{{ $animals->firstItem() + $idx }}</td>
                            <td class="px-3 py-2 font-medium">{{ $a->name }}</td>
                            <td class="px-3 py-2">{{ $a->species }}</td>
                            <td class="px-3 py-2">{{ $a->breed ?? '-' }}</td>
                            <td class="px-3 py-2">{{ $a->age }} th</td>
                            <td class="px-3 py-2">{{ $a->description }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
