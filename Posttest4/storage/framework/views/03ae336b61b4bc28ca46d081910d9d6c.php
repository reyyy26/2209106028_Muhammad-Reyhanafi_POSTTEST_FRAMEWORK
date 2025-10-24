<?php $__env->startSection('title', 'Contact'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-10">
    <section class="relative overflow-hidden rounded-3xl border border-white/10 bg-gradient-to-br from-sky-500/10 via-slate-950 to-slate-950 p-10 shadow-2xl shadow-black/40">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -left-14 top-8 h-64 w-64 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -right-16 bottom-0 h-72 w-72 rounded-full bg-sky-500/20 blur-3xl"></div>
        </div>

        <div class="space-y-4">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-4 py-1 text-xs font-semibold uppercase tracking-[0.4em] text-white/80">Kontak</span>
            <h1 class="text-3xl font-semibold text-white sm:text-4xl">Mari bicara soal pengelolaan peternakan modern.</h1>
            <p class="text-sm text-slate-200/80">Sampaikan kebutuhan, masukan, atau ajakan kolaborasi. Tim Nyxx Farm akan merespons secepatnya.</p>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-[2fr_1fr]">
        <div class="panel space-y-5">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h2 class="panel-title">Formulir Pesan</h2>
                    <p class="panel-subtitle">Lengkapi data berikut untuk memudahkan kami menindaklanjuti.</p>
                </div>
                <span class="rounded-full border border-emerald-400/20 bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-200">Respon &lt; 1x24 jam</span>
            </div>

            <?php if(session('success')): ?>
                <div class="rounded-2xl border border-emerald-400/40 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-100"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <form action="<?php echo e(route('contact.store')); ?>" method="POST" class="grid gap-5">
                <?php echo csrf_field(); ?>

                <div class="grid gap-2">
                    <label class="text-xs font-semibold uppercase tracking-wide text-slate-400">Nama</label>
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="input-field" />
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
                    <label class="text-xs font-semibold uppercase tracking-wide text-slate-400">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="input-field" />
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
                    <label class="text-xs font-semibold uppercase tracking-wide text-slate-400">Subjek (opsional)</label>
                    <input type="text" name="subject" value="<?php echo e(old('subject')); ?>" class="input-field" />
                </div>

                <div class="grid gap-2">
                    <label class="text-xs font-semibold uppercase tracking-wide text-slate-400">Pesan</label>
                    <textarea name="message" rows="6" class="input-field"><?php echo e(old('message')); ?></textarea>
                    <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-xs text-rose-300"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="button-primary">Kirim Pesan</button>
                </div>
            </form>
        </div>

        <div class="panel space-y-4">
            <h3 class="panel-title">Kantor &amp; Media</h3>
            <div class="space-y-3 text-sm text-slate-300/80">
                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                    <p class="font-semibold text-white">Alamat</p>
                    <p class="mt-1">Jl. Perjuangan 3 - Samarinda, Kalimantan Timur</p>
                </div>
                <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                    <p class="font-semibold text-white">Email</p>
                    <p class="mt-1">nyxxfarm@gmail.com</p>
                </div>
            </div>
            <p class="text-xs text-slate-400">Kami aktif tiap hari kerja pukul 08.00 — 17.00 WITA.</p>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Posttest\Posttest4\resources\views/contact/create.blade.php ENDPATH**/ ?>