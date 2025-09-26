@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h1 class="text-2xl font-bold mb-2">Hubungi Kami</h1>
        <p class="text-gray-600 mb-4">Kirim pesan, pertanyaan, atau saran mengenai Nyxx Farm.</p>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="text-sm font-medium">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2">
                @error('name') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="text-sm font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2">
                @error('email') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="text-sm font-medium">Subjek (opsional)</label>
                <input type="text" name="subject" value="{{ old('subject') }}" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="text-sm font-medium">Pesan</label>
                <textarea name="message" rows="6" class="w-full border rounded px-3 py-2">{{ old('message') }}</textarea>
                @error('message') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
            </div>

            <div>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Kirim Pesan</button>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="font-semibold mb-2">Alamat & Info</h3>
        <p class="text-gray-600">Alamat kantor contoh: Jl. Peternak No.1 — Samarinda (contoh).</p>
        <p class="text-gray-600 mt-2">Email: info@nyxxfarm.example</p>
    </div>
</div>
@endsection
