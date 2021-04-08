@extends('../layouts/layout-masyarakat')

@section('title', 'Pengaduan')

@section('content')
<div class="container mb-5">

	<div class="row justify-content-center">
		<div class="col-md">
			<h3 class="mb-4"><i class="fas fa-clipboard-list"></i> Form Pengaduan</h3>
			<form method="post" action="{{url('/masyarakat/pengaduan')}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" value="{{auth()->user()->nama}}" readonly>
				</div>
				<div class="form-group">
					<label for="judul">Judul Laporan</label>
					<input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" required id="judul" value="{{old('judul')}}">
					@error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
				</div>
				<div class="form-group">
					<label for="isi_laporan">Isi Laporan</label>
					<textarea class="form-control @error('isi_laporan') is-invalid @enderror" name="isi_laporan" required id="isi_laporan">{{old('isi_laporan')}}</textarea>
					@error('isi_laporan')<div class="invalid-feedback">{{ $message }}</div>@enderror
				</div>
				<div class="form-group">
					<label for="foto">Upload foto keluhan anda sebagai bukti</label>
					<input type="file" class="form-control @error('foto')is-invalid @enderror" id="foto" required name="foto">
					@error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
				</div>
				<div class="form-group row float-right">
					<div class="col-md mt-4 mb-5">
						<a href="{{url('/masyarakat')}}" class="btn btn-outline-success btn-light">Kembali</a>
						<button type="submit" class="btn btn-success">Buat Pengaduan</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
@endsection