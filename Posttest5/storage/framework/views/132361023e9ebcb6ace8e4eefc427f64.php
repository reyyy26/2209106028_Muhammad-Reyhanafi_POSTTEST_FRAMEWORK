<?php $__env->startSection('title', 'Tambah Rekam Medis'); ?>
<?php $__env->startSection('heading', 'Tambah Rekam Medis'); ?>
<?php $__env->startSection('subheading', 'Catat diagnosa, perawatan, dan lampiran klinis terbaru'); ?>

<?php $__env->startSection('content'); ?>
  <form method="POST" action="<?php echo e(route('doctor.records.store')); ?>" enctype="multipart/form-data" class="space-y-6">
    <?php echo csrf_field(); ?>

    <div class="grid gap-6 rounded-2xl border border-white/5 bg-white/5 p-6 xl:grid-cols-3">
      <div class="xl:col-span-2 space-y-6">
        <div class="grid gap-4 md:grid-cols-2">
          <div>
            <label class="block text-sm font-medium text-slate-200">Hewan</label>
            <select name="animal_id" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40" required>
              <option value="">Pilih hewan</option>
              <?php $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($animal->id); ?>" <?php if(old('animal_id') == $animal->id): echo 'selected'; endif; ?>><?php echo e($animal->name); ?> (<?php echo e($animal->species); ?>)</option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-200">Nama Dokter</label>
            <input type="text" name="veterinarian_name" value="<?php echo e(old('veterinarian_name')); ?>" required class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
          </div>
        </div>

        <div class="grid gap-4 md:grid-cols-3">
          <div>
            <label class="block text-sm font-medium text-slate-200">Jenis Perawatan</label>
            <input type="text" name="treatment_type" value="<?php echo e(old('treatment_type')); ?>" required class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-200">Tanggal</label>
            <input type="date" name="treatment_date" value="<?php echo e(old('treatment_date', now()->toDateString())); ?>" required class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-200">Jam</label>
            <input type="time" name="treatment_time" value="<?php echo e(old('treatment_time', now()->format('H:i'))); ?>" required class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
          </div>
        </div>

        <div class="grid gap-4 md:grid-cols-3">
          <div>
            <label class="block text-sm font-medium text-slate-200">Status</label>
            <select name="status" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
              <option value="scheduled" <?php if(old('status') === 'scheduled'): echo 'selected'; endif; ?>>Terjadwal</option>
              <option value="in_progress" <?php if(old('status') === 'in_progress'): echo 'selected'; endif; ?>>Berlangsung</option>
              <option value="completed" <?php if(old('status', 'completed') === 'completed'): echo 'selected'; endif; ?>>Selesai</option>
              <option value="cancelled" <?php if(old('status') === 'cancelled'): echo 'selected'; endif; ?>>Dibatalkan</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-200">Severity</label>
            <select name="severity" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
              <option value="low" <?php if(old('severity') === 'low'): echo 'selected'; endif; ?>>Rendah</option>
              <option value="medium" <?php if(old('severity', 'medium') === 'medium'): echo 'selected'; endif; ?>>Sedang</option>
              <option value="high" <?php if(old('severity') === 'high'): echo 'selected'; endif; ?>>Tinggi</option>
              <option value="critical" <?php if(old('severity') === 'critical'): echo 'selected'; endif; ?>>Kritis</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-200">Kontrol Lanjutan</label>
            <input type="datetime-local" name="next_checkup" value="<?php echo e(old('next_checkup')); ?>" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
          </div>
        </div>

        <div class="grid gap-4 md:grid-cols-3">
          <div>
            <label class="block text-sm font-medium text-slate-200">Biaya (Rp)</label>
            <input type="number" step="0.01" name="cost" value="<?php echo e(old('cost')); ?>" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-200">Berat Saat Perawatan (kg)</label>
            <input type="number" step="0.01" name="weight_at_treatment" value="<?php echo e(old('weight_at_treatment')); ?>" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-200">Suhu Tubuh (°C)</label>
            <input type="number" step="0.1" name="temperature" value="<?php echo e(old('temperature')); ?>" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
          </div>
        </div>

        <div class="flex items-center gap-6">
          <label class="inline-flex items-center gap-2 text-sm text-slate-200">
            <input type="checkbox" name="is_emergency" value="1" class="h-4 w-4 rounded border border-white/20 bg-slate-900" <?php if(old('is_emergency')): echo 'checked'; endif; ?>>
            Kasus darurat
          </label>
          <label class="inline-flex items-center gap-2 text-sm text-slate-200">
            <input type="checkbox" name="requires_followup" value="1" class="h-4 w-4 rounded border border-white/20 bg-slate-900" <?php if(old('requires_followup')): echo 'checked'; endif; ?>>
            Perlu tindak lanjut
          </label>
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-200">Diagnosa</label>
          <textarea name="diagnosis" rows="4" required class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40"><?php echo e(old('diagnosis')); ?></textarea>
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-200">Catatan Perawatan</label>
          <textarea name="treatment_notes" rows="4" class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40"><?php echo e(old('treatment_notes')); ?></textarea>
        </div>
      </div>

      <div class="space-y-6">
        <div>
          <label class="block text-sm font-medium text-slate-200">Daftar Obat</label>
          <p class="mt-1 text-xs text-slate-400">Isi maksimal lima item obat.</p>
          <div class="mt-3 space-y-2">
            <?php for($i = 0; $i < 5; $i++): ?>
              <input type="text" name="medications[]" value="<?php echo e(old('medications.'.$i)); ?>" placeholder="Nama obat" class="w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
            <?php endfor; ?>
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-200">Hasil Lab</label>
          <p class="mt-1 text-xs text-slate-400">Masukkan nama parameter dan nilainya.</p>
          <div class="mt-3 space-y-3">
            <?php for($i = 0; $i < 3; $i++): ?>
              <div class="flex gap-2">
                <input type="text" name="lab_results[<?php echo e($i); ?>][name]" value="<?php echo e(old('lab_results.'.$i.'.name')); ?>" placeholder="Parameter" class="w-1/2 rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
                <input type="text" name="lab_results[<?php echo e($i); ?>][value]" value="<?php echo e(old('lab_results.'.$i.'.value')); ?>" placeholder="Nilai" class="w-1/2 rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
              </div>
            <?php endfor; ?>
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-slate-200">Lampiran (pdf/gambar)</label>
          <input type="file" name="attachments[]" multiple class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
          <p class="mt-1 text-xs text-slate-400">Ukuran maksimal per berkas 4MB.</p>
        </div>
      </div>
    </div>

    <div class="flex justify-end gap-3">
      <a href="<?php echo e(route('doctor.records.index')); ?>" class="rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/10">Batal</a>
      <button type="submit" class="rounded-xl bg-gradient-to-r from-emerald-500 via-teal-400 to-sky-500 px-5 py-2 text-sm font-semibold text-slate-900 shadow-lg shadow-emerald-500/30 transition hover:brightness-110">Simpan Rekam Medis</button>
    </div>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/doctor/records/create.blade.php ENDPATH**/ ?>