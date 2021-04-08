@extends('../layouts/layout-masyarakat')

@section('title', 'Dashboard')

@section('content')
<div class="container mb-5 pb-5">
	@if (session('pesan'))
        <div class="alert alert-success">
            {{ session('pesan') }}
        </div>
    @endif
    
    <a class="btn btn-primary font-weight-bold mb-3" href="{{url('/masyarakat/pengaduan')}}" role="button">Buat Pengaduan</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Data Pengaduan Saya</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Judul Laporan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengaduan as $p)
                            <tr>
                                <td align="center">{{$loop->iteration}}</td>
                                <td>{{$p->tgl_pengaduan}}</td>
                                <td>{{$p->judul}}</td>
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
                                <td><a href="{{url('/masyarakat/pengaduan/'.$p->id)}}" class="btn btn-primary font-weight-bold"><i class="fas fa-search-plus"></i> <span class="d-none d-md-inline">Detail</span></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
@endsection