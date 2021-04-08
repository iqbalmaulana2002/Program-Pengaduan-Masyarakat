@extends('layouts/layout-petugas')

@section('title', 'Data Masyarakat')

@section('content')
<div class="container">

    @if (session('pesan'))
        <div class="alert alert-success">
            {{ session('pesan') }}
        </div>
    @endif

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
							@if(auth()->user()->level == 'admin')
								<th>Action</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach($masyarakat as $m)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$m->nik}}</td>
								<td>{{$m->nama}}</td>
								<td>{{$m->username}}</td>
								<td>{{$m->email}}</td>
								<td>{{$m->telp}}</td>
								@if(auth()->user()->level == 'admin')
									<td>
										<form method="post" action="{{url('/admin/data/masyarakat/'.$m->nik)}}">
											@csrf
											@method('delete')
											<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i> <span class="d-none d-md-inline">Delete</span></button>
										</form>
									</td>
								@endif
							</tr>
						@endforeach
					</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection