<?php
  use Illuminate\Support\Str;
?>

<?php $__env->startSection('title', 'Rekam Medis'); ?>
<?php $__env->startSection('heading', 'Rekam Medis Ternak'); ?>
<?php $__env->startSection('subheading', 'Kelola catatan kesehatan hewan dan tindak lanjutnya'); ?>

<?php $__env->startSection('actions'); ?>
  <a href="<?php echo e(route('doctor.records.create')); ?>" class="rounded-xl bg-gradient-to-r from-emerald-500 via-teal-400 to-sky-500 px-4 py-2 text-sm font-semibold text-slate-900 shadow-lg shadow-emerald-500/30 transition hover:brightness-110">Tambah Rekam Medis</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <form method="GET" action="<?php echo e(route('doctor.records.index')); ?>" class="mb-6 grid gap-3 rounded-2xl border border-white/5 bg-white/5 p-4 text-sm md:grid-cols-5">
    <div class="md:col-span-2">
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Cari</label>
      <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Diagnosis atau jenis perawatan" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
    </div>
    <div>
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Status</label>
      <select name="status" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
        <option value="" <?php if(!$status): echo 'selected'; endif; ?>>Semua</option>
        <option value="scheduled" <?php if($status === 'scheduled'): echo 'selected'; endif; ?>>Terjadwal</option>
        <option value="in_progress" <?php if($status === 'in_progress'): echo 'selected'; endif; ?>>Berlangsung</option>
        <option value="completed" <?php if($status === 'completed'): echo 'selected'; endif; ?>>Selesai</option>
        <option value="cancelled" <?php if($status === 'cancelled'): echo 'selected'; endif; ?>>Dibatalkan</option>
      </select>
    </div>
    <div>
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Severity</label>
      <select name="severity" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
        <option value="" <?php if(!$severity): echo 'selected'; endif; ?>>Semua</option>
        <option value="low" <?php if($severity === 'low'): echo 'selected'; endif; ?>>Rendah</option>
        <option value="medium" <?php if($severity === 'medium'): echo 'selected'; endif; ?>>Sedang</option>
        <option value="high" <?php if($severity === 'high'): echo 'selected'; endif; ?>>Tinggi</option>
        <option value="critical" <?php if($severity === 'critical'): echo 'selected'; endif; ?>>Kritis</option>
      </select>
    </div>
    <div>
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Spesies</label>
      <select name="species" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
        <option value="" <?php if(!$species): echo 'selected'; endif; ?>>Semua</option>
        <?php $__currentLoopData = $speciesOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($option); ?>" <?php if($species === $option): echo 'selected'; endif; ?>><?php echo e($option); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
          <th class="px-4 py-3 text-left">Hewan</th>
          <th class="px-4 py-3 text-left">Diagnosa</th>
          <th class="px-4 py-3 text-left">Severity</th>
          <th class="px-4 py-3 text-left">Status</th>
          <th class="px-4 py-3 text-left">Tanggal</th>
          <th class="px-4 py-3"></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-white/5 text-slate-200">
        <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td class="px-4 py-4">
              <div class="font-semibold"><?php echo e($record->animal?->name); ?></div>
              <div class="text-xs text-slate-400"><?php echo e($record->animal?->species); ?></div>
            </td>
            <td class="px-4 py-4 text-sm"><?php echo e(Str::limit($record->diagnosis, 80)); ?></td>
            <td class="px-4 py-4">
              <span class="rounded-full px-3 py-1 text-xs font-semibold <?php echo e(match($record->severity) {
                  'low' => 'bg-emerald-500/10 text-emerald-200',
                  'medium' => 'bg-amber-500/10 text-amber-200',
                  'high' => 'bg-orange-500/10 text-orange-200',
                  'critical' => 'bg-red-500/10 text-red-200',
                  default => 'bg-slate-500/10 text-slate-200'
              }); ?>"><?php echo e(ucfirst($record->severity)); ?></span>
            </td>
            <td class="px-4 py-4">
              <span class="rounded-full bg-white/10 px-3 py-1 text-xs text-slate-200"><?php echo e(ucwords(str_replace('_', ' ', $record->status))); ?></span>
            </td>
            <td class="px-4 py-4 text-xs text-slate-400"><?php echo e(optional($record->treatment_date)->format('d M Y')); ?></td>
            <td class="px-4 py-4 text-right">
              <div class="flex justify-end gap-2">
                <a href="<?php echo e(route('doctor.records.edit', $record)); ?>" class="rounded-lg border border-white/10 px-3 py-2 text-xs text-slate-200 transition hover:bg-white/10">Kelola</a>
                <form action="<?php echo e(route('doctor.records.destroy', $record)); ?>" method="POST" onsubmit="return confirm('Hapus rekam medis ini?')">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit" class="rounded-lg border border-red-400/50 bg-red-500/10 px-3 py-2 text-xs font-semibold text-red-200 transition hover:bg-red-500/20">Hapus</button>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="6" class="px-4 py-10 text-center text-sm text-slate-400">Belum ada rekam medis.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="mt-6 text-sm text-slate-300">
    <?php echo e($records->links()); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/doctor/records/index.blade.php ENDPATH**/ ?>