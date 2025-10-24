<?php $__env->startSection('title', 'Pesan Kontak'); ?>
<?php $__env->startSection('heading', 'Pesan Kontak'); ?>
<?php $__env->startSection('subheading', 'Tindak lanjuti pesan yang masuk dari pengunjung'); ?>

<?php $__env->startSection('content'); ?>
  <form method="GET" action="<?php echo e(route('admin.contacts.index')); ?>" class="mb-6 flex flex-wrap items-end gap-3 rounded-2xl border border-white/5 bg-white/5 p-4 text-sm">
    <div>
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Status</label>
      <select name="status" class="mt-2 rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
        <option value="" <?php if(!$status): echo 'selected'; endif; ?>>Semua</option>
        <option value="new" <?php if($status === 'new'): echo 'selected'; endif; ?>>Baru</option>
        <option value="in_progress" <?php if($status === 'in_progress'): echo 'selected'; endif; ?>>Dalam Proses</option>
        <option value="done" <?php if($status === 'done'): echo 'selected'; endif; ?>>Selesai</option>
      </select>
    </div>
    <button type="submit" class="rounded-xl border border-emerald-400/50 bg-emerald-500/10 px-4 py-2 font-semibold text-emerald-200 transition hover:bg-emerald-500/20">Filter</button>
  </form>

  <div class="overflow-hidden rounded-2xl border border-white/5 bg-white/5">
    <table class="min-w-full divide-y divide-white/5 text-sm">
      <thead class="bg-white/5 text-xs uppercase tracking-wider text-slate-400">
        <tr>
          <th class="px-4 py-3 text-left">Pengirim</th>
          <th class="px-4 py-3 text-left">Subjek</th>
          <th class="px-4 py-3 text-left">Status</th>
          <th class="px-4 py-3 text-left">Ditangani Oleh</th>
          <th class="px-4 py-3 text-left">Dikirim</th>
          <th class="px-4 py-3"></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-white/5 text-slate-200">
        <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td class="px-4 py-4">
              <div class="font-semibold"><?php echo e($message->name); ?></div>
              <div class="text-xs text-slate-400"><?php echo e($message->email); ?></div>
            </td>
            <td class="px-4 py-4"><?php echo e($message->subject ?? '—'); ?></td>
            <td class="px-4 py-4">
              <?php
                $badgeClasses = [
                  'new' => 'bg-emerald-500/10 text-emerald-200',
                  'in_progress' => 'bg-amber-500/10 text-amber-200',
                  'done' => 'bg-slate-500/10 text-slate-200',
                ];
              ?>
              <span class="rounded-full px-3 py-1 text-xs font-semibold <?php echo e($badgeClasses[$message->status] ?? 'bg-slate-500/10 text-slate-200'); ?>">
                <?php echo e(ucwords(str_replace('_', ' ', $message->status))); ?>

              </span>
            </td>
            <td class="px-4 py-4 text-xs text-slate-400"><?php echo e($message->handler?->name ?? '—'); ?></td>
            <td class="px-4 py-4 text-xs text-slate-400"><?php echo e(optional($message->created_at)->diffForHumans()); ?></td>
            <td class="px-4 py-4 text-right">
              <a href="<?php echo e(route('admin.contacts.show', $message)); ?>" class="rounded-lg border border-white/10 px-3 py-2 text-xs text-slate-200 transition hover:bg-white/10">Detail</a>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="6" class="px-4 py-10 text-center text-sm text-slate-400">Belum ada pesan.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="mt-6 text-sm text-slate-300">
    <?php echo e($messages->links()); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest5\resources\views/admin/contacts/index.blade.php ENDPATH**/ ?>