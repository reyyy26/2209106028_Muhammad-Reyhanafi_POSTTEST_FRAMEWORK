<?php $__env->startSection('title', 'Manajemen Pengguna'); ?>
<?php $__env->startSection('heading', 'Manajemen Pengguna'); ?>
<?php $__env->startSection('subheading', 'Kelola akun dan peran pengguna sistem'); ?>

<?php $__env->startSection('actions'); ?>
  <a href="<?php echo e(route('admin.users.create')); ?>" class="rounded-xl bg-gradient-to-r from-emerald-500 via-teal-400 to-sky-500 px-4 py-2 text-sm font-semibold text-slate-900 shadow-lg shadow-emerald-500/30 transition hover:brightness-110">Tambah Pengguna</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <form method="GET" action="<?php echo e(route('admin.users.index')); ?>" class="mb-6 grid gap-3 rounded-2xl border border-white/5 bg-white/5 p-4 text-sm md:grid-cols-4">
    <div class="md:col-span-2">
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Cari</label>
      <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Nama atau email" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
    </div>
    <div>
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Status</label>
      <select name="status" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
        <option value="" <?php if(!$status): echo 'selected'; endif; ?>>Semua</option>
        <option value="active" <?php if($status === 'active'): echo 'selected'; endif; ?>>Aktif</option>
        <option value="inactive" <?php if($status === 'inactive'): echo 'selected'; endif; ?>>Nonaktif</option>
      </select>
    </div>
    <div class="flex items-end">
      <button type="submit" class="w-full rounded-xl border border-emerald-400/50 bg-emerald-500/10 px-3 py-2 font-semibold text-emerald-200 transition hover:bg-emerald-500/20">Filter</button>
    </div>
  </form>

  <div class="overflow-hidden rounded-2xl border border-white/5 bg-white/5">
    <table class="min-w-full divide-y divide-white/5 text-sm">
      <thead class="bg-white/5 text-xs uppercase tracking-wider text-slate-400">
        <tr>
          <th class="px-4 py-3 text-left">Pengguna</th>
          <th class="px-4 py-3 text-left">Role</th>
          <th class="px-4 py-3 text-left">Status</th>
          <th class="px-4 py-3 text-left">Terakhir login</th>
          <th class="px-4 py-3 text-left">Dibuat oleh</th>
          <th class="px-4 py-3"></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-white/5 text-slate-200">
        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td class="px-4 py-4">
              <div class="font-semibold"><?php echo e($user->name); ?></div>
              <div class="text-xs text-slate-400"><?php echo e($user->email); ?></div>
            </td>
            <td class="px-4 py-4">
              <div class="flex flex-wrap gap-2">
                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <span class="rounded-full bg-emerald-500/10 px-3 py-1 text-xs text-emerald-200"><?php echo e($role->name); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </td>
            <td class="px-4 py-4">
              <?php if($user->status === 'active' && !$user->deactivated_at): ?>
                <span class="rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-semibold text-emerald-200">Aktif</span>
              <?php else: ?>
                <span class="rounded-full bg-red-500/10 px-3 py-1 text-xs font-semibold text-red-200">Nonaktif</span>
              <?php endif; ?>
            </td>
            <td class="px-4 py-4 text-xs text-slate-400"><?php echo e(optional($user->last_login_at)->diffForHumans() ?? 'Belum pernah'); ?></td>
            <td class="px-4 py-4 text-xs text-slate-400">
              <?php echo e($user->creator?->name ?? '—'); ?>

            </td>
            <td class="px-4 py-4 text-right">
              <div class="flex justify-end gap-2">
                <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="rounded-lg border border-white/10 px-3 py-2 text-xs text-slate-200 transition hover:bg-white/10">Kelola</a>
              </div>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="6" class="px-4 py-10 text-center text-sm text-slate-400">Belum ada data pengguna.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="mt-6 text-sm text-slate-300">
    <?php echo e($users->links()); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest5\resources\views/admin/users/index.blade.php ENDPATH**/ ?>