@extends('layouts/layout-petugas')

@section('title', 'Tanggapan Saya')

@section('content')
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
						@foreach($tanggapan as $t)
							@isset($t->pengaduan)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$t->pengaduan->tgl_pengaduan}}</td>
									<td>{{$t->tgl_tanggapan}}</td>
									<td>{{$t->pengaduan->masyarakat->nama}}</td>
									<td>
										<a href="{{url('/'.auth()->user()->level.'/data/tanggapan/saya/'.$t->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-search-plus"></i> <span class="d-none d-lg-inline">Detail</span></a>
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
@endsection