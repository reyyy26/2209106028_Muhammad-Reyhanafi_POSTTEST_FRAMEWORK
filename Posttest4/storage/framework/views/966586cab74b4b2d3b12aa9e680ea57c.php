<?php $__env->startSection('title', 'Daftar Hewan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-12">
        <section class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-emerald-500/10 via-slate-950 to-slate-950 p-10 shadow-2xl shadow-black/40">
            <div class="absolute inset-0 -z-10">
                <div class="absolute -left-16 top-10 h-64 w-64 rounded-full bg-emerald-400/20 blur-3xl"></div>
                <div class="absolute -right-20 bottom-0 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>
            </div>

            <div class="flex flex-col gap-10 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-xl space-y-4">
                    <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.4em] text-white/80">Hello Fam</span>
                    <h1 class="text-3xl font-semibold text-white sm:text-4xl">Kelola populasi hewan dengan mudah menggunakan NYXX-FARM.</h1>
                    <p class="text-sm text-slate-200/80">Gunakan pencarian, filter spesies, dan statistik dinamis untuk memastikan setiap kandang terpantau dengan baik.</p>

                    <div class="flex flex-wrap gap-3 text-xs font-semibold uppercase tracking-wide text-slate-200/70">
                        <span class="rounded-full border border-emerald-400/40 bg-emerald-400/10 px-4 py-2">Integrasi rekam medis</span>
                        <span class="rounded-full border border-slate-400/40 bg-slate-900/70 px-4 py-2">Statistik real-time</span>
                    </div>
                </div>

                <div class="grid w-full max-w-sm gap-4 rounded-3xl border border-white/10 bg-slate-950/60 p-6 backdrop-blur">
                    <div class="rounded-2xl border border-emerald-400/30 bg-emerald-400/10 p-4">
                        <p class="text-xs uppercase tracking-wide text-emerald-100/80">Total Hewan</p>
                        <p class="mt-3 text-3xl font-semibold text-white"><?php echo e(number_format($total)); ?></p>
                    </div>
                    <div class="rounded-2xl border border-sky-400/20 bg-sky-400/10 p-4">
                        <p class="text-xs uppercase tracking-wide text-sky-100/80">Varian Spesies</p>
                        <p class="mt-3 text-2xl font-semibold text-white"><?php echo e($speciesList->count()); ?></p>
                        <p class="mt-2 text-xs text-slate-200/70">Rata-rata umur <?php echo e(number_format($bySpecies->avg('avg_age') ?? 0, 1)); ?> tahun</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-6 lg:grid-cols-[2fr_3fr]">
            <div class="panel">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="panel-title">Filter &amp; Pencarian</h2>
                        <p class="panel-subtitle">Sesuaikan hasil sesuai kebutuhan kandang.</p>
                    </div>
                    <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-200"><?php echo e($animals->total()); ?> hasil</span>
                </div>

                <form method="GET" action="<?php echo e(route('nyxx.farm')); ?>" class="mt-6 grid gap-4">
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wide text-slate-400">Kata kunci</label>
                        <input
                            type="text"
                            name="q"
                            value="<?php echo e(old('q', $q ?? '')); ?>"
                            placeholder="Cari nama, breed, atau deskripsi..."
                            class="mt-2 input-field"
                        >
                    </div>

                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wide text-slate-400">Spesies</label>
                        <select name="species" class="mt-2 input-field">
                            <option class="bg-slate-900" value="">Semua spesies</option>
                            <?php $__currentLoopData = $speciesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option class="bg-slate-900" value="<?php echo e($s); ?>" <?php echo e((isset($speciesFilter) && $speciesFilter === $s) ? 'selected' : ''); ?>>
                                    <?php echo e($s); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        <button type="submit" class="button-primary">Terapkan Filter</button>
                        <a href="<?php echo e(route('nyxx.farm')); ?>" class="inline-flex items-center rounded-full border border-white/10 px-5 py-2 text-sm font-semibold text-slate-200 transition hover:border-emerald-400/40 hover:text-emerald-200">Reset</a>
                    </div>
                </form>
            </div>

            <div class="panel">
                <h2 class="panel-title">Statistik Spesies</h2>
                <p class="panel-subtitle">Lihat distribusi hewan beserta rerata umur untuk evaluasi cepat.</p>

                <div class="mt-6 grid gap-3 sm:grid-cols-2">
                    <?php $__currentLoopData = $bySpecies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="font-semibold text-white"><?php echo e($b->species); ?></span>
                                <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-200"><?php echo e($b->count); ?> ekor</span>
                            </div>
                            <p class="mt-3 text-xs text-slate-300/80">Umur rata-rata <?php echo e(number_format($b->avg_age, 1)); ?> tahun</p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>

        <?php if($animals->count() === 0): ?>
            <div class="panel text-center text-slate-300/80">Belum ada data untuk kriteria ini.</div>
        <?php else: ?>
            <section class="space-y-10">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
                    <?php $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal05156f53f44ff498d34b18c87aba1c96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal05156f53f44ff498d34b18c87aba1c96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.animal-card','data' => ['animal' => $animal]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('animal-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['animal' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($animal)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal05156f53f44ff498d34b18c87aba1c96)): ?>
<?php $attributes = $__attributesOriginal05156f53f44ff498d34b18c87aba1c96; ?>
<?php unset($__attributesOriginal05156f53f44ff498d34b18c87aba1c96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal05156f53f44ff498d34b18c87aba1c96)): ?>
<?php $component = $__componentOriginal05156f53f44ff498d34b18c87aba1c96; ?>
<?php unset($__componentOriginal05156f53f44ff498d34b18c87aba1c96); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="panel overflow-hidden">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <h3 class="panel-title">Detail Hewan (Halaman <?php echo e($animals->currentPage()); ?>)</h3>
                        <span class="text-xs uppercase tracking-wide text-slate-400">Menampilkan <?php echo e($animals->firstItem()); ?>-<?php echo e($animals->lastItem()); ?> dari <?php echo e($animals->total()); ?> data</span>
                    </div>

                    <div class="mt-4 overflow-x-auto">
                        <table class="w-full min-w-[720px] text-left text-sm text-slate-200/90">
                            <thead>
                                <tr class="bg-white/5 text-xs uppercase tracking-wide text-slate-400">
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">Nama</th>
                                    <th class="px-4 py-3">Spesies</th>
                                    <th class="px-4 py-3">Breed</th>
                                    <th class="px-4 py-3">Umur</th>
                                    <th class="px-4 py-3">Catatan Medis</th>
                                    <th class="px-4 py-3">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                <?php $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="transition hover:bg-white/5">
                                        <td class="px-4 py-3 text-slate-400"><?php echo e($animals->firstItem() + $idx); ?></td>
                                        <td class="px-4 py-3 font-medium text-white"><?php echo e($a->name); ?></td>
                                        <td class="px-4 py-3"><?php echo e($a->species); ?></td>
                                        <td class="px-4 py-3"><?php echo e($a->breed ?? '-'); ?></td>
                                        <td class="px-4 py-3"><?php echo e($a->age); ?> th</td>
                                        <td class="px-4 py-3"><?php echo e($a->veterinary_records_count ?? $a->veterinaryRecords()->count()); ?> catatan</td>
                                        <td class="px-4 py-3 text-slate-300/80"><?php echo e($a->description); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex justify-end">
                    <?php echo e($animals->links('pagination::tailwind')); ?>

                </div>
            </section>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/animals/index.blade.php ENDPATH**/ ?>