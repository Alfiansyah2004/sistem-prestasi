
<?php $__env->startSection('page-title', 'Laporan Prestasi'); ?>
<?php $__env->startSection('content'); ?>

<style>
.filter-card {
    background: white;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    margin-bottom: 24px;
}
.section-card {
    background: white;
    border-radius: 16px;
    border: none;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    overflow: hidden;
}
.section-card .card-header {
    background: white;
    border-bottom: 1px solid #f0f0f0;
    padding: 18px 24px;
    font-weight: 700;
    font-size: 0.95rem;
}
</style>

<!-- Filter & Export -->
<div class="filter-card">
    <div class="row align-items-end g-3">
        <div class="col-md-3">
            <label class="form-label fw-semibold">Filter Kelas</label>
            <select id="filterKelas" class="form-select">
                <option value="">Semua Kelas</option>
                <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama_kelas); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-semibold">Filter Tingkat</label>
            <select id="filterTingkat" class="form-select">
                <option value="">Semua Tingkat</option>
                <?php $__currentLoopData = ['Sekolah','Kabupaten','Provinsi','Nasional','Internasional']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($t); ?>"><?php echo e($t); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="col-md-3">
            <a id="btnExportPdf" href="<?php echo e(route('laporan.pdf')); ?>"
               class="btn btn-danger w-100">
                <i class="bi bi-file-earmark-pdf-fill me-2"></i>Export PDF
            </a>
        </div>
        <div class="col-md-3">
            <button onclick="window.print()" class="btn btn-outline-secondary w-100">
                <i class="bi bi-printer-fill me-2"></i>Cetak Halaman
            </button>
        </div>
    </div>
</div>

<!-- Tabel Laporan -->
<div class="section-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-table me-2 text-success"></i>Data Laporan Prestasi</span>
        <small class="text-muted">Total: <?php echo e($prestasi->count()); ?> prestasi</small>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead style="background:#f8fffe;">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Nama Lomba</th>
                    <th>Jenis</th>
                    <th>Tingkat</th>
                    <th>Juara</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $prestasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4"><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($p->siswa->nama); ?></td>
                    <td><?php echo e($p->siswa->kelas->nama_kelas ?? '-'); ?></td>
                    <td><?php echo e($p->nama_lomba); ?></td>
                    <td><span class="badge bg-light text-dark"><?php echo e($p->jenisPrestasi->nama_jenis); ?></span></td>
                    <td><?php echo e($p->tingkat); ?></td>
                    <td>
                        <?php if($p->juara == 'Juara 1'): ?> 🥇
                        <?php elseif($p->juara == 'Juara 2'): ?> 🥈
                        <?php elseif($p->juara == 'Juara 3'): ?> 🥉
                        <?php endif; ?>
                        <span class="badge bg-warning text-dark"><?php echo e($p->juara); ?></span>
                    </td>
                    <td><small class="text-muted"><?php echo e($p->tanggal); ?></small></td>
                    <td>
                        <a href="<?php echo e(route('laporan.siswa.pdf', $p->siswa->id)); ?>"
                           class="btn btn-sm btn-outline-danger" title="PDF Siswa ini">
                            <i class="bi bi-file-person-fill"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="9" class="text-center text-muted py-4">
                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                        Belum ada data prestasi
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
// Update link PDF saat filter berubah
function updatePdfLink() {
    const kelas   = document.getElementById('filterKelas').value;
    const tingkat = document.getElementById('filterTingkat').value;
    let url = "<?php echo e(route('laporan.pdf')); ?>?";
    if (kelas)   url += 'kelas_id=' + kelas + '&';
    if (tingkat) url += 'tingkat=' + tingkat;
    document.getElementById('btnExportPdf').href = url;
}
document.getElementById('filterKelas').addEventListener('change', updatePdfLink);
document.getElementById('filterTingkat').addEventListener('change', updatePdfLink);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\sistem-prestasi-laravel9-FIXED\fixed-project\resources\views/laporan/index.blade.php ENDPATH**/ ?>