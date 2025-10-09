<!doctype html>
<html lang="id" class="antialiased">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Nyxx Farm - @yield('title')</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-950 text-slate-100 relative overflow-x-hidden">
  <div class="aurora-backdrop"></div>
  <div class="min-h-screen flex flex-col">
    <header class="sticky top-0 z-30 border-b border-white/5 bg-slate-950/70 backdrop-blur">
      <div class="mx-auto flex w-full max-w-6xl items-center justify-between px-4 py-4">
        <a href="{{ route('nyxx.farm') }}" class="flex items-center gap-3">
          <div class="h-11 w-11 rounded-2xl bg-gradient-to-br from-emerald-400 via-teal-400 to-sky-500 text-slate-900 flex items-center justify-center font-bold shadow-lg shadow-emerald-500/30">N</div>
          <div>
            <h1 class="text-lg font-semibold tracking-tight">Nyxx Farm</h1>
            <p class="text-xs text-slate-300/70">Sistem informasi peternakan</p>
          </div>
        </a>

        @php
          $navigation = [
            ['label' => 'Home', 'route' => 'nyxx.farm', 'active' => 'nyxx.farm'],
            ['label' => 'Berita', 'route' => 'articles.index', 'active' => 'articles.*'],
            ['label' => 'Rekam Medis', 'route' => 'veterinary.records', 'active' => 'veterinary.records'],
            ['label' => 'About', 'route' => 'about', 'active' => 'about'],
            ['label' => 'Contact', 'route' => 'contact.create', 'active' => 'contact.*'],
          ];
        @endphp

        <nav class="hidden items-center gap-2 text-sm font-medium md:flex">
          @foreach($navigation as $item)
            <a
              href="{{ route($item['route']) }}"
              class="nav-link {{ request()->routeIs($item['active']) ? 'border-emerald-400/60 bg-emerald-400/20 text-white shadow-md shadow-emerald-500/30' : '' }}"
            >
              {{ $item['label'] }}
            </a>
          @endforeach
        </nav>
      </div>
    </header>

    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-10">
      @yield('content')
    </main>

    <footer class="border-t border-white/5 bg-slate-950/70 backdrop-blur">
      <div class="mx-auto max-w-6xl px-4 py-6 text-center text-sm text-slate-400">
        © {{ date('Y') }} Nyxx Farm — Semua hak cipta.
      </div>
    </footer>
  </div>
</body>

</html>