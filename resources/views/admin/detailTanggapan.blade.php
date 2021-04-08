@extends('layouts/layout-petugas')

@section('title', 'Detail Tanggapan')

@section('content')
<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow">

        {{-- Card Header --}}
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Detail Tanggapan</h5>
        </div>

        {{-- Card Body --}}
        <div class="card-body">

            <div class="row justify-content-center">
                <div class="col-lg-6 mb-5 text-center">
                    <a href="{{asset('img/'.$tanggapan->pengaduan->foto)}}" target="_blank">
                        <img src="{{asset('img/'.$tanggapan->pengaduan->foto)}}" class="card-img-bottom rounded img-fluid shadow" style="width:400px; height:280px;"  alt="Klik untuk lebih jelas">
                    </a>
                </div>
            </div>

            <div class="row">                
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped" cellspacing="0">
                            <tr>
                                <td>NIK Pengadu</td>
                                <td>:</td>
                                <td><strong>{{ $tanggapan->pengaduan->masyarakat->nik }}</strong></td>
                            </tr>
                            <tr>
                                <td>Nama Pengadu</td>
                                <td>:</td>
                                <td><strong>{{ $tanggapan->pengaduan->masyarakat->nama }}</strong></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pengaduan</td>
                                <td>:</td>
                                <td><strong>{{ $tanggapan->pengaduan->tgl_pengaduan }}</strong></td>
                            </tr>
                            <tr>
                                <td>Isi Aduan</td>
                                <td>:</td>
                                <td><strong>{{ $tanggapan->pengaduan->isi_laporan }}</strong></td>
                            </tr>
                            <tr>
                                <td>Petugas Yang Menanggapi</td>
                                <td>:</td>
                                <td><strong>{{ $tanggapan->petugas->nama }}</strong></td>
                            </tr>
                            <tr>
                                <td>Tanggal Tanggapan</td>
                                <td>:</td>
                                <td><strong>{{ $tanggapan->tgl_tanggapan }}</strong></td>
                            </tr>
                            <tr>
                                <td>Isi Tanggapan</td>
                                <td>:</td>
                                <td><strong>{{ $tanggapan->tanggapan }}</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
	</div>
	<div class="text-center mt-3 mb-5 pb-5">
		<a href="{{ url('/'.auth()->user()->level.'/data/tanggapan') }}" class="btn btn-primary">Kembali</a>
        
        @if(auth()->user()->level == 'admin')

            {{-- button delete --}}
            <form method="post" action="{{url('/admin/data/tanggapan/'.$tanggapan->id)}}" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i> <span class="d-none d-lg-inline">Delete</span></button>
            </form>

        @endif

	</div>
    
</div>
@endsection