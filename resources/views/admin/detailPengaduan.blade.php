@extends('layouts/layout-petugas')

@section('title', 'Detail Pengaduan')

@section('content')
<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow">

        {{-- Card Header --}}
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Detail Pengaduan</h5>
        </div>

        {{-- Card Body --}}
        <div class="card-body">

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
                                <td>Email</td>
                                <td>:</td>
                                <td><strong>{{ $pengaduan->masyarakat->email }}</strong></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td>:</td>
                                <td><strong>{{ $pengaduan->masyarakat->telp }}</strong></td>
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

        </div>
	</div>

    @isset($pengaduan->tanggapan)
        <div class="card shadow mt-4 mb-4">

            {{-- Card Header --}}
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Tanggapan Petugas</h4>
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
		<a href="{{ url('/'.auth()->user()->level.'/data/pengaduan') }}" class="btn btn-primary">Kembali</a>
        @if($pengaduan->status == 'selesai')
        
            @if(auth()->user()->level == 'admin')

                {{-- button delete --}}
                <form method="post" action="{{url('/admin/data/pengaduan/'.$pengaduan->id)}}" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin?');"><i class="fas fa-trash"></i> <span class="d-none d-lg-inline">Delete</span></button>
                </form>
            @endif

        @else
            {{-- button tanggapi --}}
            <a class="btn btn-success" href="" data-toggle="modal" data-target=".tanggapan-{{$pengaduan->id}}"><i class="fas fa-check"></i> Tanggapi</a>
        
            {{-- Modal Tanggapan --}}
            <div class="modal fade tanggapan-{{$pengaduan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Berikan Tanggapan Anda</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="{{url('/'.auth()->user()->level.'/tanggapan/'.$pengaduan->id)}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <textarea class="form-control" name="tanggapan" placeholder="Masukan Tanggapan Anda" cols="30" rows="4" autofocus required></textarea>
                                </div>
                                <div class="form-group">
                                    <select name="status" id="status" class="form-control">
                                        <option value="" disabled selected>-- Ubah Status --</option>
                                        @if($pengaduan->status == '0')
                                            <option value="proses">Proses</option>
                                        @endif
                                            <option value="selesai">Selesai</option>
                                    </select>
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
	</div>
    
</div>
@endsection