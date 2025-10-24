<?php $__env->startSection('title', 'Data Hewan'); ?>
<?php $__env->startSection('heading', 'Data Hewan Ternak'); ?>
<?php $__env->startSection('subheading', 'Tinjau ringkasan populasi dan riwayat medis per hewan'); ?>

<?php $__env->startSection('content'); ?>
  <form method="GET" action="<?php echo e(route('doctor.animals')); ?>" class="mb-6 flex flex-wrap items-end gap-3 rounded-2xl border border-white/5 bg-white/5 p-4 text-sm">
    <div>
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Spesies</label>
      <select name="species" class="mt-2 rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
        <option value="" <?php if(!$species): echo 'selected'; endif; ?>>Semua</option>
        <?php $__currentLoopData = $speciesOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($option); ?>" <?php if($species === $option): echo 'selected'; endif; ?>><?php echo e($option); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
    <button type="submit" class="rounded-xl border border-emerald-400/50 bg-emerald-500/10 px-4 py-2 font-semibold text-emerald-200 transition hover:bg-emerald-500/20">Filter</button>
  </form>

  <div class="overflow-hidden rounded-2xl border border-white/5 bg-white/5">
    <table class="min-w-full divide-y divide-white/5 text-sm">
      <thead class="bg-white/5 text-xs uppercase tracking-wider text-slate-400">
        <tr>
          <th class="px-4 py-3 text-left">Hewan</th>
          <th class="px-4 py-3 text-left">Detail</th>
          <th class="px-4 py-3 text-left">Status Kesehatan</th>
          <th class="px-4 py-3 text-left">Rekam Medis</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-white/5 text-slate-200">
        <?php $__empty_1 = true; $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td class="px-4 py-4">
              <div class="font-semibold text-white"><?php echo e($animal->name); ?></div>
              <div class="text-xs text-slate-400"><?php echo e($animal->species); ?></div>
            </td>
            <td class="px-4 py-4 text-sm text-slate-300">
              <div>Umur: <?php echo e($animal->age); ?> th</div>
              <div>Berat: <?php echo e($animal->weight ? number_format($animal->weight, 2).' kg' : '—'); ?></div>
              <div>Lokasi: <?php echo e($animal->location ?? '—'); ?></div>
            </td>
            <td class="px-4 py-4 text-xs text-slate-300">
              <span class="rounded-full bg-white/10 px-3 py-1"><?php echo e($animal->health_status ?? 'N/A'); ?></span>
            </td>
            <td class="px-4 py-4 text-xs text-slate-300"><?php echo e($animal->veterinary_records_count); ?> catatan</td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="4" class="px-4 py-8 text-center text-sm text-slate-300">Tidak ada data hewan.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="mt-6 text-sm text-slate-300">
    <?php echo e($animals->links()); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/doctor/animals/index.blade.php ENDPATH**/ ?>