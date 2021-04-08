

<?php $__env->startSection('title', 'Detail Pengaduan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow">

        
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Detail Pengaduan</h5>
        </div>

        
        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-lg-6 mb-5 text-center">
                    <a href="<?php echo e(asset('img/'.$pengaduan->foto)); ?>" target="_blank">
                        <img src="<?php echo e(asset('img/'.$pengaduan->foto)); ?>" class="card-img-bottom rounded img-fluid shadow" style="width:400px; height:280px;"  alt="Klik untuk lebih jelas">
                    </a>
                </div>
            </div>

            <div class="row">                
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped" cellspacing="0">
                            <tr>
                                <td>Tanggal Pengaduan</td>
                                <td>:</td>
                                <td><strong><?php echo e($pengaduan->tgl_pengaduan); ?></strong></td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td><strong><?php echo e($pengaduan->masyarakat->nik); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><strong><?php echo e($pengaduan->masyarakat->nama); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><strong><?php echo e($pengaduan->masyarakat->email); ?></strong></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td>:</td>
                                <td><strong><?php echo e($pengaduan->masyarakat->telp); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Isi Laporan</td>
                                <td>:</td>
                                <td><strong><?php echo e($pengaduan->isi_laporan); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>
                                    <?php $badge = '';
                                        if($pengaduan->status == '0'){
                                            $badge = 'badge-danger';
                                        }elseif($pengaduan->status == 'proses'){
                                            $badge = 'badge-warning';
                                        }else{
                                            $badge = 'badge-success';
                                        }
                                    ?>
                                    <h5><strong class="badge <?php echo e($badge); ?>"><?php echo e($pengaduan->status); ?></strong></h5>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
	</div>

    <?php if(isset($pengaduan->tanggapan)): ?>
        <div class="card shadow mt-4 mb-4">

            
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Tanggapan Petugas</h4>
            </div>

            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" cellspacing="0">
                            <tr>
                                <td>Tanggal Tanggapan</td>
                                <td>:</td>
                                <td><strong><?php echo e($pengaduan->tanggapan->tgl_tanggapan); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Nama Petugas</td>
                                <td>:</td>
                                <td><strong><?php echo e($pengaduan->tanggapan->petugas->nama); ?></strong></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td>:</td>
                                <td><strong><?php echo e($pengaduan->tanggapan->petugas->telp); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><strong><?php echo e($pengaduan->tanggapan->petugas->email); ?></strong></td>
                            </tr>
                            <tr>
                                <td>Tanggapan</td>
                                <td>:</td>
                                <td><strong><?php echo e($pengaduan->tanggapan->tanggapan); ?></strong></td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>

	<div class="text-center mt-3 mb-5 pb-5">
		<a href="<?php echo e(url('/'.auth()->user()->level.'/data/pengaduan')); ?>" class="btn btn-primary">Kembali</a>
        <?php if($pengaduan->status == 'selesai'): ?>
        
            <?php if(auth()->user()->level == 'admin'): ?>

                
                <form method="post" action="<?php echo e(url('/admin/data/pengaduan/'.$pengaduan->id)); ?>" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i> <span class="d-none d-lg-inline">Delete</span></button>
                </form>
            <?php endif; ?>

        <?php else: ?>
            
            <a class="btn btn-success" href="" data-toggle="modal" data-target=".tanggapan-<?php echo e($pengaduan->id); ?>"><i class="fas fa-check"></i> Tanggapi</a>
        
            
            <div class="modal fade tanggapan-<?php echo e($pengaduan->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Berikan Tanggapan Anda</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="<?php echo e(url('/'.auth()->user()->level.'/tanggapan/'.$pengaduan->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <textarea class="form-control" name="tanggapan" placeholder="Masukan Tanggapan Anda" cols="30" rows="4" autofocus required></textarea>
                                </div>
                                <div class="form-group">
                                    <select name="status" id="status" class="form-control">
                                        <option value="" disabled selected>-- Ubah Status --</option>
                                        <?php if($pengaduan->status == '0'): ?>
                                            <option value="proses">Proses</option>
                                        <?php endif; ?>
                                            <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php endif; ?>
	</div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout-petugas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views/admin/detailPengaduan.blade.php ENDPATH**/ ?>