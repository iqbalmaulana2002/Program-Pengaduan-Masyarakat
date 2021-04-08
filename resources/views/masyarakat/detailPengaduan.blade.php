@extends('../layouts/layout-masyarakat')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow">

        {{-- Card Header --}}
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Detail Pengaduan Anda</h5>
        </div>

        {{-- Card Body --}}
        <div class="card-body">

            @empty($pengaduan)
                <div class="text-center">
                    <p class="lead text-gray-600 mb-5"><strong>Data tidak di temukan</strong></p>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-lg-6 mb-5 text-center">
                        <a href="{{asset('img/'.$pengaduan->foto)}}" target="_blank">
                            <img src="{{asset('img/'.$pengaduan->foto)}}" class="card-img-bottom rounded img-fluid shadow" style="width:400px; height:280px;"  alt="Klik untuk lebih jelas">
                        </a>
                    </div>
                </div>

                <div class="row">                
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped" cellspacing="0">
                                <tr>
                                    <td>Tanggal Pengaduan</td>
                                    <td>:</td>
                                    <td><strong>{{ $pengaduan->tgl_pengaduan }}</strong></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><strong>{{ $pengaduan->masyarakat->nik }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><strong>{{ $pengaduan->masyarakat->nama }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Judul Laporan</td>
                                    <td>:</td>
                                    <td><strong>{{ $pengaduan->judul }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Isi Laporan</td>
                                    <td>:</td>
                                    <td><strong>{{ $pengaduan->isi_laporan }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                        @php $badge = '';
                                            if($pengaduan->status == '0'){
                                                $badge = 'badge-danger';
                                            }elseif($pengaduan->status == 'proses'){
                                                $badge = 'badge-warning';
                                            }else{
                                                $badge = 'badge-success';
                                            }
                                        @endphp
                                        <h5><strong class="badge {{$badge}}">{{ $pengaduan->status }}</strong></h5>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @endempty

        </div>
	</div>

    @isset($pengaduan->tanggapan)
        <div class="card shadow mt-4 mb-4">

            {{-- Card Header --}}
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Petugas Yang Menanggapi</h4>
            </div>

            {{-- Card Body --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" cellspacing="0">
                            <tr>
                                <td>Tanggal Tanggapan</td>
                                <td>:</td>
                                <td><strong>{{$pengaduan->tanggapan->tgl_tanggapan}}</strong></td>
                            </tr>
                            <tr>
                                <td>Nama Petugas</td>
                                <td>:</td>
                                <td><strong>{{$pengaduan->tanggapan->petugas->nama}}</strong></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td>:</td>
                                <td><strong>{{$pengaduan->tanggapan->petugas->telp}}</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><strong>{{$pengaduan->tanggapan->petugas->email}}</strong></td>
                            </tr>
                            <tr>
                                <td>Tanggapan</td>
                                <td>:</td>
                                <td><strong>{{$pengaduan->tanggapan->tanggapan}}</strong></td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    @endisset

	<div class="text-center mt-3 mb-5 pb-5">
		<a href="{{ url('/masyarakat') }}" class="btn btn-primary btn-lg">Kembali</a>
	</div>
    
</div>
@endsection