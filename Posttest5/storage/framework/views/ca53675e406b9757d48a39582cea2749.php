<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('heading', 'Dashboard'); ?>
<?php $__env->startSection('subheading', 'Ringkasan aktivitas menyesuaikan peran Anda'); ?>

<?php $__env->startSection('content'); ?>
  <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
    <?php $__empty_1 = true; $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="rounded-2xl border border-white/5 bg-gradient-to-br from-slate-900/60 via-slate-900/40 to-slate-800/40 p-6 shadow-lg shadow-black/20">
        <div class="text-xs uppercase tracking-wider text-slate-400"><?php echo e($stat['title']); ?></div>
        <div class="mt-4 text-4xl font-semibold text-white"><?php echo e($stat['value']); ?></div>
        <div class="mt-2 text-sm text-slate-300/80"><?php echo e($stat['description']); ?></div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="rounded-2xl border border-white/5 bg-white/5 p-6 text-sm text-slate-300">
        Tidak ada statistik yang dapat ditampilkan untuk peran Anda saat ini.
      </div>
    <?php endif; ?>
  </div>

  <?php if($upcoming->isNotEmpty()): ?>
    <div class="mt-8">
      <h2 class="text-lg font-semibold text-white">Agenda Perawatan Terjadwal</h2>
      <div class="mt-4 overflow-hidden rounded-2xl border border-white/5 bg-white/5">
        <table class="min-w-full divide-y divide-white/5 text-sm">
          <thead class="bg-white/5 text-xs uppercase tracking-wider text-slate-400">
            <tr>
              <th class="px-4 py-3 text-left">Hewan</th>
              <th class="px-4 py-3 text-left">Jenis Perawatan</th>
              <th class="px-4 py-3 text-left">Tanggal</th>
              <th class="px-4 py-3 text-left">Dokter</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-white/5 text-slate-200">
            <?php $__currentLoopData = $upcoming; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="px-4 py-3"><?php echo e($record->animal?->name); ?></td>
                <td class="px-4 py-3"><?php echo e($record->treatment_type); ?></td>
                <td class="px-4 py-3 text-xs text-slate-300"><?php echo e($record->treatment_date?->format('d M Y')); ?></td>
                <td class="px-4 py-3 text-xs text-slate-300"><?php echo e($record->veterinarian_name); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest5\resources\views/dashboard/index.blade.php ENDPATH**/ ?>