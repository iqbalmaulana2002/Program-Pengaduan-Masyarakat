

<?php $__env->startSection('title', 'Data Pengaduan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <?php if(session('pesan')): ?>
        <div class="alert alert-success">
            <?php echo e(session('pesan')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('pesanDanger')): ?>
		<div class="alert alert-danger">
			<?php echo e(session('pesan')); ?>

		</div>
	<?php endif; ?>

	<?php if(auth()->user()->level == 'admin'): ?>
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
	<?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Pengaduan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Tanggal Pengaduan</th>
							<th>Nama Pengadu</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if(isset($p->masyarakat)): ?>
								<tr>
									<td><?php echo e($loop->iteration); ?></td>
									<td><?php echo e($p->tgl_pengaduan); ?></td>
									<td><?php echo e($p->masyarakat->nama); ?></td>
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
									<td>
										
										<a href="<?php echo e(url('/'.auth()->user()->level.'/data/pengaduan/'.$p->id)); ?>" class="btn btn-primary btn-sm mb-1"><i class="fas fa-search-plus"></i> <span class="d-none d-lg-inline">Detail</span></a>

										<?php if($p->status == 'selesai'): ?>
											
											<?php if(auth()->user()->level == 'admin'): ?>
											
												
												<form method="post" action="<?php echo e(url('/admin/data/pengaduan/'.$p->id)); ?>" class="d-inline">
													<?php echo csrf_field(); ?>
													<?php echo method_field('delete'); ?>
													<button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i> <span class="d-none d-lg-inline">Delete</span></button>
												</form>

											<?php endif; ?>

										<?php else: ?>
											
											<a class="btn btn-success btn-sm mb-1" href="" data-toggle="modal" data-target=".tanggapan-<?php echo e($p->id); ?>"><i class="fas fa-check"></i> <span class="d-none d-lg-inline">Tanggapi</span></a>
										
											
											<div class="modal fade tanggapan-<?php echo e($p->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Berikan Tanggapan Anda</h5>
															<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<form action="<?php echo e(url('/'.auth()->user()->level.'/tanggapan/'.$p->id)); ?>" method="post">
															<?php echo csrf_field(); ?>
															<div class="modal-body">
																<div class="form-group">
																	<textarea class="form-control <?php $__errorArgs = ['tanggapan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tanggapan" placeholder="Masukan Tanggapan Anda" cols="30" rows="4" autofocus required><?php echo e(old('tanggapan')); ?></textarea>
	                                								<?php $__errorArgs = ['tanggapan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text text-danger"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
																</div>
																<div class="form-group">
																	<select name="status" id="status" class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
																		<option value="" disabled selected>-- Ubah Status --</option>
																		<?php if($p->status == '0'): ?>
																			<option value="proses">Proses</option>
																		<?php endif; ?>
																			<option value="selesai">Selesai</option>
																	</select>
	                                								<?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="text text-danger"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
		        	<small class="text-muted text-left my-3 ml-2">Catatan : Kosongkan semua inputan jika ingin mengexport semua data</small>

	    	</form>
      	</div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout-petugas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views/admin/dataPengaduan.blade.php ENDPATH**/ ?>