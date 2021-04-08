@extends('layouts/layout-petugas')

@section('title', 'Detail Tanggapan Saya')

@section('content')
<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow">

        {{-- Card Header --}}
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Detail Tanggapan Saya</h5>
        </div>

        {{-- Card Body --}}
        <div class="card-body">

            @empty($tanggapan)
                <div class="text-center">
                    <p class="lead text-gray-600 mb-5"><strong>Data tidak di temukan</strong></p>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-lg-6 mb-5 text-center">
                        <a href="{{asset('img/'.$tanggapan->pengaduan->foto)}}" target="_blank">
                            <img src="{{asset('img/'.$tanggapan->pengaduan->foto)}}" class="card-img-bottom rounded img-fluid shadow" style="width:400px; height:280px;"  alt="Klik untuk lebih jelas">
                        </a>
                    </div>
                </div>

                <div class="row">                
                    <div class="col-md-12">
                        <p>Anda telah menanggapi pengaduan dari {{$tanggapan->pengaduan->masyarakat->nama}} pada tanggal {{$tanggapan->pengaduan->tgl_pengaduan}} tentang {{$tanggapan->pengaduan->judul}}</p>
                        <h5 class="font-weight-bold">Isi Pengaduan</h5>
                        <p class="text-justify">{{$tanggapan->pengaduan->isi_laporan}}</p>
                        <h5 class="font-weight-bold">Tanggapan Anda</h5>
                        <p class="text-justify">{{$tanggapan->tanggapan}}</p>
                    </div>
                </div>
            @endempty

        </div>
	</div>
	<div class="text-center mt-3 mb-5 pb-5">
		<a href="{{ url('/'.auth()->user()->level.'/data/tanggapan/saya') }}" class="btn btn-primary">Kembali</a>
	</div>
    
</div>
@endsection