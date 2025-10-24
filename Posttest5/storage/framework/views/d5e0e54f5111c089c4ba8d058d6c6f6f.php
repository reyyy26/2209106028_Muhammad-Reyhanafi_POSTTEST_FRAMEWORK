<?php $__env->startSection('title', 'Artikel Peternakan'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-12">
    <section class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-sky-500/10 via-slate-950 to-slate-950 p-10 shadow-2xl shadow-black/40">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -left-12 top-8 h-64 w-64 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -right-16 bottom-0 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>
        </div>

        <div class="flex flex-col gap-10 lg:flex-row lg:items-start lg:justify-between">
            <div class="max-w-xl space-y-4">
                <span class="eyebrow">Artikel</span>
                <h1 class="font-display text-3xl font-semibold text-white sm:text-4xl lg:text-5xl">Wawasan terbaru untuk mendukung produktivitas kandang Anda.</h1>
                <p class="text-base text-slate-200/80 sm:text-lg">Kumpulan artikel kurasi tim Nyxx Farm, mulai dari nutrisi, kesehatan ternak, hingga strategi bisnis peternakan.</p>

                <div class="flex flex-wrap gap-3 text-xs font-semibold uppercase tracking-wide text-slate-200/70">
                    <span class="meta-pill border-emerald-400/40 bg-emerald-400/10 text-emerald-100/80">Update mingguan</span>
                    <span class="meta-pill border-slate-400/40 bg-slate-900/70">Ditulis pakar kandang</span>
                    <span class="meta-pill border-sky-400/40 bg-sky-400/10">Insight praktis</span>
                </div>
            </div>

            <div class="grid w-full max-w-sm gap-4 rounded-3xl border border-white/10 bg-slate-950/60 p-6 backdrop-blur">
                <div class="rounded-2xl border border-emerald-400/30 bg-emerald-400/10 p-4">
                    <p class="text-xs uppercase tracking-wide text-emerald-100/80">Total Artikel</p>
                    <p class="mt-3 text-3xl font-semibold text-white"><?php echo e($articles->total()); ?></p>
                </div>
                <div class="rounded-2xl border border-sky-400/20 bg-sky-400/10 p-4">
                    <p class="text-xs uppercase tracking-wide text-sky-100/80">Halaman Saat Ini</p>
                    <p class="mt-3 text-2xl font-semibold text-white"><?php echo e($articles->currentPage()); ?> / <?php echo e($articles->lastPage()); ?></p>
                    <p class="mt-2 text-xs text-slate-200/70">Menampilkan <?php echo e($articles->perPage()); ?> artikel per halaman</p>
                </div>
            </div>
        </div>
    </section>

    <section class="panel">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
            <div class="space-y-2">
                <h2 class="panel-title font-display text-2xl">Cari topik spesifik</h2>
                <p class="panel-subtitle">Gunakan kombinasi kata kunci dan jumlah artikel per halaman.</p>
            </div>

            <form method="GET" action="<?php echo e(route('articles.index')); ?>" class="grid gap-3 sm:grid-cols-[minmax(0,1fr)_auto_auto] sm:items-center">
                <input
                    type="text"
                    name="q"
                    value="<?php echo e(old('q', $q ?? '')); ?>"
                    placeholder="Cari artikel, penulis, atau konten..."
                    class="input-field sm:w-72"
                    aria-label="Cari artikel"
                >

                <select name="per_page" onchange="this.form.submit()" class="input-field sm:w-40">
                    <?php $__currentLoopData = [6,9,12,18]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option class="bg-slate-900" value="<?php echo e($n); ?>" <?php echo e(($perPage ?? 6) == $n ? 'selected' : ''); ?>>
                            <?php echo e($n); ?> / halaman
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <button type="submit" class="button-primary">Telusuri</button>
            </form>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-2">
        <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="panel flex flex-col justify-between gap-6">
                <div class="space-y-4">
                    <div class="flex flex-col gap-3">
                        <div class="flex flex-wrap items-center gap-2 text-xs uppercase tracking-wide text-slate-400">
                            <span class="meta-pill border-emerald-400/40 bg-emerald-400/10 text-emerald-100/80"><?php echo e($article->category->name ?? 'Umum'); ?></span>
                            <span><?php echo e($article->published_at ? $article->published_at->format('d M Y') : '-'); ?></span>
                            <span>•</span>
                            <span>Oleh <?php echo e($article->author ?? 'Tim Nyxx'); ?></span>
                        </div>

                        <h2 class="font-display text-2xl font-semibold text-white">
                            <a href="<?php echo e(route('articles.show', $article)); ?>" class="transition hover:text-emerald-300">
                                <?php echo e($article->title); ?>

                            </a>
                        </h2>
                    </div>

                    <p class="text-base leading-relaxed text-slate-300">
                        <?php echo e(\Illuminate\Support\Str::limit($article->excerpt ?? $article->content, 180)); ?>

                    </p>

                    <?php if($article->tags->isNotEmpty()): ?>
                        <div class="flex flex-wrap gap-2">
                            <?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="meta-pill border-emerald-400/30 bg-emerald-400/10 text-emerald-100/80">
                                    <?php echo e($tag->name); ?>

                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <a href="<?php echo e(route('articles.show', $article)); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-300 transition hover:text-emerald-200">
                    <span>Baca selengkapnya</span>
                    <span aria-hidden="true">→</span>
                </a>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="panel text-center text-slate-300">Belum ada artikel tersedia.</div>
        <?php endif; ?>
    </section>

    <section class="flex flex-col items-start justify-between gap-4 text-sm text-slate-400 sm:flex-row sm:items-center">
        <div>
            Menampilkan <?php echo e($articles->firstItem() ?? 0); ?> – <?php echo e($articles->lastItem() ?? 0); ?> dari <?php echo e($articles->total()); ?> artikel
        </div>

        <div class="w-full sm:w-auto">
            <?php echo e($articles->links('pagination::tailwind')); ?>

        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/articles/index.blade.php ENDPATH**/ ?>