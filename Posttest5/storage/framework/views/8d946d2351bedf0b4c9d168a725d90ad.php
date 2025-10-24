<?php $__env->startSection('title', 'Masuk Akun'); ?>

<?php $__env->startSection('content'); ?>
  <h1 class="text-2xl font-semibold mb-6">Masuk ke akun Anda</h1>

  <?php if(session('status')): ?>
    <div class="mb-4 rounded-lg border border-emerald-500/40 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
      <?php echo e(session('status')); ?>

    </div>
  <?php endif; ?>

  <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-5">
    <?php echo csrf_field(); ?>

    <div>
      <label for="email" class="block text-sm font-medium text-slate-300">Email</label>
      <input
        id="email"
        type="email"
        name="email"
        value="<?php echo e(old('email')); ?>"
        required
        autofocus
        class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/60 px-4 py-3 text-sm outline-none transition focus:border-emerald-400/60 focus:ring-2 focus:ring-emerald-400/40"
      >
      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="mt-2 text-xs text-red-300"><?php echo e($message); ?></p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div>
      <div class="flex items-center justify-between">
        <label for="password" class="block text-sm font-medium text-slate-300">Password</label>
        <a href="<?php echo e(route('password.request')); ?>" class="text-xs text-emerald-300 hover:text-emerald-200">Lupa password?</a>
      </div>
      <input
        id="password"
        type="password"
        name="password"
        required
        class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/60 px-4 py-3 text-sm outline-none transition focus:border-emerald-400/60 focus:ring-2 focus:ring-emerald-400/40"
      >
      <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="mt-2 text-xs text-red-300"><?php echo e($message); ?></p>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <label class="inline-flex items-center gap-2 text-sm text-slate-300">
      <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border border-white/10 bg-slate-950/60">
      Ingat saya di perangkat ini
    </label>

    <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-emerald-500 via-teal-400 to-sky-500 px-4 py-3 text-sm font-semibold text-slate-900 shadow-lg shadow-emerald-500/30 transition hover:brightness-110">
      Masuk
    </button>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest5\resources\views/auth/login.blade.php ENDPATH**/ ?>