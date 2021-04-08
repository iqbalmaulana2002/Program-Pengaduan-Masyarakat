

<?php $__env->startSection('title', 'Data Masyarakat'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <?php if(session('pesan')): ?>
        <div class="alert alert-success">
            <?php echo e(session('pesan')); ?>

        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Masyarakat</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-dark text-light">
						<tr>
							<th>#</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Email</th>
							<th>No. Telepon</th>
							<?php if(auth()->user()->level == 'admin'): ?>
								<th>Action</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $masyarakat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($loop->iteration); ?></td>
								<td><?php echo e($m->nik); ?></td>
								<td><?php echo e($m->nama); ?></td>
								<td><?php echo e($m->username); ?></td>
								<td><?php echo e($m->email); ?></td>
								<td><?php echo e($m->telp); ?></td>
								<?php if(auth()->user()->level == 'admin'): ?>
									<td>
										<form method="post" action="<?php echo e(url('/admin/data/masyarakat/'.$m->nik)); ?>">
											<?php echo csrf_field(); ?>
											<?php echo method_field('delete'); ?>
											<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i> <span class="d-none d-md-inline">Delete</span></button>
										</form>
									</td>
								<?php endif; ?>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout-petugas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views/admin/dataMasyarakat.blade.php ENDPATH**/ ?>