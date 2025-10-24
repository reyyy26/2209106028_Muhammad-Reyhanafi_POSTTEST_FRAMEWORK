<?php $__env->startSection('title', 'Rekam Medis Hewan'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-10">
    <section class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-emerald-500/10 via-slate-950 to-slate-950 p-10 shadow-2xl shadow-black/40">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -left-16 top-10 h-64 w-64 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -right-20 bottom-0 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>
        </div>

        <div class="flex flex-col gap-10 lg:flex-row lg:items-start lg:justify-between">
            <div class="flex-1 space-y-4">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.4em] text-white/80">Records</span>
                <h1 class="text-3xl font-semibold text-white sm:text-4xl">Pantau setiap rekam medis hewan dengan insight yang siap ditindaklanjuti.</h1>
                <p class="text-sm text-slate-200/80">Panel kesehatan Nyxx Farm menggabungkan catatan pemeriksaan, tingkat keparahan, dan status tindak lanjut ke dalam satu kanvas dinamis.</p>
                <div class="flex flex-wrap gap-3 text-xs font-semibold uppercase tracking-wide text-slate-200/70">
                    <span class="rounded-full border border-emerald-400/40 bg-emerald-400/10 px-4 py-2">Pembaharuan otomatis</span>
                    <span class="rounded-full border border-slate-400/40 bg-slate-900/70 px-4 py-2">Tim dokter lapang terintegrasi</span>
                </div>
            </div>

            <div class="grid w-full max-w-md gap-4 rounded-3xl border border-white/10 bg-slate-950/60 p-6 backdrop-blur md:grid-cols-2">
                <div class="rounded-2xl border border-emerald-400/20 bg-emerald-400/10 p-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-emerald-100/80">Total Rekam Medis</p>
                    <p class="mt-3 text-3xl font-semibold text-white"><?php echo e($stats['total']); ?></p>
                </div>
                <div class="rounded-2xl border border-rose-400/20 bg-rose-400/10 p-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-rose-100/80">Kasus Darurat</p>
                    <p class="mt-3 text-3xl font-semibold text-white"><?php echo e($stats['emergency']); ?></p>
                </div>
                <div class="rounded-2xl border border-amber-400/20 bg-amber-400/10 p-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-amber-100/80">Kondisi Kritis</p>
                    <p class="mt-3 text-3xl font-semibold text-white"><?php echo e($stats['critical']); ?></p>
                </div>
                <div class="rounded-2xl border border-sky-400/20 bg-sky-400/10 p-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-sky-100/80">Kasus Bulan Ini</p>
                    <p class="mt-3 text-3xl font-semibold text-white"><?php echo e($stats['this_month']); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="panel">
        <form method="GET" action="<?php echo e(route('veterinary.records')); ?>" class="grid gap-5 md:grid-cols-4 md:items-end">
            <div class="md:col-span-2">
                <label for="search" class="block text-sm font-medium text-slate-200">Pencarian</label>
                <input type="text" name="search" id="search" value="<?php echo e(request('search')); ?>"
                       placeholder="Cari berdasarkan dokter, jenis perawatan, atau diagnosis..."
                       class="mt-2 input-field">
            </div>

            <div>
                <label for="severity" class="block text-sm font-medium text-slate-200">Tingkat Keparahan</label>
                <select name="severity" id="severity" class="mt-2 input-field">
                    <option class="bg-slate-900" value="">Semua</option>
                    <option class="bg-slate-900" value="low" <?php echo e(request('severity') === 'low' ? 'selected' : ''); ?>>Ringan</option>
                    <option class="bg-slate-900" value="medium" <?php echo e(request('severity') === 'medium' ? 'selected' : ''); ?>>Sedang</option>
                    <option class="bg-slate-900" value="high" <?php echo e(request('severity') === 'high' ? 'selected' : ''); ?>>Tinggi</option>
                    <option class="bg-slate-900" value="critical" <?php echo e(request('severity') === 'critical' ? 'selected' : ''); ?>>Kritis</option>
                </select>
            </div>

            <div>
                <label for="emergency" class="block text-sm font-medium text-slate-200">Status Darurat</label>
                <select name="emergency" id="emergency" class="mt-2 input-field">
                    <option class="bg-slate-900" value="">Semua</option>
                    <option class="bg-slate-900" value="1" <?php echo e(request('emergency') === '1' ? 'selected' : ''); ?>>Darurat</option>
                    <option class="bg-slate-900" value="0" <?php echo e(request('emergency') === '0' ? 'selected' : ''); ?>>Tidak Darurat</option>
                </select>
            </div>

            <div class="flex items-center gap-2 md:col-span-4">
                <button type="submit" class="button-primary">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Filter
                </button>
                <a href="<?php echo e(route('veterinary.records')); ?>" class="inline-flex items-center rounded-full border border-white/10 px-5 py-2 text-sm font-semibold text-slate-200 transition hover:border-emerald-400/40 hover:text-emerald-200">
                    Reset
                </a>
            </div>
        </form>
    </section>

    <section class="space-y-4">
        <div class="grid gap-4 lg:grid-cols-2">
            <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="panel space-y-4">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-400"><?php echo e($record->treatment_date->format('d M Y')); ?> • <?php echo e(optional($record->treatment_time)->format('H:i')); ?></p>
                            <h2 class="text-xl font-semibold text-white"><?php echo e($record->treatment_type); ?></h2>
                            <p class="text-sm text-slate-300/80"><?php echo e($record->animal->name); ?> — <?php echo e($record->animal->species); ?></p>
                        </div>
                        <span class="rounded-full px-3 py-1 text-xs font-semibold <?php echo e($record->severity_color); ?>">
                            <?php echo e(ucfirst($record->severity)); ?>

                        </span>
                    </div>

                    <div class="space-y-2 text-sm text-slate-300/90">
                        <p><span class="font-semibold text-slate-200">Dokter:</span> <?php echo e($record->veterinarian_name); ?></p>
                        <p class="leading-relaxed"><?php echo e(\Illuminate\Support\Str::limit($record->diagnosis, 140)); ?></p>
                        <div class="flex flex-wrap gap-2 text-xs">
                            <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 font-semibold uppercase tracking-wide text-slate-200">Status: <?php echo e(str_replace('_', ' ', ucfirst($record->status))); ?></span>
                            <?php if($record->is_emergency): ?>
                                <span class="rounded-full border border-rose-400/40 bg-rose-400/10 px-3 py-1 font-semibold uppercase tracking-wide text-rose-100">Darurat</span>
                            <?php endif; ?>
                            <?php if($record->requires_followup): ?>
                                <span class="rounded-full border border-amber-400/40 bg-amber-400/10 px-3 py-1 font-semibold uppercase tracking-wide text-amber-100">Perlu tindak lanjut</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-4 text-xs text-slate-300/70">
                        <div>
                            <span class="font-semibold text-slate-200">Biaya:</span>
                            <?php echo e($record->formatted_cost); ?>

                        </div>
                        <div>
                            <span class="font-semibold text-slate-200">Checkup Berikutnya:</span>
                            <?php echo e(optional($record->next_checkup)->format('d M Y H:i') ?? 'Belum dijadwalkan'); ?>

                        </div>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="panel text-center text-slate-300/80">Belum ada rekam medis tersimpan.</div>
            <?php endif; ?>
        </div>

        <div class="flex justify-end">
            <?php echo e($records->links('pagination::tailwind')); ?>

        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/veterinary-records/index.blade.php ENDPATH**/ ?>