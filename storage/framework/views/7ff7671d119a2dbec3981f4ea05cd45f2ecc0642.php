<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Warga — SI-KAWU Desa Kawu</title>
    <meta name="description" content="Portal layanan warga Desa Kawu. Lihat pengumuman terbaru dan laporkan masalah di sekitar Anda.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Inter', 'sans-serif'] }, colors: { primary: '#059669', 'primary-dark': '#047857' } } }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-3px); box-shadow: 0 20px 40px -10px rgba(0,0,0,0.1); }
        .tab-btn.active { background: #059669; color: white; box-shadow: 0 4px 15px -2px rgba(5,150,105,0.4); }
        .form-input { @apply  w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-emerald-400/40 focus:border-emerald-400 transition-all text-sm; }
        .form-label { @apply  block text-sm font-semibold text-slate-700 mb-2; }
    </style>
</head>
<body class="font-sans text-slate-800 bg-slate-50 antialiased">

    <!-- NAVBAR -->
    <nav class="fixed w-full z-50 top-0 border-b border-gray-200 bg-white/90 backdrop-blur-md shadow-sm">
        <div class="max-w-screen-xl flex items-center justify-between mx-auto px-4 py-3">
            <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3">
                <div class="w-9 h-9 bg-primary rounded-lg flex items-center justify-center text-white font-bold text-base shadow">SK</div>
                <div>
                    <span class="text-lg font-bold text-slate-900 block leading-tight">SI-KAWU</span>
                    <span class="block text-xs text-slate-500">Layanan Warga</span>
                </div>
            </a>
            <a href="<?php echo e(route('home')); ?>" class="text-sm text-slate-600 hover:text-primary font-medium transition-colors flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Kembali ke Beranda
            </a>
        </div>
    </nav>

    <!-- HERO -->
    <section class="pt-24 pb-10 bg-gradient-to-br from-slate-900 via-emerald-950 to-slate-900">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-sm font-medium mb-4">
                <span class="flex w-2 h-2 rounded-full bg-emerald-400 mr-2 animate-pulse"></span>
                Portal Layanan Digital
            </div>
            <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-3">Layanan Warga SI-KAWU</h1>
            <p class="text-slate-300 max-w-xl mx-auto">Informasi terkini dan wadah pelaporan masalah langsung ke perangkat desa.</p>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <main class="max-w-screen-xl mx-auto px-4 py-10">

        <?php if(session('success')): ?>
        <div class="mb-8 flex items-start gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-xl shadow-sm">
            <svg class="w-5 h-5 mt-0.5 shrink-0 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <div>
                <p class="font-semibold">Berhasil!</p>
                <p class="text-sm mt-0.5"><?php echo e(session('success')); ?></p>
            </div>
        </div>
        <?php endif; ?>

        <!-- TABS -->
        <div class="flex gap-3 mb-8 bg-white rounded-2xl p-2 border border-slate-200 shadow-sm w-fit">
            <button id="tab-pengumuman" onclick="switchTab('pengumuman')"
                    class="tab-btn active flex items-center gap-2 px-6 py-2.5 rounded-xl font-semibold text-sm transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                Pengumuman
            </button>
            <button id="tab-laporan" onclick="switchTab('laporan')"
                    class="tab-btn flex items-center gap-2 px-6 py-2.5 rounded-xl font-semibold text-sm text-slate-600 transition-all hover:bg-slate-50">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Lapor Masalah
            </button>
        </div>

        <!-- PANEL PENGUMUMAN -->
        <div id="panel-pengumuman">
            <!-- Filter Kategori -->
            <div class="flex flex-wrap gap-2 mb-6">
                <?php
                    $kategoriList = ['' => 'Semua', 'umum' => 'Umum', 'kegiatan' => 'Kegiatan', 'penting' => 'Penting', 'kesehatan' => 'Kesehatan', 'infrastruktur' => 'Infrastruktur'];
                ?>
                <?php $__currentLoopData = $kategoriList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('layanan', $val ? ['kategori' => $val] : [])); ?>"
                   class="px-4 py-1.5 rounded-full text-sm font-semibold border transition-all
                          <?php echo e(request('kategori') == $val ? 'bg-slate-900 text-white border-slate-900' : 'bg-white text-slate-600 border-slate-200 hover:border-slate-400'); ?>">
                    <?php echo e($label); ?>

                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($pengumuman->isEmpty()): ?>
            <div class="text-center py-16 text-slate-400">
                <svg class="w-16 h-16 mx-auto mb-4 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <p class="font-semibold text-lg">Belum ada pengumuman.</p>
                <p class="text-sm mt-1">Coba pilih kategori lain atau periksa kembali nanti.</p>
            </div>
            <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <?php $__currentLoopData = $pengumuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm card-hover overflow-hidden flex flex-col" id="pengumuman-<?php echo e($p->id); ?>">
                    <!-- Header Badge -->
                    <div class="px-5 pt-5 pb-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold mb-3
                            <?php if($p->kategori == 'penting'): ?> bg-red-100 text-red-700
                            <?php elseif($p->kategori == 'kegiatan'): ?> bg-emerald-100 text-emerald-700
                            <?php elseif($p->kategori == 'kesehatan'): ?> bg-teal-100 text-teal-700
                            <?php elseif($p->kategori == 'infrastruktur'): ?> bg-amber-100 text-amber-700
                            <?php else: ?> bg-blue-100 text-blue-700 <?php endif; ?>">
                            <?php echo e($p->kategori_label); ?>

                        </span>
                        <h3 class="font-bold text-slate-900 text-base leading-snug"><?php echo e($p->judul); ?></h3>
                        <p class="text-xs text-slate-400 mt-2">
                            <?php echo e($p->tanggal_tayang->isoFormat('D MMMM Y')); ?>

                            <?php if($p->tanggal_berakhir): ?>
                            <span>· s/d <?php echo e($p->tanggal_berakhir->isoFormat('D MMMM Y')); ?></span>
                            <?php endif; ?>
                        </p>
                    </div>
                    <!-- Konten Preview -->
                    <div class="px-5 pb-3 flex-1">
                        <div class="text-slate-600 text-sm leading-relaxed line-clamp-3 prose prose-sm max-w-none">
                            <?php echo strip_tags($p->konten); ?>

                        </div>
                    </div>
                    <!-- Expand -->
                    <div class="px-5 pb-5">
                        <button onclick="toggleKonten(<?php echo e($p->id); ?>)"
                                class="text-primary text-sm font-semibold hover:underline mt-1 flex items-center gap-1" id="btn-<?php echo e($p->id); ?>">
                            Baca selengkapnya
                            <svg class="w-3 h-3 transition-transform" id="icon-<?php echo e($p->id); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div id="full-<?php echo e($p->id); ?>" class="hidden mt-4 prose prose-sm max-w-none text-slate-700">
                            <?php echo $p->konten; ?>

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php echo e($pengumuman->appends(request()->query())->links()); ?>

            <?php endif; ?>
        </div>

        <!-- PANEL LAPORAN -->
        <div id="panel-laporan" class="hidden">
            <div class="max-w-2xl">
                <div class="bg-amber-50 border border-amber-200 rounded-xl px-5 py-4 mb-8 flex items-start gap-3">
                    <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <div>
                        <p class="font-semibold text-amber-800 text-sm">Gunakan formulir ini dengan bijak</p>
                        <p class="text-amber-700 text-sm mt-0.5">Laporan palsu atau tidak relevan dapat diabaikan. Sertakan informasi yang jelas dan akurat.</p>
                    </div>
                </div>

                <form action="<?php echo e(route('laporan.store')); ?>" method="POST" enctype="multipart/form-data"
                      class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 space-y-6" id="form-laporan">
                    <?php echo csrf_field(); ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="form-label">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_pelapor" value="<?php echo e(old('nama_pelapor')); ?>" required
                                   placeholder="Nama Anda" class="form-input <?php $__errorArgs = ['nama_pelapor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['nama_pelapor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="form-label">No. HP / WhatsApp <span class="text-red-500">*</span></label>
                            <input type="text" name="kontak_pelapor" value="<?php echo e(old('kontak_pelapor')); ?>" required
                                   placeholder="08xxxxxxxxxx" class="form-input <?php $__errorArgs = ['kontak_pelapor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php $__errorArgs = ['kontak_pelapor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="form-label">Kategori Masalah <span class="text-red-500">*</span></label>
                            <select name="kategori" class="form-input <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="jalan" <?php echo e(old('kategori') == 'jalan' ? 'selected' : ''); ?>>🛣️ Jalan & Transportasi</option>
                                <option value="fasilitas" <?php echo e(old('kategori') == 'fasilitas' ? 'selected' : ''); ?>>🏗️ Fasilitas Umum</option>
                                <option value="lingkungan" <?php echo e(old('kategori') == 'lingkungan' ? 'selected' : ''); ?>>🌿 Lingkungan</option>
                                <option value="keamanan" <?php echo e(old('kategori') == 'keamanan' ? 'selected' : ''); ?>>🛡️ Keamanan</option>
                                <option value="lainnya" <?php echo e(old('kategori') == 'lainnya' ? 'selected' : ''); ?>>📋 Lainnya</option>
                            </select>
                            <?php $__errorArgs = ['kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="form-label">Lokasi Kejadian</label>
                            <input type="text" name="lokasi" value="<?php echo e(old('lokasi')); ?>"
                                   placeholder="cth: Jl. Trinil RT 03 RW 02"
                                   class="form-input">
                        </div>
                    </div>

                    <div>
                        <label class="form-label">Judul Laporan <span class="text-red-500">*</span></label>
                        <input type="text" name="judul" value="<?php echo e(old('judul')); ?>" required
                               placeholder="Singkat dan jelas" class="form-input <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="form-label">Deskripsi Masalah <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" rows="5" required
                                  placeholder="Jelaskan masalah secara detail: apa, kapan, seberapa parah, dampaknya..."
                                  class="form-input <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('deskripsi')); ?></textarea>
                        <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label class="form-label">Foto Dokumentasi <span class="text-slate-400 font-normal">(opsional, maks. 3MB)</span></label>
                        <div class="border-2 border-dashed border-slate-200 rounded-xl p-6 text-center hover:border-primary/50 transition-colors cursor-pointer relative">
                            <input type="file" name="foto" accept="image/jpeg,image/png,image/webp"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" id="foto-input"
                                   onchange="previewFoto(this)">
                            <div id="foto-placeholder">
                                <svg class="w-10 h-10 mx-auto text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <p class="text-slate-500 text-sm">Klik atau seret foto ke sini</p>
                                <p class="text-xs text-slate-400 mt-1">JPG, PNG, WebP (maks 3MB)</p>
                            </div>
                            <div id="foto-preview" class="hidden">
                                <img id="foto-img" src="" class="max-h-48 mx-auto rounded-lg object-cover" alt="Preview">
                                <p class="text-xs text-slate-500 mt-2" id="foto-name"></p>
                            </div>
                        </div>
                        <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit"
                            class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-4 rounded-xl transition-all shadow-lg shadow-emerald-500/25 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        Kirim Laporan
                    </button>
                </form>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-400 py-8 mt-16">
        <div class="max-w-screen-xl mx-auto px-4 text-center text-sm">
            <p>© <script>document.write(new Date().getFullYear())</script> SI-KAWU — Pemerintah Desa Kawu, Kedunggalar, Ngawi.</p>
        </div>
    </footer>

    <script>
        // Tab Switching
        function switchTab(tab) {
            const panels = ['pengumuman', 'laporan'];
            panels.forEach(t => {
                document.getElementById('panel-' + t).classList.toggle('hidden', t !== tab);
                const btn = document.getElementById('tab-' + t);
                btn.classList.toggle('active', t === tab);
                if (t !== tab) btn.classList.add('text-slate-600');
                else btn.classList.remove('text-slate-600');
            });
            // Jika tab laporan ada error, langsung ke tab laporan
        }

        // Auto switch ke tab laporan jika ada error dari form laporan
        <?php if($errors->any()): ?>
        switchTab('laporan');
        <?php endif; ?>

        // Toggle konten pengumuman
        function toggleKonten(id) {
            const el = document.getElementById('full-' + id);
            const btn = document.getElementById('btn-' + id);
            const icon = document.getElementById('icon-' + id);
            el.classList.toggle('hidden');
            if (el.classList.contains('hidden')) {
                btn.innerHTML = 'Baca selengkapnya <svg class="w-3 h-3 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>';
            } else {
                btn.innerHTML = 'Sembunyikan <svg class="w-3 h-3 transition-transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>';
            }
        }

        // Preview foto
        function previewFoto(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('foto-img').src = e.target.result;
                    document.getElementById('foto-name').textContent = input.files[0].name;
                    document.getElementById('foto-placeholder').classList.add('hidden');
                    document.getElementById('foto-preview').classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\kawu\resources\views/layanan/index.blade.php ENDPATH**/ ?>