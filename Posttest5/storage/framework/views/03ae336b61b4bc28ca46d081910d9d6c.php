<?php $__env->startSection('title', 'Contact'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-10">
    <section class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-sky-500/10 via-slate-950 to-slate-950 p-10 shadow-2xl shadow-black/40">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -left-14 top-8 h-64 w-64 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -right-16 bottom-0 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>
        </div>

        <div class="space-y-6">
            <span class="eyebrow">Kontak</span>
            <h1 class="font-display text-3xl font-semibold text-white sm:text-4xl lg:text-5xl">
                Mari bicara soal pengelolaan peternakan modern.
            </h1>
            <p class="text-base text-slate-200/80 sm:text-lg">
                Sampaikan kebutuhan, masukan, atau ajakan kolaborasi. Tim Nyxx Farm akan merespons secepatnya dengan solusi yang paling relevan.
            </p>

            <div class="flex flex-wrap gap-3 text-xs font-semibold uppercase tracking-wide text-slate-200/70">
                <span class="meta-pill border-emerald-400/40 bg-emerald-400/15 text-emerald-100/80">Respon &lt; 1x24 jam</span>
                <span class="meta-pill">Customer success dedicated</span>
                <span class="meta-pill">Konsultasi gratis</span>
            </div>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-[1.8fr_1.2fr]">
        <div class="panel space-y-6">
            <div class="flex flex-col gap-3">
                <h2 class="panel-title font-display text-2xl">Formulir Pesan</h2>
                <p class="text-muted text-base">Lengkapi data berikut agar kami dapat menyiapkan jawaban yang tepat dan cepat.</p>
            </div>

            <?php if(session('success')): ?>
                <div class="rounded-2xl border border-emerald-400/40 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-100"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <form action="<?php echo e(route('contact.store')); ?>" method="POST" class="grid gap-5">
                <?php echo csrf_field(); ?>

                <div class="grid gap-2">
                    <label class="text-xs font-semibold uppercase tracking-wide text-slate-300">Nama</label>
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="input-field" placeholder="Nama lengkap Anda" />
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-xs text-rose-300"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="grid gap-2">
                    <label class="text-xs font-semibold uppercase tracking-wide text-slate-300">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="input-field" placeholder="nama@perusahaan.com" />
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-xs text-rose-300"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="grid gap-2">
                    <label class="text-xs font-semibold uppercase tracking-wide text-slate-300">Subjek (opsional)</label>
                    <input type="text" name="subject" value="<?php echo e(old('subject')); ?>" class="input-field" placeholder="Contoh: Integrasi IoT untuk monitoring" />
                </div>

                <div class="grid gap-2">
                    <label class="text-xs font-semibold uppercase tracking-wide text-slate-300">Pesan</label>
                    <textarea name="message" rows="6" class="input-field" placeholder="Ceritakan kebutuhan atau tantangan yang ingin Anda diskusikan"><?php echo e(old('message')); ?></textarea>
                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-xs text-rose-300"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-xs text-slate-400">Dengan mengirim pesan, Anda menyetujui untuk dihubungi via email atau telepon.</p>
                    <button type="submit" class="button-primary">Kirim Pesan</button>
                </div>
            </form>
        </div>

        <div class="panel space-y-6">
            <h3 class="panel-title font-display text-2xl">Kantor &amp; Media</h3>

            <div class="space-y-4 text-sm text-muted">
                <div class="card-overlay space-y-2">
                    <div class="flex items-center gap-3 text-white">
                        <span class="icon-circle text-lg">📍</span>
                        <div>
                            <p class="text-sm font-semibold">Alamat</p>
                            <p class="text-xs uppercase tracking-wide text-slate-400">Kantor Operasional</p>
                        </div>
                    </div>
                    <p>Jl. Perjuangan 3 - Samarinda, Kalimantan Timur</p>
                </div>

                <div class="card-overlay space-y-2">
                    <div class="flex items-center gap-3 text-white">
                        <span class="icon-circle text-lg">✉️</span>
                        <div>
                            <p class="text-sm font-semibold">Email</p>
                            <p class="text-xs uppercase tracking-wide text-slate-400">Tiket prioritas</p>
                        </div>
                    </div>
                    <p>nyxxfarm@gmail.com</p>
                </div>

                <div class="card-overlay space-y-2">
                    <div class="flex items-center gap-3 text-white">
                        <span class="icon-circle text-lg">📞</span>
                        <div>
                            <p class="text-sm font-semibold">Call Center</p>
                            <p class="text-xs uppercase tracking-wide text-slate-400">Jam kerja</p>
                        </div>
                    </div>
                    <p>+62 811-2345-6789 (Senin–Jumat, 08.00 – 17.00 WITA)</p>
                </div>
            </div>

            <div class="rounded-3xl border border-emerald-400/20 bg-emerald-400/10 p-5 text-sm text-emerald-100">
                <p class="font-semibold text-white">Butuh respon lebih cepat?</p>
                <p class="mt-2 text-xs text-emerald-100/80">Gunakan fitur live chat di dashboard pelanggan untuk dukungan teknis instan.</p>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/contact/create.blade.php ENDPATH**/ ?>