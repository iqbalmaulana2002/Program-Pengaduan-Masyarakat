@component('mail::message')
# Halo, {{ $data['pengadu'] }}

Pengaduan Anda pada tangggal {{ $data['tgl_pengaduan'] }} telah di tanggapi oleh {{ $data['petugas'] }} pada tanggal {{ $data['tgl_tanggapan'] }}

# Isi Tanggapan
{{ $data['tanggapan'] }}

@component('mail::button', ['url' => 'http://localhost:8000/login', 'color' => 'success'])
Login Sekarang
@endcomponent

Terima Kasih telah menggunakan layanan kami,<br>
Petugas {{ config('app.name') }}
@endcomponent
