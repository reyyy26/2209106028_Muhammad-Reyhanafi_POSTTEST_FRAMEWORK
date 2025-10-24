<?php
  use Illuminate\Support\Str;
?>

<?php $__env->startSection('title', 'Dashboard Kesehatan'); ?>
<?php $__env->startSection('heading', 'Dashboard Kesehatan Hewan'); ?>
<?php $__env->startSection('subheading', 'Pantau tren kesehatan, jadwal vaksinasi, dan alert tindak lanjut'); ?>

<?php $__env->startSection('content'); ?>
  <form method="GET" action="<?php echo e(route('doctor.health')); ?>" class="mb-6 grid gap-3 rounded-2xl border border-white/5 bg-white/5 p-4 text-sm md:grid-cols-4">
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
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Tanggal Mulai</label>
      <input type="date" name="start_date" value="<?php echo e($start); ?>" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
    </div>
    <div>
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Tanggal Akhir</label>
      <input type="date" name="end_date" value="<?php echo e($end); ?>" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
    </div>
    <div class="flex items-end">
      <button type="submit" class="w-full rounded-xl border border-emerald-400/50 bg-emerald-500/10 px-4 py-2 font-semibold text-emerald-200 transition hover:bg-emerald-500/20">Terapkan</button>
    </div>
  </form>

  <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
    <div class="rounded-2xl border border-white/5 bg-white/5 p-5">
      <p class="text-xs uppercase tracking-wider text-slate-400">Total Kasus</p>
      <p class="mt-3 text-3xl font-semibold text-white"><?php echo e($stats['total']); ?></p>
      <p class="mt-1 text-sm text-slate-300/80">Catatan rekam medis dalam rentang terpilih</p>
    </div>
    <div class="rounded-2xl border border-white/5 bg-white/5 p-5">
      <p class="text-xs uppercase tracking-wider text-slate-400">Darurat</p>
      <p class="mt-3 text-3xl font-semibold text-emerald-300"><?php echo e($stats['emergency']); ?></p>
      <p class="mt-1 text-sm text-slate-300/80">Kasus dengan status darurat</p>
    </div>
    <div class="rounded-2xl border border-white/5 bg-white/5 p-5">
      <p class="text-xs uppercase tracking-wider text-slate-400">Severity Tinggi</p>
      <p class="mt-3 text-3xl font-semibold text-amber-300"><?php echo e($stats['critical']); ?></p>
      <p class="mt-1 text-sm text-slate-300/80">Kasus High & Critical</p>
    </div>
    <div class="rounded-2xl border border-white/5 bg-white/5 p-5">
      <p class="text-xs uppercase tracking-wider text-slate-400">Terjadwal</p>
      <p class="mt-3 text-3xl font-semibold text-sky-300"><?php echo e($stats['scheduled']); ?></p>
      <p class="mt-1 text-sm text-slate-300/80">Perawatan terjadwal mendatang</p>
    </div>
  </div>

  <div class="mt-8 grid gap-6 lg:grid-cols-2">
    <div class="rounded-2xl border border-white/5 bg-white/5 p-6">
      <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold text-white">Agenda Vaksin</h2>
        <span class="text-xs text-slate-400">5 entri terdekat</span>
      </div>
      <div class="mt-4 space-y-3">
        <?php $__empty_1 = true; $__currentLoopData = $vaccinationSchedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="rounded-xl border border-white/10 bg-white/5 p-4 text-sm text-slate-200">
            <div class="flex items-center justify-between">
              <p class="font-semibold"><?php echo e($item->animal?->name); ?></p>
              <span class="text-xs text-slate-400"><?php echo e(optional($item->treatment_date)->format('d M Y')); ?></span>
            </div>
            <p class="mt-1 text-xs uppercase tracking-wide text-emerald-300"><?php echo e($item->treatment_type); ?></p>
            <p class="mt-2 text-sm text-slate-300"><?php echo e(Str::limit($item->diagnosis, 90)); ?></p>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <p class="text-sm text-slate-300">Tidak ada jadwal vaksin yang terjadwal.</p>
        <?php endif; ?>
      </div>
    </div>

    <div class="rounded-2xl border border-white/5 bg-white/5 p-6">
      <div class="flex items-center justify-between">
        <h2 class="text-lg font-semibold text-white">Alert & Follow-up</h2>
        <span class="text-xs text-slate-400">Perlu perhatian dalam 7 hari</span>
      </div>
      <div class="mt-4 space-y-3">
        <?php $__empty_1 = true; $__currentLoopData = $alerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="rounded-xl border border-red-400/30 bg-red-500/10 p-4 text-sm text-slate-200">
            <div class="flex items-center justify-between">
              <p class="font-semibold"><?php echo e($alert->animal?->name); ?></p>
              <span class="rounded-full bg-red-500/20 px-3 py-1 text-xs text-red-200"><?php echo e(ucfirst($alert->severity)); ?></span>
            </div>
            <p class="mt-2 text-sm"><?php echo e(Str::limit($alert->diagnosis, 80)); ?></p>
            <?php if($alert->next_checkup): ?>
              <p class="mt-2 text-xs text-red-200">Kontrol lanjutan: <?php echo e($alert->next_checkup?->diffForHumans()); ?></p>
            <?php endif; ?>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <p class="text-sm text-slate-300">Tidak ada alert mendesak.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="mt-8 rounded-2xl border border-white/5 bg-white/5 p-6">
    <h2 class="text-lg font-semibold text-white">Catatan Terbaru</h2>
    <div class="mt-4 overflow-x-auto">
      <table class="min-w-full divide-y divide-white/5 text-sm">
        <thead class="bg-white/5 text-xs uppercase tracking-wider text-slate-400">
          <tr>
            <th class="px-4 py-3 text-left">Hewan</th>
            <th class="px-4 py-3 text-left">Perawatan</th>
            <th class="px-4 py-3 text-left">Diagnosa</th>
            <th class="px-4 py-3 text-left">Tanggal</th>
            <th class="px-4 py-3 text-left">Status</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-white/5 text-slate-200">
          <?php $__empty_1 = true; $__currentLoopData = $recentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td class="px-4 py-3">
                <div class="font-semibold"><?php echo e($record->animal?->name); ?></div>
                <div class="text-xs text-slate-400"><?php echo e($record->animal?->species); ?></div>
              </td>
              <td class="px-4 py-3 text-xs text-slate-300"><?php echo e($record->treatment_type); ?></td>
              <td class="px-4 py-3 text-sm"><?php echo e(Str::limit($record->diagnosis, 80)); ?></td>
              <td class="px-4 py-3 text-xs text-slate-400"><?php echo e(optional($record->treatment_date)->format('d M Y')); ?></td>
              <td class="px-4 py-3 text-xs text-slate-300"><?php echo e(ucwords(str_replace('_', ' ', $record->status))); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="5" class="px-4 py-6 text-center text-sm text-slate-300">Belum ada rekam medis pada rentang ini.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/doctor/health/index.blade.php ENDPATH**/ ?>