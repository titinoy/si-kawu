<?php $__env->startSection('title', 'Laporan Masuk'); ?>
<?php $__env->startSection('page-title', 'Laporan Masuk'); ?>
<?php $__env->startSection('page-subtitle', 'Kelola laporan permasalahan dari warga desa'); ?>

<?php $__env->startSection('content'); ?>


<div class="flex flex-wrap gap-3 mb-6">
    <?php $__currentLoopData = ['all' => 'Semua', 'baru' => 'Baru', 'diproses' => 'Diproses', 'selesai' => 'Selesai', 'ditolak' => 'Ditolak']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('admin.laporan.index', $key != 'all' ? ['status' => $key] + request()->except('status', 'page') : request()->except('status', 'page'))); ?>"
       class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold transition-all
              <?php echo e((request('status') == $key || ($key == 'all' && !request('status'))) ? 'bg-slate-900 text-white shadow-md' : 'bg-white text-slate-600 border border-slate-200 hover:border-slate-300 hover:bg-slate-50'); ?>">
        <?php echo e($label); ?>

        <?php if($key != 'all'): ?>
        <span class="inline-flex items-center justify-center w-5 h-5 rounded-full text-xs
            <?php if($key == 'baru'): ?> bg-blue-500 text-white
            <?php elseif($key == 'diproses'): ?> bg-amber-500 text-white
            <?php elseif($key == 'selesai'): ?> bg-emerald-500 text-white
            <?php else: ?> bg-red-500 text-white <?php endif; ?>">
            <?php echo e($count[$key]); ?>

        </span>
        <?php endif; ?>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<div class="card mb-6">
    <form method="GET" action="<?php echo e(route('admin.laporan.index')); ?>" class="flex flex-wrap gap-3 items-end">
        <?php if(request('status')): ?>
        <input type="hidden" name="status" value="<?php echo e(request('status')); ?>">
        <?php endif; ?>
        <div class="flex-1 min-w-48">
            <label class="form-label">Cari</label>
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari judul atau nama pelapor..." class="form-input">
        </div>
        <div>
            <label class="form-label">Kategori</label>
            <select name="kategori" class="form-input">
                <option value="">Semua</option>
                <?php $__currentLoopData = ['jalan' => 'Jalan', 'fasilitas' => 'Fasilitas', 'lingkungan' => 'Lingkungan', 'keamanan' => 'Keamanan', 'lainnya' => 'Lainnya']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($val); ?>" <?php echo e(request('kategori') == $val ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit" class="btn-primary">Filter</button>
        <a href="<?php echo e(route('admin.laporan.index')); ?>" class="btn-secondary">Reset</a>
    </form>
</div>


<div class="card overflow-hidden p-0">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Laporan</th>
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Pelapor</th>
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Kategori</th>
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Tanggal</th>
                    <th class="text-left px-6 py-4 font-semibold text-slate-600">Status</th>
                    <th class="text-right px-6 py-4 font-semibold text-slate-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php $__empty_1 = true; $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <?php if($l->foto): ?>
                            <img src="<?php echo e($l->foto_url); ?>" class="w-10 h-10 rounded-lg object-cover shrink-0 border border-slate-200" alt="Foto laporan">
                            <?php else: ?>
                            <div class="w-10 h-10 bg-slate-100 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <?php endif; ?>
                            <div>
                                <div class="font-semibold text-slate-800 max-w-xs truncate">#<?php echo e(str_pad($l->id, 4, '0', STR_PAD_LEFT)); ?> <?php echo e($l->judul); ?></div>
                                <?php if($l->lokasi): ?>
                                <div class="text-xs text-slate-400 mt-0.5">📍 <?php echo e($l->lokasi); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-slate-800"><?php echo e($l->nama_pelapor); ?></div>
                        <div class="text-xs text-slate-400"><?php echo e($l->kontak_pelapor); ?></div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="badge bg-slate-100 text-slate-700"><?php echo e($l->kategori_label); ?></span>
                    </td>
                    <td class="px-6 py-4 text-slate-500"><?php echo e($l->created_at->format('d M Y')); ?></td>
                    <td class="px-6 py-4">
                        <span class="badge
                            <?php if($l->status == 'baru'): ?> bg-blue-100 text-blue-700
                            <?php elseif($l->status == 'diproses'): ?> bg-amber-100 text-amber-700
                            <?php elseif($l->status == 'selesai'): ?> bg-emerald-100 text-emerald-700
                            <?php else: ?> bg-red-100 text-red-700 <?php endif; ?>">
                            <?php echo e($l->status_label); ?>

                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="<?php echo e(route('admin.laporan.show', $l->id)); ?>"
                           class="p-2 text-slate-500 hover:text-primary hover:bg-primary/10 rounded-lg transition-all inline-flex" title="Detail">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                        <svg class="w-12 h-12 mx-auto mb-3 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="font-medium">Tidak ada laporan ditemukan.</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($laporan->hasPages()): ?>
    <div class="px-6 py-4 border-t border-slate-100">
        <?php echo e($laporan->appends(request()->query())->links()); ?>

    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kawu\resources\views/admin/laporan/index.blade.php ENDPATH**/ ?>