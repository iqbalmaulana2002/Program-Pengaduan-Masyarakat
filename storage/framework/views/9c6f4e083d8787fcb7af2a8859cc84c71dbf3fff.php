

<?php $__env->startSection('title', 'Cetak Data'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

	<?php if(session('pesan')): ?>
		<div class="alert alert-danger">
			<?php echo e(session('pesan')); ?>

		</div>
	<?php endif; ?>

	<ul class="nav mb-3">

		
		<li class="nav-item mr-1">
	    	<a href="<?php echo e(url('/admin/export/excel')); ?>" class="btn btn-success" onclick="return confirm('Download Excel?');">
				<i class="fas fa-file-excel"></i> Export Excel
			</a>
		</li>
		
		
		<li class="nav-item">
	    	<a href="" class="btn btn-danger" data-toggle="modal" data-target="#ExportPdfModal">
				<i class="fas fa-file-pdf"></i> Export PDF
			</a>
		</li>

	</ul>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h3 class="m-0 font-weight-bold text-primary mb-2">Data Pengaduan Masyarakat</h3>
		</div>

		<div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
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
								<td><?php echo e($loop->iteration); ?></td>
								<td><?php echo e($p->tgl_pengaduan); ?></td>
								<td><?php echo e($p->judul); ?></td>
								<td><?php echo e($p->status); ?></td>
								<td>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
                </table>
            </div>
        </div>
	</div>
</div>



<div class="modal fade" id="ExportPdfModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      	<div class="modal-content">
	        <div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Export PDF</h5>
	        	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
	            	<span aria-hidden="true">×</span>
	        	</button>
	        </div>
	        <form action="<?php echo e(url('/admin/export/pdf')); ?>" method="post">
	        	<?php echo csrf_field(); ?>
		        <div class="modal-body">
		            <div class="form-group row">
		            	<div class="col-6">
		                	<input type="date" name="tgl_awal" class="form-control">
		            	</div>
		            	<div class="col-6">
		                	<input type="date" name="tgl_akhir" class="form-control">
		            	</div>
		            </div>
		            <div class="form-group">
		                <select class="form-control" name="status">
		                	<option value="">-- Pilih Status --</option>
		                	<option value="0">0</option>
		                	<option value="proses">Proses</option>
		                	<option value="selesai">Selesai</option>
		                </select>
		            </div>
		        </div>
		        <div class="modal-footer">
		            <button class="btn btn-secondary" type="button" data-dismiss="modal">Keluar</button>
		            <button class="btn btn-primary" type="submit">Export</button>
		        </div>
	    	</form>
      	</div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout-petugas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views/admin/generateLaporan.blade.php ENDPATH**/ ?>