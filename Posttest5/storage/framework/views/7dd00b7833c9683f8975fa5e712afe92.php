<?php $__env->startSection('title', 'Data Hewan'); ?>
<?php $__env->startSection('heading', 'Data Hewan'); ?>
<?php $__env->startSection('subheading', 'Kelola informasi hewan ternak dan statistiknya'); ?>

<?php $__env->startSection('actions'); ?>
  <a href="<?php echo e(route('admin.animals.create')); ?>" class="rounded-xl bg-gradient-to-r from-emerald-500 via-teal-400 to-sky-500 px-4 py-2 text-sm font-semibold text-slate-900 shadow-lg shadow-emerald-500/30 transition hover:brightness-110">Tambah Hewan</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <form method="GET" action="<?php echo e(route('admin.animals.index')); ?>" class="mb-6 grid gap-3 rounded-2xl border border-white/5 bg-white/5 p-4 text-sm md:grid-cols-4">
    <div>
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Spesies</label>
      <select name="species" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
        <option value="" <?php if(!$species): echo 'selected'; endif; ?>>Semua</option>
        <?php $__currentLoopData = $speciesOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($option); ?>" <?php if($species === $option): echo 'selected'; endif; ?>><?php echo e($option); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
    <div>
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Status Kesehatan</label>
      <select name="status" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
        <option value="" <?php if(!$status): echo 'selected'; endif; ?>>Semua</option>
        <?php $__currentLoopData = $healthStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($option); ?>" <?php if($status === $option): echo 'selected'; endif; ?>><?php echo e($option); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
    </div>
    <div class="md:col-span-2 flex items-end">
      <button type="submit" class="rounded-xl border border-emerald-400/50 bg-emerald-500/10 px-4 py-2 font-semibold text-emerald-200 transition hover:bg-emerald-500/20">Filter</button>
    </div>
  </form>

  <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
    <?php $__empty_1 = true; $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="rounded-2xl border border-white/5 bg-white/5 p-5">
        <div class="flex items-start justify-between">
          <div>
            <div class="text-sm uppercase tracking-wide text-slate-400"><?php echo e($animal->species); ?></div>
            <h3 class="mt-1 text-lg font-semibold"><?php echo e($animal->name); ?></h3>
          </div>
          <span class="rounded-full bg-emerald-500/10 px-3 py-1 text-xs text-emerald-200"><?php echo e($animal->health_status ?? 'N/A'); ?></span>
        </div>
        <div class="mt-4 space-y-2 text-sm text-slate-300">
          <div>Umur: <?php echo e($animal->age); ?> tahun</div>
          <div>Berat: <?php echo e($animal->weight ? number_format($animal->weight, 2).' kg' : '—'); ?></div>
          <div>Lokasi: <?php echo e($animal->location ?? '—'); ?></div>
          <div>Rekam Medis: <?php echo e($animal->veterinary_records_count); ?></div>
        </div>
        <div class="mt-4 flex justify-between text-xs text-slate-400">
          <div><?php echo e($animal->gender ?: '—'); ?></div>
          <div><?php echo e(optional($animal->created_at)->diffForHumans()); ?></div>
        </div>
        <div class="mt-5 flex justify-end gap-2">
          <a href="<?php echo e(route('admin.animals.edit', $animal)); ?>" class="rounded-lg border border-white/10 px-3 py-2 text-xs text-slate-200 transition hover:bg-white/10">Kelola</a>
          <form action="<?php echo e(route('admin.animals.destroy', $animal)); ?>" method="POST" onsubmit="return confirm('Hapus data hewan ini?')">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="rounded-lg border border-red-400/50 bg-red-500/10 px-3 py-2 text-xs font-semibold text-red-200 transition hover:bg-red-500/20">Hapus</button>
          </form>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <div class="rounded-2xl border border-white/5 bg-white/5 p-6 text-center text-sm text-slate-300">Belum ada data hewan.</div>
    <?php endif; ?>
  </div>

  <div class="mt-6 text-sm text-slate-300">
    <?php echo e($animals->links()); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/admin/animals/index.blade.php ENDPATH**/ ?>