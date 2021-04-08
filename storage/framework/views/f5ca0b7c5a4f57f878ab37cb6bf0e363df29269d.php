

<?php $__env->startSection('title', 'Pengaduan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mb-5">

	<div class="row justify-content-center">
		<div class="col-md">
			<h3 class="mb-4"><i class="fas fa-clipboard-list"></i> Form Pengaduan</h3>
			<form method="post" action="<?php echo e(url('/masyarakat/pengaduan')); ?>" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" value="<?php echo e(auth()->user()->nama); ?>" readonly>
				</div>
				<div class="form-group">
					<label for="judul">Judul Laporan</label>
					<input type="text" class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="judul" required id="judul" value="<?php echo e(old('judul')); ?>">
					<?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
					<label for="isi_laporan">Isi Laporan</label>
					<textarea class="form-control <?php $__errorArgs = ['isi_laporan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="isi_laporan" required id="isi_laporan"><?php echo e(old('isi_laporan')); ?></textarea>
					<?php $__errorArgs = ['isi_laporan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
					<label for="foto">Upload foto keluhan anda sebagai bukti</label>
					<input type="file" class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="foto" required name="foto">
					<?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group row float-right">
					<div class="col-md mt-4 mb-5">
						<a href="<?php echo e(url('/masyarakat')); ?>" class="btn btn-outline-success btn-light">Kembali</a>
						<button type="submit" class="btn btn-success">Buat Pengaduan</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts/layout-masyarakat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views/masyarakat/create.blade.php ENDPATH**/ ?>