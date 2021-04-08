

<?php $__env->startSection('title', 'Detail Tanggapan Saya'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow">

        
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Detail Tanggapan Saya</h5>
        </div>

        
        <div class="card-body">

            <?php if(empty($tanggapan)): ?>
                <div class="text-center">
                    <p class="lead text-gray-600 mb-5"><strong>Data tidak di temukan</strong></p>
                </div>
            <?php else: ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6 mb-5 text-center">
                        <a href="<?php echo e(asset('img/'.$tanggapan->pengaduan->foto)); ?>" target="_blank">
                            <img src="<?php echo e(asset('img/'.$tanggapan->pengaduan->foto)); ?>" class="card-img-bottom rounded img-fluid shadow" style="width:400px; height:280px;"  alt="Klik untuk lebih jelas">
                        </a>
                    </div>
                </div>

                <div class="row">                
                    <div class="col-md-12">
                        <p>Anda telah menanggapi pengaduan dari <?php echo e($tanggapan->pengaduan->masyarakat->nama); ?> pada tanggal <?php echo e($tanggapan->pengaduan->tgl_pengaduan); ?> tentang <?php echo e($tanggapan->pengaduan->judul); ?></p>
                        <h5 class="font-weight-bold">Isi Pengaduan</h5>
                        <p class="text-justify"><?php echo e($tanggapan->pengaduan->isi_laporan); ?></p>
                        <h5 class="font-weight-bold">Tanggapan Anda</h5>
                        <p class="text-justify"><?php echo e($tanggapan->tanggapan); ?></p>
                    </div>
                </div>
            <?php endif; ?>

        </div>
	</div>
	<div class="text-center mt-3 mb-5 pb-5">
		<a href="<?php echo e(url('/'.auth()->user()->level.'/data/tanggapan/saya')); ?>" class="btn btn-primary">Kembali</a>
	</div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout-petugas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views//admin/detailTanggapanSaya.blade.php ENDPATH**/ ?>