

<?php $__env->startSection('title', 'Tanggapan Saya'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Tanggapan Saya</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Tanggal Pengaduan</th>
							<th>Tanggal Tanggapan</th>
							<th>Nama Pengadu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $tanggapan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if(isset($t->pengaduan)): ?>
								<tr>
									<td><?php echo e($loop->iteration); ?></td>
									<td><?php echo e($t->pengaduan->tgl_pengaduan); ?></td>
									<td><?php echo e($t->tgl_tanggapan); ?></td>
									<td><?php echo e($t->pengaduan->masyarakat->nama); ?></td>
									<td>
										<a href="<?php echo e(url('/'.auth()->user()->level.'/data/tanggapan/saya/'.$t->id)); ?>" class="btn btn-primary btn-sm"><i class="fas fa-search-plus"></i> <span class="d-none d-lg-inline">Detail</span></a>
									</td>
								</tr>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout-petugas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views//admin/dataTanggapanSaya.blade.php ENDPATH**/ ?>