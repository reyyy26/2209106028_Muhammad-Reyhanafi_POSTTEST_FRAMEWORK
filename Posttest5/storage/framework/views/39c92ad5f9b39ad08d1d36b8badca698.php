<?php $__env->startSection('title', $page?->title ?? 'Testimoni'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-10">
    <section class="page-hero">
        <div class="relative z-10 space-y-4">
            <span class="page-eyebrow">TESTIMONI</span>
            <h1 class="font-display text-3xl font-semibold text-white sm:text-4xl">
                <?php echo e($page?->title ?? 'Cerita Sukses Mitra Nyxx Farm'); ?>

            </h1>
            <p class="text-base leading-relaxed text-slate-200/80 sm:text-lg">
                <?php echo e($page?->excerpt ?? 'Belajar langsung dari pengalaman peternak yang berhasil meningkatkan performa kandang dengan Nyxx Farm.'); ?>

            </p>
        </div>
    </section>

    <section class="panel space-y-6 text-base leading-relaxed text-slate-200/90">
        <?php echo nl2br(e($page->content ?? 'Belum ada testimoni yang ditampilkan.')); ?>

    </section>

    <section class="panel space-y-4">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="panel-title">Bagikan Pengalaman Anda</h2>
                <p class="panel-subtitle">Kirimkan insight dan cerita terbaik Anda untuk menginspirasi peternak lainnya.</p>
            </div>
            <a href="<?php echo e(route('contact.create')); ?>" class="button-primary">Kirim Testimoni</a>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/pages/testimonials.blade.php ENDPATH**/ ?>