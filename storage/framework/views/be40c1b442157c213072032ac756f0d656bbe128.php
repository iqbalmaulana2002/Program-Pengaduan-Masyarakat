

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="jumbotron">
        <h1 class="display-4">Selamat Datang <span class="d-none d-sm-inline"><?php echo e(auth()->user()->nama); ?></span></h1>
        <p class="lead">Silahkan Kelola Data Pengaduan Masyarkat dan Berikan Tanggapan Anda</p>
        <hr class="my-4"><!-- 
        <p>Terima Kasih Telah Menggunakan Layanan Kami</p>
        <a class="btn btn-primary mt-2 px-4" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
        </a> -->

    	<h5 class="mb-3">Total Pengaduan Hari ini</h5>

        <div class="row">

	        <!-- Yang belum di tanggapi Card -->
	        <div class="col-sm-4 mb-4">
	            <div class="card border-left-danger shadow h-100 py-1 bg-light">
	                <div class="card-body">
	                    <div class="row no-gutters align-items-center">
	                        <div class="col mr-2">
	                            <div class="text-xs font-weight-bold text-uppercase mb-3">Yang belum di tanggapi</div>
	                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?php echo e($belum); ?></div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <!-- Total Pengaduan Minggu Ini Card -->
	        <div class="col-sm-4 mb-4">
	            <div class="card border-left-warning shadow h-100 py-1 bg-light">
	                <div class="card-body">
	                    <div class="row no-gutters align-items-center">
	                        <div class="col mr-2">
	                            <div class="text-xs font-weight-bold text-uppercase mb-3">Yang masih di proses</div>
	                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?php echo e($proses); ?></div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <!-- Total Pengaduan Bulan Ini Card -->
	        <div class="col-sm-4 mb-4">
	            <div class="card border-left-success shadow h-100 py-1 bg-light">
	                <div class="card-body">
	                    <div class="row no-gutters align-items-center">
	                        <div class="col mr-2">
	                            <div class="text-xs font-weight-bold text-uppercase mb-3">Yang sudah selesai</div>
	                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"><?php echo e($selesai); ?></div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts/layout-petugas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views/petugas/index.blade.php ENDPATH**/ ?>