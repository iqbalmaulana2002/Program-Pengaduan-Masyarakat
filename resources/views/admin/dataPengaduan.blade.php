@extends('layouts/layout-petugas')

@section('title', 'Data Pengaduan')

@section('content')
<div class="container">

    @if (session('pesan'))
        <div class="alert alert-success">
            {{ session('pesan') }}
        </div>
    @endif

    @if(session('pesanDanger'))
		<div class="alert alert-danger">
			{{session('pesan')}}
		</div>
	@endif

	@if(auth()->user()->level == 'admin')
		<ul class="nav mb-3">

			{{-- Export Excel --}}
			<li class="nav-item mr-1">
		    	<a href="{{ url('/admin/export/excel') }}" class="btn btn-success" onclick="return confirm('Download Excel?');">
					<i class="fas fa-file-excel"></i> Export Excel
				</a>
			</li>
			
			{{-- Export Pdf --}}
			<li class="nav-item">
		    	<a href="" class="btn btn-danger" data-toggle="modal" data-target="#ExportPdfModal">
					<i class="fas fa-file-pdf"></i> Export PDF
				</a>
			</li>

		</ul>
	@endif

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
						@foreach($pengaduan as $p)
							@isset($p->masyarakat)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$p->tgl_pengaduan}}</td>
									<td>{{$p->masyarakat->nama}}</td>
									<td>
										@php $badge = '';
	                                        if($p->status == '0'){
	                                            $badge = 'badge-danger';
	                                        }elseif($p->status == 'proses'){
	                                            $badge = 'badge-warning';
	                                        }else{
	                                            $badge = 'badge-success';
	                                        }
	                                    @endphp
										<span class="badge {{$badge}}">{{$p->status}}</span>
									</td>
									<td>
										{{-- button detail --}}
										<a href="{{url('/'.auth()->user()->level.'/data/pengaduan/'.$p->id)}}" class="btn btn-primary btn-sm mb-1"><i class="fas fa-search-plus"></i> <span class="d-none d-lg-inline">Detail</span></a>

										@if($p->status == 'selesai')
											
											@if(auth()->user()->level == 'admin')
											
												{{-- button delete --}}
												<form method="post" action="{{url('/admin/data/pengaduan/'.$p->id)}}" class="d-inline">
													@csrf
													@method('delete')
													<button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i> <span class="d-none d-lg-inline">Delete</span></button>
												</form>

											@endif

										@else
											{{-- button tanggapi --}}
											<a class="btn btn-success btn-sm mb-1" href="" data-toggle="modal" data-target=".tanggapan-{{$p->id}}"><i class="fas fa-check"></i> <span class="d-none d-lg-inline">Tanggapi</span></a>
										
											{{-- Modal Tanggapan --}}
											<div class="modal fade tanggapan-{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Berikan Tanggapan Anda</h5>
															<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<form action="{{url('/'.auth()->user()->level.'/tanggapan/'.$p->id)}}" method="post">
															@csrf
															<div class="modal-body">
																<div class="form-group">
																	<textarea class="form-control @error('tanggapan') is-invalid @enderror" name="tanggapan" placeholder="Masukan Tanggapan Anda" cols="30" rows="4" autofocus required>{{old('tanggapan')}}</textarea>
	                                								@error('tanggapan')<div class="text text-danger">{{ $message }}</div>@enderror
																</div>
																<div class="form-group">
																	<select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
																		<option value="" disabled selected>-- Ubah Status --</option>
																		@if($p->status == '0')
																			<option value="proses">Proses</option>
																		@endif
																			<option value="selesai">Selesai</option>
																	</select>
	                                								@error('status')<div class="text text-danger">{{ $message }}</div>@enderror
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

										@endif
									</td>
								</tr>
							@endisset
						@endforeach
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal Export PDF --}}
<div class="modal fade" id="ExportPdfModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      	<div class="modal-content">
	        <div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Export PDF</h5>
	        	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
	            	<span aria-hidden="true">×</span>
	        	</button>
	        </div>
	        <form action="{{ url('/admin/export/pdf') }}" method="post">
	        	@csrf
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
@endsection