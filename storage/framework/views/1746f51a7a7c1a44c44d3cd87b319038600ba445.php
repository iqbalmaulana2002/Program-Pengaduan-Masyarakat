

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mb-5 pb-5">
	<?php if(session('pesan')): ?>
        <div class="alert alert-success">
            <?php echo e(session('pesan')); ?>

        </div>
    <?php endif; ?>
    
    <a class="btn btn-primary font-weight-bold mb-3" href="<?php echo e(url('/masyarakat/pengaduan')); ?>" role="button">Buat Pengaduan</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Pengaduan Saya</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Judul Laporan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td align="center"><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($p->tgl_pengaduan); ?></td>
                                <td><?php echo e($p->judul); ?></td>
                                <td>
                                    <?php $badge = '';
                                        if($p->status == '0'){
                                            $badge = 'badge-danger';
                                        }elseif($p->status == 'proses'){
                                            $badge = 'badge-warning';
                                        }else{
                                            $badge = 'badge-success';
                                        }
                                    ?>
                                    <span class="badge <?php echo e($badge); ?>"><?php echo e($p->status); ?></span>
                                </td>
                                <td><a href="<?php echo e(url('/masyarakat/pengaduan/'.$p->id)); ?>" class="btn btn-primary font-weight-bold"><i class="fas fa-search-plus"></i> <span class="d-none d-md-inline">Detail</span></a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts/layout-masyarakat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views/masyarakat/index.blade.php ENDPATH**/ ?>