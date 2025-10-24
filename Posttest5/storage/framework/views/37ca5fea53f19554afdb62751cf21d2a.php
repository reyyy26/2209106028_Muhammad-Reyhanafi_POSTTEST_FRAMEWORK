<?php $__env->startSection('title', 'Edit Hewan'); ?>
<?php $__env->startSection('heading', 'Edit Data Hewan'); ?>
<?php $__env->startSection('subheading', 'Perbarui informasi hewan ternak'); ?>

<?php
  $attributes = $animal->attributes ?? [];
  $keys = array_keys($attributes);
  $values = array_values($attributes);
?>

<?php $__env->startSection('content'); ?>
  <form method="POST" action="<?php echo e(route('admin.animals.update', $animal)); ?>" enctype="multipart/form-data" class="space-y-6">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="grid gap-6 rounded-2xl border border-white/5 bg-white/5 p-6 md:grid-cols-2">
      <div>
        <label class="block text-sm font-medium text-slate-200">Nama Hewan</label>
        <input type="text" name="name" value="<?php echo e(old('name', $animal->name)); ?>" required class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
      </div>
      <div>
        <label class="block text-sm font-medium text-slate-200">Spesies</label>
        <input type="text" name="species" value="<?php echo e(old('species', $animal->species)); ?>" required class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
      </div>

      <div>
        <label class="block text-sm font-medium text-slate-200">Jenis Kelamin</label>
        <input type="text" name="gender" value="<?php echo e(old('gender', $animal->gender)); ?>" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
      </div>
      <div>
        <label class="block text-sm font-medium text-slate-200">Ras</label>
        <input type="text" name="breed" value="<?php echo e(old('breed', $animal->breed)); ?>" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
      </div>

      <div>
        <label class="block text-sm font-medium text-slate-200">Umur (tahun)</label>
        <input type="number" name="age" value="<?php echo e(old('age', $animal->age)); ?>" min="0" required class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
      </div>
      <div>
        <label class="block text-sm font-medium text-slate-200">Berat (kg)</label>
        <input type="number" step="0.01" name="weight" value="<?php echo e(old('weight', $animal->weight)); ?>" min="0" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
      </div>

      <div>
        <label class="block text-sm font-medium text-slate-200">Lokasi Kandang</label>
        <input type="text" name="location" value="<?php echo e(old('location', $animal->location)); ?>" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
      </div>
      <div>
        <label class="block text-sm font-medium text-slate-200">Status Kesehatan</label>
        <input type="text" name="health_status" value="<?php echo e(old('health_status', $animal->health_status)); ?>" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
      </div>

      <div class="md:col-span-2">
        <label class="block text-sm font-medium text-slate-200">Deskripsi</label>
        <textarea name="description" rows="4" class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950/40 px-4 py-3 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40"><?php echo e(old('description', $animal->description)); ?></textarea>
      </div>

      <div class="md:col-span-2">
        <label class="block text-sm font-medium text-slate-200">Atribut Tambahan</label>
        <div class="mt-3 space-y-3">
          <?php for($i = 0; $i < 3; $i++): ?>
            <div class="flex gap-3">
              <input type="text" name="attributes_keys[]" placeholder="Kunci" value="<?php echo e(old('attributes_keys.'.$i, $keys[$i] ?? null)); ?>" class="w-1/2 rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
              <input type="text" name="attributes_values[]" placeholder="Nilai" value="<?php echo e(old('attributes_values.'.$i, $values[$i] ?? null)); ?>" class="w-1/2 rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
            </div>
          <?php endfor; ?>
        </div>
      </div>

      <div class="md:col-span-2">
        <label class="block text-sm font-medium text-slate-200">Foto</label>
        <?php if($animal->image_url): ?>
          <img src="<?php echo e(asset('storage/'.$animal->image_url)); ?>" alt="Foto hewan" class="mb-3 w-full rounded-xl border border-white/10">
        <?php endif; ?>
        <input type="file" name="image" accept="image/*" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 text-sm focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
      </div>
    </div>

    <div class="flex justify-end gap-3">
      <a href="<?php echo e(route('admin.animals.index')); ?>" class="rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/10">Kembali</a>
      <button type="submit" class="rounded-xl bg-gradient-to-r from-emerald-500 via-teal-400 to-sky-500 px-5 py-2 text-sm font-semibold text-slate-900 shadow-lg shadow-emerald-500/30 transition hover:brightness-110">Simpan Perubahan</button>
    </div>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/admin/animals/edit.blade.php ENDPATH**/ ?>