

<?php $__env->startSection('title', 'Profile Saya'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

	<?php if(session('pesan')): ?>
		<div class="alert alert-success">
			<?php echo e(session('pesan')); ?>

		</div>
	<?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow">

        
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Profile Saya</h5>
        </div>

        
        <div class="card-body">

                <div class="row">                
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped" cellspacing="0">
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td><strong><?php echo e(auth()->user()->username); ?></strong></td>
                                </tr>
                                <tr>
                                    <td>nama</td>
                                    <td>:</td>
                                    <td><strong><?php echo e(auth()->user()->nama); ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><strong><?php echo e(auth()->user()->email); ?></strong></td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td>
                                    <td>:</td>
                                    <td><strong><?php echo e(auth()->user()->telp); ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Level</td>
                                    <td>:</td>
                                    <td><strong><?php echo e(auth()->user()->level); ?></strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

        </div>
	</div>
	<div class="text-center mt-4 mb-5 pb-5">
		<a href="<?php echo e(url('/'.auth()->user()->level.'/profile')); ?>" class="btn btn-primary">Kembali</a>
		<a href="<?php echo e(url('/'.auth()->user()->level.'/profile/edit')); ?>" class="btn btn-warning">Edit Profile</a>
	</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout-petugas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views//petugas/profile.blade.php ENDPATH**/ ?>