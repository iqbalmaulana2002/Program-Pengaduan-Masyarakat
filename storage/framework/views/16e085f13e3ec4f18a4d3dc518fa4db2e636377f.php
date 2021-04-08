

<?php $__env->startSection('title', 'Detail Tanggapan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow">

        
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Detail Tanggapan</h5>
        </div>

        
        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-lg-6 mb-5 text-center">
                    <a href="<?php echo e(asset('img/'.$tanggapan->pengaduan->foto)); ?>" target="_blank">
                        <img src="<?php echo e(asset('img/'.$tanggapan->pengaduan->foto)); ?>" class="card-img-bottom rounded img-fluid shadow" style="width:400px; height:280px;"  alt="Klik untuk lebih jelas">
                    </a>
                </div>
            </div>

            <div class="row">                
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped" cellspacing="0">
                            <tr>
                                <td>NIK Pengadu</td>
                                <td>:</td>
                                <td><strong><?php echo e($tanggapan->pengaduan->masyarakat->nik); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Nama Pengadu</td>
                                <td>:</td>
                                <td><strong><?php echo e($tanggapan->pengaduan->masyarakat->nama); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pengaduan</td>
                                <td>:</td>
                                <td><strong><?php echo e($tanggapan->pengaduan->tgl_pengaduan); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Isi Aduan</td>
                                <td>:</td>
                                <td><strong><?php echo e($tanggapan->pengaduan->isi_laporan); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Petugas Yang Menanggapi</td>
                                <td>:</td>
                                <td><strong><?php echo e($tanggapan->petugas->nama); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Tanggal Tanggapan</td>
                                <td>:</td>
                                <td><strong><?php echo e($tanggapan->tgl_tanggapan); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Isi Tanggapan</td>
                                <td>:</td>
                                <td><strong><?php echo e($tanggapan->tanggapan); ?></strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
	</div>
	<div class="text-center mt-3 mb-5 pb-5">
		<a href="<?php echo e(url('/'.auth()->user()->level.'/data/tanggapan')); ?>" class="btn btn-primary">Kembali</a>
        
        <?php if(auth()->user()->level == 'admin'): ?>

            
            <form method="post" action="<?php echo e(url('/admin/data/tanggapan/'.$tanggapan->id)); ?>" class="d-inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i> <span class="d-none d-lg-inline">Delete</span></button>
            </form>

        <?php endif; ?>

	</div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout-petugas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views//admin/detailTanggapan.blade.php ENDPATH**/ ?>