<?php $__env->startSection('title', 'Laporan Harian'); ?>
<?php $__env->startSection('heading', 'Laporan Harian Ternak'); ?>
<?php $__env->startSection('subheading', 'Catatan konsumsi pakan, suhu, dan status populasi harian'); ?>

<?php $__env->startSection('actions'); ?>
  <a href="<?php echo e(route('staff.reports.create')); ?>" class="rounded-xl bg-gradient-to-r from-emerald-500 via-teal-400 to-sky-500 px-4 py-2 text-sm font-semibold text-slate-900 shadow-lg shadow-emerald-500/30 transition hover:brightness-110">Tambah Laporan</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
  use Illuminate\Support\Str;
?>

  <div class="overflow-hidden rounded-2xl border border-white/5 bg-white/5">
    <table class="min-w-full divide-y divide-white/5 text-sm">
      <thead class="bg-white/5 text-xs uppercase tracking-wider text-slate-400">
        <tr>
          <th class="px-4 py-3 text-left">Tanggal</th>
          <th class="px-4 py-3 text-left">Pakan (kg)</th>
          <th class="px-4 py-3 text-left">Air (L)</th>
          <th class="px-4 py-3 text-left">Suhu (°C)</th>
          <th class="px-4 py-3 text-left">Mortalitas</th>
          <th class="px-4 py-3 text-left">Catatan</th>
          <th class="px-4 py-3"></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-white/5 text-slate-200">
        <?php $__empty_1 = true; $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td class="px-4 py-4 text-sm text-slate-200"><?php echo e($report->report_date->format('d M Y')); ?></td>
            <td class="px-4 py-4 text-sm text-slate-300"><?php echo e($report->feed_quantity ?? '—'); ?></td>
            <td class="px-4 py-4 text-sm text-slate-300"><?php echo e($report->water_consumption ?? '—'); ?></td>
            <td class="px-4 py-4 text-sm text-slate-300"><?php echo e($report->average_temperature ?? '—'); ?></td>
            <td class="px-4 py-4 text-sm text-slate-300"><?php echo e($report->mortality); ?></td>
            <td class="px-4 py-4 text-sm text-slate-300"><?php echo e(Str::limit($report->notes, 60)); ?></td>
            <td class="px-4 py-4 text-right">
              <div class="flex justify-end gap-2">
                <a href="<?php echo e(route('staff.reports.edit', $report)); ?>" class="rounded-lg border border-white/10 px-3 py-2 text-xs text-slate-200 transition hover:bg-white/10">Edit</a>
                <form action="<?php echo e(route('staff.reports.destroy', $report)); ?>" method="POST" onsubmit="return confirm('Hapus laporan ini?')">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit" class="rounded-lg border border-red-400/50 bg-red-500/10 px-3 py-2 text-xs font-semibold text-red-200 transition hover:bg-red-500/20">Hapus</button>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="7" class="px-4 py-10 text-center text-sm text-slate-300">Belum ada laporan.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="mt-6 text-sm text-slate-300">
    <?php echo e($reports->links()); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/staff/reports/index.blade.php ENDPATH**/ ?>