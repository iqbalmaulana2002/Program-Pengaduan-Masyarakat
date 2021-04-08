@extends('layouts/layout-petugas')

@section('title', 'Data Tanggapan')

@section('content')
<div class="container">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Tanggapan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Tanggal Pengaduan</th>
							<th>Nama Pengadu</th>
							<th>Tanggal Tanggapan</th>
							<th>Yang Menanggapi</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tanggapan as $t)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$t->pengaduan->tgl_pengaduan}}</td>
								<td>{{$t->pengaduan->masyarakat->nama}}</td>
								<td>{{$t->tgl_tanggapan}}</td>
								@if($t->petugas->nama == auth()->user()->nama)
									<td><strong>Anda</strong></td>
								@else
									<td>{{$t->petugas->nama}}</td>
								@endif
								<td>
									<a href="{{url('/'.auth()->user()->level.'/data/tanggapan/'.$t->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-search-plus"></i> <span class="d-none d-lg-inline">Detail</span></a>
									@if(auth()->user()->level == 'admin')
										<form method="post" action="{{url('/admin/data/tanggapan/'.$t->id)}}" class="d-inline">
											@csrf
											@method('delete')
											<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i> <span class="d-none d-md-inline">Delete</span></button>
										</form>
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection