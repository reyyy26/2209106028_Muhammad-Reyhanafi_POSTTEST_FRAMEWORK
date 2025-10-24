<?php $__env->startSection('title', $page?->title ?? 'Tentang'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-10">
    <section class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-emerald-500/10 via-slate-950 to-slate-950 p-10 shadow-2xl shadow-black/40">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -left-16 top-10 h-64 w-64 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -right-20 bottom-0 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>
        </div>

        <div class="max-w-2xl space-y-5">
            <span class="eyebrow">Tentang</span>
            <h1 class="font-display text-3xl font-semibold text-white sm:text-4xl lg:text-5xl">
                <?php echo e($page?->title ?? 'Menghubungkan peternak dengan data yang akurat dan mudah dipahami.'); ?>

            </h1>
            <p class="text-base leading-relaxed text-slate-100/70 sm:text-lg">
                <?php echo e($page?->excerpt ?? 'Nyxx Farm lahir dari kolaborasi praktisi peternakan dan developer lokal yang percaya pada insight tepat waktu.'); ?>

            </p>
        </div>
    </section>

    <section class="panel space-y-6 text-base leading-relaxed text-slate-200/90">
        <?php echo nl2br(e($page->content ?? 'Konten halaman about belum diatur.')); ?>

    </section>

    <section class="panel space-y-4">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h2 class="panel-title">Hubungi Tim Nyxx Farm</h2>
                <p class="panel-subtitle">Kami siap berdiskusi terkait implementasi, integrasi, atau kolaborasi penyuluhan.</p>
            </div>
            <a href="<?php echo e(route('contact.create')); ?>" class="button-primary">
                <span>Mari Bicara</span>
            </a>
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div class="card-overlay space-y-3 text-sm text-muted">
                <p class="font-semibold text-white">Alamat</p>
                <p>Jl. Perjuangan 3 - Samarinda, Kalimantan Timur</p>
            </div>
            <div class="card-overlay space-y-3 text-sm text-muted">
                <p class="font-semibold text-white">Email</p>
                <p>support@nyxxfarm.test</p>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/pages/about.blade.php ENDPATH**/ ?>