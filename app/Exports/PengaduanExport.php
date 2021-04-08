<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengaduanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pengaduan::all();
    }

    public function map($pengaduan): array
    {
    	return [
            $pengaduan->masyarakat->nik,
            $pengaduan->masyarakat->nama,
            $pengaduan->masyarakat->telp,
            $pengaduan->tgl_pengaduan,
            $pengaduan->judul,
            $pengaduan->isi_laporan,
            $pengaduan->status
        ];
    }

    public function headings(): array
    {
        return [
            'NIK',
            'Nama Pengadu',
            'No. Telepon',
            'Tanggal Pengaduan',
            'Judul',
            'Isi Pengaduan',
            'Status'
        ];
    }

}
