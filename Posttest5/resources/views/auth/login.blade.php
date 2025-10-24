@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
    <div class="mx-auto max-w-lg space-y-8">
        <div class="text-center space-y-2">
            <h1 class="text-3xl font-semibold text-white">Selamat datang kembali</h1>
            <p class="text-sm text-slate-300/80">Masuk untuk mengelola data peternakan melalui dashboard.</p>
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

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-slate-200" for="email">Alamat Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus class="input-field" placeholder="you@example.com">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-slate-200" for="password">Kata Sandi</label>
                    <input id="password" name="password" type="password" required class="input-field" placeholder="********">
                </div>

                <div class="flex items-center justify-between text-sm text-slate-300/80">
                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="remember" class="h-4 w-4 rounded border-white/10 bg-slate-900/60">
                        <span>Ingat saya</span>
                    </label>
                    <a href="{{ route('register') }}" class="text-emerald-300 hover:text-emerald-200">Daftar akun baru</a>
                </div>

                <button type="submit" class="button-primary w-full justify-center">Masuk</button>
            </form>
        </div>
    </div>
@endsection
