<!DOCTYPE html>
<html>
<head>
	<title>Data Pengaduan</title>
	<style>
		table {
			margin: auto;
		}
	</style>
</head>
<body>

<center><h1>Data Pengaduan Masyarakat</h1></center>
<table border="1" cellspacing="0" cellpadding="4">
	<thead>
		<tr>
			<th>No</th>
			<th>NIK</th>
			<th>Nama</th>
			<th>Tanggal Pengaduan</th>
			<th>Judul</th>
			<th>Isi Pengaduan</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		@foreach($pengaduan as $p)
			@isset($p->masyarakat)
				<tr align="center">
					<td>{{$loop->iteration}}</td>
					<td>{{$p->masyarakat->nik}}</td>
					<td>{{$p->masyarakat->nama}}</td>
					<td>{{$p->tgl_pengaduan}}</td>
					<td>{{$p->judul}}</td>
					<td align="justify">{{$p->isi_laporan}}</td>
					<td>{{$p->status}}</td>
				</tr>
			@endisset
		@endforeach
	</tbody>
</table>

</body>
</html>