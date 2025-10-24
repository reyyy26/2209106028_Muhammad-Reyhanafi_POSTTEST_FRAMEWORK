@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
    <div class="mx-auto max-w-lg space-y-8">
        <div class="text-center space-y-2">
            <h1 class="text-3xl font-semibold text-white">Buat akun Nyxx Farm</h1>
            <p class="text-sm text-slate-300/80">Daftar untuk mulai mengelola hewan dan rekam medis melalui dashboard.</p>
        </div>

        <div class="panel space-y-6">
            @if($errors->any())
                <div class="rounded-2xl border border-rose-500/40 bg-rose-500/10 p-4 text-sm text-rose-100">
                    <ul class="list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-slate-200" for="name">Nama Lengkap</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required class="input-field" placeholder="Nama Anda">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-slate-200" for="email">Alamat Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required class="input-field" placeholder="you@example.com">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-slate-200" for="password">Kata Sandi</label>
                    <input id="password" name="password" type="password" required class="input-field" placeholder="Minimal 8 karakter">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-slate-200" for="password_confirmation">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="input-field" placeholder="Ulangi kata sandi">
                </div>

                <button type="submit" class="button-primary w-full justify-center">Daftar</button>
            </form>

            <p class="text-center text-sm text-slate-300/80">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-emerald-300 hover:text-emerald-200">Masuk di sini</a>
            </p>
        </div>
    </div>
@endsection
