<?php $__env->startComponent('mail::message'); ?>
# Halo, <?php echo e($data['pengadu']); ?>


Pengaduan Anda pada tangggal <?php echo e($data['tgl_pengaduan']); ?> telah di tanggapi oleh <?php echo e($data['petugas']); ?> pada tanggal <?php echo e($data['tgl_tanggapan']); ?>


# Isi Tanggapan
<?php echo e($data['tanggapan']); ?>


<?php $__env->startComponent('mail::button', ['url' => 'http://localhost:8000/login', 'color' => 'success']); ?>
Login Sekarang
<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

Terima Kasih telah menggunakan layanan kami,<br>
Petugas <?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views/notifikasi/email/petugas.blade.php ENDPATH**/ ?>