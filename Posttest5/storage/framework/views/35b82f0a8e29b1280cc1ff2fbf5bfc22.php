<!doctype html>
<html lang="id" class="antialiased">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?php echo $__env->yieldContent('title', 'Panel'); ?> · Nyxx Farm</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
  <link href="https://fonts.bunny.net/css?family=clash-display:400,500,600,700" rel="stylesheet" />
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="relative min-h-screen overflow-x-hidden bg-slate-950 text-slate-100">
  <div class="aurora-backdrop"></div>
  <?php
    $user = auth()->user();
    $navItems = collect([
      [
        'label' => 'Dashboard',
        'route' => 'dashboard',
        'ability' => null,
        'match' => 'dashboard',
      ],
      [
        'label' => 'Pengguna',
        'route' => 'admin.users.index',
        'ability' => 'manage-users',
        'match' => 'admin.users.*',
      ],
      [
        'label' => 'Konten',
        'route' => 'admin.articles.index',
        'ability' => 'manage-articles',
        'match' => 'admin.articles.*',
      ],
      [
        'label' => 'Pesan',
        'route' => 'admin.contacts.index',
        'ability' => 'manage-contact-messages',
        'match' => 'admin.contacts.*',
      ],
      [
        'label' => 'Bantuan Staf',
        'route' => 'admin.help-requests.index',
        'ability' => 'manage-contact-messages',
        'match' => 'admin.help-requests.*',
      ],
      [
        'label' => 'Data Hewan',
        'route' => 'admin.animals.index',
        'ability' => 'manage-animals',
        'match' => 'admin.animals.*',
      ],
      [
        'label' => 'Rekam Medis',
        'route' => 'doctor.records.index',
        'ability' => 'manage-veterinary-records',
        'match' => 'doctor.records.*',
      ],
      [
        'label' => 'Data Hewan',
        'route' => 'doctor.animals',
        'ability' => 'view-veterinary-analytics',
        'match' => 'doctor.animals',
      ],
      [
        'label' => 'Statistik Kesehatan',
        'route' => 'doctor.health',
        'ability' => 'view-veterinary-analytics',
        'match' => 'doctor.health',
      ],
      [
        'label' => 'Laporan Harian',
        'route' => 'staff.reports.index',
        'ability' => 'manage-daily-reports',
        'match' => 'staff.reports.*',
      ],
      [
        'label' => 'Permintaan Bantuan',
        'route' => 'staff.help.index',
        'ability' => 'submit-help-request',
        'match' => 'staff.help.*',
      ],
    ])->filter(function ($item) use ($user) {
        if (! Route::has($item['route'])) {
            return false;
        }

        if (! $item['ability']) {
            return true;
        }

        return $user && $user->can($item['ability']);
    });
  ?>

  <div class="relative z-10 flex min-h-screen">
    <aside class="hidden w-72 flex-col border-r border-white/5 bg-slate-950/80 px-6 py-8 backdrop-blur lg:flex">
      <div class="mb-8 flex items-center gap-3">
        <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center gap-3">
          <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-400 via-teal-400 to-sky-500 text-lg font-semibold text-slate-900 shadow-lg shadow-emerald-500/30">N</span>
          <span>
            <span class="block text-base font-semibold">Nyxx Farm</span>
            <span class="block text-xs text-slate-300/70">Control Center</span>
          </span>
        </a>
      </div>

      <nav class="flex-1 space-y-2 text-sm">
        <?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a
            href="<?php echo e(route($item['route'])); ?>"
            class="sidebar-link <?php echo e(request()->routeIs($item['match']) ? 'sidebar-link-active' : ''); ?>"
          >
            <span><?php echo e($item['label']); ?></span>
            <?php if(request()->routeIs($item['match'])): ?>
              <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
            <?php endif; ?>
          </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </nav>

      <div class="mt-10 space-y-3 rounded-2xl border border-white/10 bg-white/5 px-4 py-4 text-xs text-slate-300/80">
        <div>
          <p class="text-[0.65rem] uppercase tracking-[0.25em] text-slate-400">Masuk sebagai</p>
          <p class="mt-1 text-sm font-semibold text-white"><?php echo e($user?->name); ?></p>
          <p><?php echo e($user?->email); ?></p>
        </div>
        <form action="<?php echo e(route('logout')); ?>" method="POST" class="pt-2">
          <?php echo csrf_field(); ?>
          <button type="submit" class="button-secondary w-full justify-center">Keluar</button>
        </form>
      </div>
    </aside>

    <main class="flex-1">
      <header class="sticky top-0 z-20 border-b border-white/5 bg-slate-950/80 px-6 py-4 backdrop-blur lg:hidden">
        <div class="flex items-center justify-between">
          <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center gap-3">
            <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-400 via-teal-400 to-sky-500 text-base font-semibold text-slate-900 shadow-lg shadow-emerald-500/30">N</span>
            <span class="text-sm font-semibold text-white">Nyxx Farm</span>
          </a>
          <form action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" class="rounded-lg bg-white/10 px-3 py-2 text-xs font-semibold text-white transition hover:bg-white/20">Keluar</button>
          </form>
        </div>
      </header>

      <div class="space-y-8 px-6 py-8">
        <div class="page-hero">
          <div class="relative z-10 flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div class="space-y-3">
              <span class="page-eyebrow"><?php echo e(mb_strtoupper(strip_tags($__env->yieldContent('title', 'Panel')))); ?></span>
              <h1 class="font-display text-3xl font-semibold text-white">
                <?php echo $__env->yieldContent('heading', $__env->yieldContent('title', 'Panel')); ?>
              </h1>
              <?php if(trim($__env->yieldContent('subheading')) !== ''): ?>
                <p class="text-sm text-slate-200/80"><?php echo $__env->yieldContent('subheading'); ?></p>
              <?php endif; ?>
            </div>

            <?php if (! empty(trim($__env->yieldContent('actions')))): ?>
              <div class="flex flex-wrap items-center gap-3">
                <?php echo $__env->yieldContent('actions'); ?>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <?php if($navItems->isNotEmpty()): ?>
          <div class="data-surface px-4 py-3">
            <div class="flex flex-wrap gap-2 text-xs">
              <?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route($item['route'])); ?>" class="chip <?php echo e(request()->routeIs($item['match']) ? 'chip-active' : ''); ?>">
                  <?php echo e($item['label']); ?>

                </a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
          <div class="alert-soft alert-success">
            <?php echo e(session('success')); ?>

          </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
          <div class="alert-soft alert-danger">
            <ul class="list-disc space-y-1 pl-4">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
      </div>
    </main>
  </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Posttest\Posttest5\resources\views/layouts/admin.blade.php ENDPATH**/ ?>