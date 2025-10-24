<?php $__env->startSection('title', 'Artikel & Berita'); ?>
<?php $__env->startSection('heading', 'Artikel & Berita'); ?>
<?php $__env->startSection('subheading', 'Kelola konten publikasi Nyxx Farm'); ?>

<?php $__env->startSection('actions'); ?>
  <a href="<?php echo e(route('admin.articles.create')); ?>" class="rounded-xl bg-gradient-to-r from-emerald-500 via-teal-400 to-sky-500 px-4 py-2 text-sm font-semibold text-slate-900 shadow-lg shadow-emerald-500/30 transition hover:brightness-110">Tulis Artikel</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <form method="GET" action="<?php echo e(route('admin.articles.index')); ?>" class="mb-6 grid gap-3 rounded-2xl border border-white/5 bg-white/5 p-4 text-sm md:grid-cols-5">
    <div class="md:col-span-2">
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Cari</label>
      <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Judul atau ringkasan" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
    </div>
    <div>
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Status</label>
      <select name="status" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
        <option value="" <?php if(!$status): echo 'selected'; endif; ?>>Semua</option>
        <option value="draft" <?php if($status === 'draft'): echo 'selected'; endif; ?>>Draft</option>
        <option value="scheduled" <?php if($status === 'scheduled'): echo 'selected'; endif; ?>>Terjadwal</option>
        <option value="published" <?php if($status === 'published'): echo 'selected'; endif; ?>>Publikasi</option>
      </select>
    </div>
    <div>
      <label class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Kategori</label>
      <select name="category" class="mt-2 w-full rounded-xl border border-white/10 bg-slate-950/40 px-3 py-2 focus:border-emerald-400/60 focus:outline-none focus:ring-2 focus:ring-emerald-400/40">
        <option value="" <?php if(!$category): echo 'selected'; endif; ?>>Semua</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($cat->id); ?>" <?php if($category == $cat->id): echo 'selected'; endif; ?>><?php echo e($cat->name); ?></option>
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
          <th class="px-4 py-3 text-left">Judul</th>
          <th class="px-4 py-3 text-left">Kategori</th>
          <th class="px-4 py-3 text-left">Status</th>
          <th class="px-4 py-3 text-left">Dipublikasi</th>
          <th class="px-4 py-3 text-left">Penulis</th>
          <th class="px-4 py-3"></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-white/5 text-slate-200">
        <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td class="px-4 py-4">
              <div class="font-semibold"><?php echo e($article->title); ?></div>
              <div class="text-xs text-slate-400">Slug: <?php echo e($article->slug); ?></div>
            </td>
            <td class="px-4 py-4 text-xs text-slate-300"><?php echo e($article->category?->name ?? '—'); ?></td>
            <td class="px-4 py-4">
              <?php if($article->status === 'published'): ?>
                <span class="rounded-full bg-emerald-500/10 px-3 py-1 text-xs font-semibold text-emerald-200">Publikasi</span>
              <?php elseif($article->status === 'scheduled'): ?>
                <span class="rounded-full bg-amber-500/10 px-3 py-1 text-xs font-semibold text-amber-200">Terjadwal</span>
              <?php else: ?>
                <span class="rounded-full bg-slate-500/10 px-3 py-1 text-xs font-semibold text-slate-200">Draft</span>
              <?php endif; ?>
            </td>
            <td class="px-4 py-4 text-xs text-slate-400"><?php echo e($article->published_at?->format('d M Y H:i') ?? '—'); ?></td>
            <td class="px-4 py-4 text-xs text-slate-400"><?php echo e($article->publisher?->name ?? $article->author); ?></td>
            <td class="px-4 py-4 text-right">
              <div class="flex justify-end gap-2">
                <a href="<?php echo e(route('admin.articles.edit', $article)); ?>" class="rounded-lg border border-white/10 px-3 py-2 text-xs text-slate-200 transition hover:bg-white/10">Edit</a>
                <form action="<?php echo e(route('admin.articles.destroy', $article)); ?>" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit" class="rounded-lg border border-red-400/50 bg-red-500/10 px-3 py-2 text-xs font-semibold text-red-200 transition hover:bg-red-500/20">Hapus</button>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <tr>
            <td colspan="6" class="px-4 py-10 text-center text-sm text-slate-400">Belum ada artikel.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="mt-6 text-sm text-slate-300">
    <?php echo e($articles->links()); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/admin/articles/index.blade.php ENDPATH**/ ?>