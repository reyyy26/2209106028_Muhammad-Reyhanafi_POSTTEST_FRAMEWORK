<?php
  use Illuminate\Support\Str;
?>

<?php $__env->startSection('title', 'Permintaan Bantuan'); ?>
<?php $__env->startSection('heading', 'Permintaan Bantuan'); ?>
<?php $__env->startSection('subheading', 'Pantau status permintaan dan respon dari tim pusat'); ?>

<?php $__env->startSection('actions'); ?>
  <a href="<?php echo e(route('staff.help.create')); ?>" class="rounded-xl bg-gradient-to-r from-emerald-500 via-teal-400 to-sky-500 px-4 py-2 text-sm font-semibold text-slate-900 shadow-lg shadow-emerald-500/30 transition hover:brightness-110">Permintaan Baru</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="overflow-hidden rounded-2xl border border-white/5 bg-white/5">
    <table class="min-w-full divide-y divide-white/5 text-sm">
      <thead class="bg-white/5 text-xs uppercase tracking-wider text-slate-400">
        <tr>
          <th class="px-4 py-3 text-left">Judul</th>
          <th class="px-4 py-3 text-left">Status</th>
          <th class="px-4 py-3 text-left">Dibuat</th>
          <th class="px-4 py-3 text-left">Respon</th>
          <th class="px-4 py-3"></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-white/5 text-slate-200">
        <?php $__empty_1 = true; $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $help): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td class="px-4 py-4">
              <div class="font-semibold text-white"><?php echo e($help->title); ?></div>
              <div class="text-xs text-slate-400"><?php echo e(Str::limit($help->message, 80)); ?></div>
            </td>
            <td class="px-4 py-4 text-xs text-slate-300">
              <span class="rounded-full bg-white/10 px-3 py-1"><?php echo e(ucwords(str_replace('_', ' ', $help->status))); ?></span>
            </td>
            <td class="px-4 py-4 text-xs text-slate-400"><?php echo e($help->created_at->diffForHumans()); ?></td>
            <td class="px-4 py-4 text-xs text-slate-300"><?php echo e($help->handler?->name ?? 'Belum ditangani'); ?></td>
            <td class="px-4 py-4 text-right">
              <div class="flex justify-end gap-2">
                <a href="<?php echo e(route('staff.help.show', $help)); ?>" class="rounded-lg border border-white/10 px-3 py-2 text-xs text-slate-200 transition hover:bg-white/10">Detail</a>
                <?php if($help->status === 'new'): ?>
                  <form action="<?php echo e(route('staff.help.destroy', $help)); ?>" method="POST" onsubmit="return confirm('Batalkan permintaan ini?')">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="rounded-lg border border-red-400/50 bg-red-500/10 px-3 py-2 text-xs font-semibold text-red-200 transition hover:bg-red-500/20">Batalkan</button>
                  </form>
                <?php endif; ?>
              </div>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="5" class="px-4 py-10 text-center text-sm text-slate-300">Tidak ada permintaan bantuan.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="mt-6 text-sm text-slate-300">
    <?php echo e($requests->links()); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/staff/help/index.blade.php ENDPATH**/ ?>