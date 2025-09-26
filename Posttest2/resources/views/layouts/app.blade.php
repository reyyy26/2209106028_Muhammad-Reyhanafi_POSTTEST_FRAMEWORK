<!doctype html>
<html lang="id" class="antialiased">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Nyxx Farm - @yield('title')</title>

    <!-- Tailwind CDN + class-based dark mode -->
    <script>
      tailwind = window.tailwind || {};
      tailwind.config = {
        darkMode: 'class',
        theme: { extend: {} }
      }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
      /* lembutkan transisi warna global */
      :root { color-scheme: light; }
      html.dark { color-scheme: dark; }
      .theme-transition { transition: background-color .25s ease, color .25s ease; }
    </style>
</head>
<body class="min-h-screen bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100 theme-transition">

    <header class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <a href="{{ route('nyxx.farm') }}" class="flex items-center gap-3">
                <div class="bg-green-600 text-white rounded-full w-10 h-10 flex items-center justify-center font-bold">N</div>
                <div>
                    <h1 class="text-lg font-semibold">Nyxx Farm</h1>
                    <p class="text-xs text-gray-500 dark:text-gray-300 -mt-1">Sistem informasi peternakan</p>
                </div>
            </a>

            <div class="flex items-center gap-4">
                <nav class="hidden md:flex items-center gap-4">
                    <a href="{{ route('nyxx.farm') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:underline">Home</a>
                    <a href="{{ route('articles.index') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:underline">Berita</a>
                    <a href="{{ route('about') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:underline">About</a>
                    <a href="{{ route('contact.create') }}" class="text-sm text-gray-700 dark:text-gray-300 hover:underline">Contact</a>
                </nav>

                <!-- Dark mode toggle -->
                <button id="dark-mode-toggle" aria-label="Toggle dark mode"
                        class="p-2 rounded-md bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-100 hover:scale-105 transition transform">
                    <svg id="icon-sun" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.36 6.36-1.42-1.42M7.05 6.05 5.63 4.63M18.36 5.64 16.95 7.05M6.34 17.66 4.93 16.25"/>
                    </svg>
                    <svg id="icon-moon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-100 dark:bg-gray-800 border-t dark:border-gray-700">
        <div class="container mx-auto px-4 py-6 text-center text-sm text-gray-600 dark:text-gray-300">
            © {{ date('Y') }} Nyxx Farm — Semua hak cipta.
        </div>
    </footer>

    <script>
      (function() {
        const root = document.documentElement;
        const toggle = document.getElementById('dark-mode-toggle');
        const iconSun = document.getElementById('icon-sun');
        const iconMoon = document.getElementById('icon-moon');

        // read preference: localStorage -> system preference
        function getPreferredTheme() {
          const stored = localStorage.getItem('nyxx-theme');
          if (stored === 'dark' || stored === 'light') return stored;
          // follow system
          return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        }

        // apply theme
        function applyTheme(theme) {
          if (theme === 'dark') {
            root.classList.add('dark');
            iconMoon.classList.remove('hidden');
            iconSun.classList.add('hidden');
          } else {
            root.classList.remove('dark');
            iconSun.classList.remove('hidden');
            iconMoon.classList.add('hidden');
          }
        }

        // toggle handler
        toggle.addEventListener('click', function() {
          const current = root.classList.contains('dark') ? 'dark' : 'light';
          const next = current === 'dark' ? 'light' : 'dark';
          localStorage.setItem('nyxx-theme', next);
          applyTheme(next);
        });

        // init
        applyTheme(getPreferredTheme());
      })();
    </script>

</body>
</html>
