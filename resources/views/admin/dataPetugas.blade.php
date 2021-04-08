@extends('layouts/layout-petugas')

@section('title', 'Data Petugas')

@section('content')
<div class="container">

    @if (session('pesan'))
        <div class="alert alert-success">
            {{ session('pesan') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Petugas</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Email</th>
							<th>No. Telepon</th>
                            <th>Level</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($petugas as $p)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$p->nama}}</td>
								<td>{{$p->username}}</td>
								<td>{{$p->email}}</td>
								<td>{{$p->telp}}</td>
								<td>{{$p->level}}</td>
								<td>
									<form method="post" action="{{url('/admin/data/petugas/'.$p->id)}}">
										@csrf
										@method('delete')
										<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i> <span class="d-none d-md-inline">Delete</span></button>
									</form>
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