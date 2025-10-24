<!doctype html>
<html lang="id" class="antialiased">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?php echo $__env->yieldContent('title', 'Masuk'); ?> · Nyxx Farm</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
  <link href="https://fonts.bunny.net/css?family=clash-display:400,500,600,700" rel="stylesheet" />
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="min-h-screen bg-slate-950 text-slate-100 flex items-center justify-center px-6 py-16">
  <div class="w-full max-w-md">
    <div class="mb-10 text-center">
      <a href="<?php echo e(route('nyxx.farm')); ?>" class="inline-flex items-center gap-3">
        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-400 via-teal-400 to-sky-500 text-lg font-semibold text-slate-900 shadow-lg shadow-emerald-500/30">N</span>
        <span class="text-left">
          <span class="block text-lg font-semibold">Nyxx Farm</span>
          <span class="block text-xs text-slate-300/70">Sistem informasi peternakan</span>
        </span>
      </a>
    </div>

    <div class="rounded-3xl border border-white/5 bg-slate-900/40 p-8 shadow-xl shadow-black/30 backdrop-blur">
      <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Posttest\Posttest5\resources\views/layouts/auth.blade.php ENDPATH**/ ?>