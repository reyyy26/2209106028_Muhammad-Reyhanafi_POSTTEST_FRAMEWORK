<?php $__env->startSection('title', 'Daftar Hewan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-12">
        <section class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-emerald-500/10 via-slate-950 to-slate-950 p-10 shadow-2xl shadow-black/40">
            <div class="absolute inset-0 -z-10">
                <div class="absolute -left-16 top-10 h-64 w-64 rounded-full bg-emerald-400/20 blur-3xl"></div>
                <div class="absolute -right-20 bottom-0 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>
            </div>

            <div class="flex flex-col gap-10 lg:flex-row lg:items-start lg:justify-between">
                <div class="max-w-xl space-y-5">
                    <span class="eyebrow">Hello Fam</span>
                    <h1 class="font-display text-3xl font-semibold text-white sm:text-4xl lg:text-5xl">Platform manajemen ternak terpadu untuk kandang yang lebih produktif.</h1>
                    <p class="text-base text-slate-200/80 sm:text-lg">Nyxx Farm membantu tim lapangan memantau kesehatan hewan, merencanakan pakan, hingga merangkum insight keuangan dalam satu dasbor yang mudah dipahami.</p>

                    <div class="flex flex-wrap gap-3 text-xs font-semibold uppercase tracking-wide text-slate-200/70">
                        <span class="meta-pill border-emerald-400/40 bg-emerald-400/10 text-emerald-100/80">Integrasi rekam medis</span>
                        <span class="meta-pill border-slate-400/40 bg-slate-900/70">Statistik real-time</span>
                        <span class="meta-pill border-sky-400/40 bg-sky-400/10">Insight keuangan</span>
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

            <div class="panel space-y-6">
                <div class="space-y-2">
                    <h2 class="panel-title font-display text-2xl">Statistik Spesies</h2>
                    <p class="panel-subtitle">Lihat distribusi hewan beserta rerata umur untuk evaluasi cepat.</p>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                    <?php $__currentLoopData = $bySpecies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-overlay space-y-3">
                            <div class="flex items-center justify-between text-sm">
                                <span class="font-semibold text-white"><?php echo e($b->species); ?></span>
                                <span class="meta-pill border-emerald-400/30 bg-emerald-400/10 text-emerald-100/80"><?php echo e($b->count); ?> ekor</span>
                            </div>
                            <p class="text-xs text-slate-300/80">Umur rata-rata <?php echo e(number_format($b->avg_age, 1)); ?> tahun</p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>

        <section class="grid gap-12">
            <div class="panel grid gap-4">
                <div class="grid gap-6 lg:grid-cols-3">
                    <div class="space-y-3">
                        <p class="text-xs uppercase tracking-[0.3em] text-emerald-200/80">Dampak Nyxx Farm</p>
                        <h3 class="font-display text-2xl font-semibold text-white">Cerita sukses Mitra Sumber Ternak</h3>
                        <p class="text-sm text-slate-300/80">“Dalam tiga bulan pertama, kami bisa memangkas biaya pakan 18% sekaligus menurunkan angka penyakit ternak hingga separuhnya.”</p>
                        <p class="text-xs uppercase tracking-wide text-slate-400">— Luki, Pemilik Kandang Ayam Petelur</p>
                    </div>
                    <div class="grid gap-3 text-sm text-slate-200/80">
                        <div class="rounded-2xl border border-emerald-400/30 bg-emerald-400/10 p-4">
                            <p class="text-xs uppercase tracking-wide text-emerald-100/80">Penghematan</p>
                            <p class="mt-2 text-3xl font-semibold text-white">18%</p>
                            <p class="text-xs text-emerald-100/70">Biaya pakan per siklus</p>
                        </div>
                        <div class="rounded-2xl border border-sky-400/30 bg-sky-400/10 p-4">
                            <p class="text-xs uppercase tracking-wide text-sky-100/80">Waktu pencatatan</p>
                            <p class="mt-2 text-3xl font-semibold text-white">↓ 12 jam</p>
                            <p class="text-xs text-slate-200/70">Per minggu kerja</p>
                        </div>
                    </div>
                    <div class="rounded-3xl border border-white/10 bg-white/5 p-6 text-sm text-slate-200/80">
                        <p class="font-semibold text-white">Insight utama</p>
                        <ul class="mt-3 space-y-2">
                            <li><span class="text-emerald-300">•</span> Monitor kondisi hewan real-time menyederhanakan rencana vaksinasi.</li>
                            <li><span class="text-emerald-300">•</span> Laporan otomatis memudahkan evaluasi keuangan mingguan.</li>
                            <li><span class="text-emerald-300">•</span> Tim teknis cepat menyesuaikan modul sesuai pola pemeliharaan.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
                <?php $__empty_1 = true; $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $animal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="panel text-center text-slate-300/80 sm:col-span-2 xl:col-span-3">Belum ada data untuk kriteria ini.</div>
                <?php endif; ?>
            </div>

            <div class="panel overflow-hidden">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <h3 class="panel-title font-display text-xl">Detail Hewan (Halaman <?php echo e($animals->currentPage()); ?>)</h3>
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
                            <?php $__empty_1 = true; $__currentLoopData = $animals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="transition hover:bg-white/5">
                                    <td class="px-4 py-3 text-slate-400"><?php echo e($animals->firstItem() + $idx); ?></td>
                                    <td class="px-4 py-3 font-medium text-white"><?php echo e($a->name); ?></td>
                                    <td class="px-4 py-3"><?php echo e($a->species); ?></td>
                                    <td class="px-4 py-3"><?php echo e($a->breed ?? '-'); ?></td>
                                    <td class="px-4 py-3"><?php echo e($a->age); ?> th</td>
                                    <td class="px-4 py-3"><?php echo e($a->veterinary_records_count ?? $a->veterinaryRecords()->count()); ?> catatan</td>
                                    <td class="px-4 py-3 text-slate-300/80"><?php echo e($a->description); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="px-4 py-6 text-center text-slate-300/80">Belum ada data.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex justify-end">
                <?php echo e($animals->links('pagination::tailwind')); ?>

            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/animals/index.blade.php ENDPATH**/ ?>