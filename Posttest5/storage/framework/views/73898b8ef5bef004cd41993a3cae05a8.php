<!doctype html>
<html lang="id" class="antialiased">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Nyxx Farm - <?php echo $__env->yieldContent('title'); ?></title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
  <link href="https://fonts.bunny.net/css?family=clash-display:400,500,600,700" rel="stylesheet" />
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="min-h-screen bg-slate-950 text-slate-100 relative overflow-x-hidden">
  <div class="aurora-backdrop"></div>
  <div class="min-h-screen flex flex-col">
    <header class="sticky top-0 z-30 border-b border-white/5 bg-slate-950/70 backdrop-blur">
      <div class="mx-auto flex w-full max-w-6xl items-center justify-between px-4 py-4">
        <a href="<?php echo e(route('nyxx.farm')); ?>" class="flex items-center gap-3">
          <div class="h-11 w-11 rounded-2xl bg-gradient-to-br from-emerald-400 via-teal-400 to-sky-500 text-slate-900 flex items-center justify-center font-bold shadow-lg shadow-emerald-500/30">N</div>
          <div>
            <h1 class="text-lg font-semibold tracking-tight">Nyxx Farm</h1>
            <p class="text-xs text-slate-300/70">Sistem informasi peternakan</p>
          </div>
        </a>

        <?php
          $navigation = [
            ['label' => 'Home', 'route' => 'nyxx.farm', 'active' => 'nyxx.farm'],
            ['label' => 'Berita', 'route' => 'articles.index', 'active' => 'articles.*'],
            ['label' => 'Rekam Medis', 'route' => 'veterinary.records', 'active' => 'veterinary.records'],
            ['label' => 'About', 'route' => 'about', 'active' => 'about'],
            ['label' => 'Contact', 'route' => 'contact.create', 'active' => 'contact.*'],
          ];

          if (Route::has('testimonials')) {
              $navigation[] = ['label' => 'Testimoni', 'route' => 'testimonials', 'active' => 'testimonials'];
          }

          if (auth()->check()) {
              $navigation[] = ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => 'dashboard'];

              if (auth()->user()->can('manage-daily-reports')) {
                  $navigation[] = ['label' => 'Laporan Harian', 'route' => 'staff.reports.index', 'active' => 'staff.reports.*'];
              }

              if (auth()->user()->can('manage-veterinary-records')) {
                  $navigation[] = ['label' => 'Rekam Medis Admin', 'route' => 'doctor.records.index', 'active' => 'doctor.records.*'];
              }
          }
        ?>

        <nav class="hidden items-center gap-2 text-sm font-medium md:flex">
          <?php $__currentLoopData = $navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Route::has($item['route'])): ?>
              <a
                href="<?php echo e(route($item['route'])); ?>"
                class="nav-link <?php echo e(request()->routeIs($item['active']) ? 'border-emerald-400/60 bg-emerald-400/20 text-white shadow-md shadow-emerald-500/30' : ''); ?>"
              >
                <?php echo e($item['label']); ?>

              </a>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>

        <div class="hidden items-center gap-3 md:flex">
          <?php if(auth()->guard()->check()): ?>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
              <?php echo csrf_field(); ?>
              <button type="submit" class="rounded-xl border border-white/10 px-4 py-2 text-sm font-semibold text-slate-200 transition hover:bg-white/10">Keluar</button>
            </form>
          <?php else: ?>
            <?php if(Route::has('login')): ?>
              <a href="<?php echo e(route('login')); ?>" class="rounded-xl border border-white/10 px-4 py-2 text-sm font-semibold text-slate-200 transition hover:bg-white/10">Masuk</a>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    </header>

    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-10">
      <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="border-t border-white/5 bg-slate-950/70 backdrop-blur">
      <div class="mx-auto max-w-6xl px-4 py-6 text-center text-sm text-slate-400">
        © <?php echo e(date('Y')); ?> Nyxx Farm — Semua hak cipta.
      </div>
    </footer>
  </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\Posttest\Posttest5\resources\views/layouts/app.blade.php ENDPATH**/ ?>