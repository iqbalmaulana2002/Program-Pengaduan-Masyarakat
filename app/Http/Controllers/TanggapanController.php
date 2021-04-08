<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifikasiPengaduan;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapan = Tanggapan::orderBy('id', 'desc')->get();
        return view('/admin/dataTanggapan', compact('tanggapan'));
    }

    public function tanggapanSaya()
    {
        $tanggapan = Tanggapan::where('id_petugas', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('/admin/dataTanggapanSaya', compact('tanggapan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show(Tanggapan $tanggapan)
    {
        return view('/admin/detailTanggapan', compact('tanggapan'));
    }

    public function detailTanggapanSaya($id)
    {
        $petugas = auth()->user()->tanggapan;
        $tanggapan = null;
        foreach ($petugas as $p) {
            if ($id == $p->id) {
                $tanggapan = Tanggapan::where('id', $id)->first();
            }
        }
        return view('/admin/detailTanggapanSaya', compact('tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required',
            'status' => 'required'
        ]);


        $today = date('Y-m-d');
        $id_petugas = auth()->user()->id;
        $level = auth()->user()->level;

        // Update Tanggapan jika ada, Insert Tanggapan jika tidak ada
        Tanggapan::updateOrCreate(
            ['id_pengaduan' => $id],
            [
                'tgl_tanggapan' => $today,
                'tanggapan' => $request->tanggapan,
                'id_petugas' => $id_petugas
            ]
        );

        // Update Status Pengaduan
        Pengaduan::where('id', $id)->update([
            'status' => $request->status
        ]);

        $pengaduan = Pengaduan::find($id);
        $emailUser = $pengaduan->masyarakat->email;
        $data = [
            "nik" => $pengaduan->nik,
            "pengadu" => $pengaduan->masyarakat->nama,
            "tgl_pengaduan" => $pengaduan->tgl_pengaduan,
            "tgl_tanggapan" => $pengaduan->tanggapan->tgl_tanggapan,
            "tanggapan" => $pengaduan->tanggapan->tanggapan,
            "petugas" => $pengaduan->tanggapan->petugas->nama
        ];

        // Notifikasi Email
        Mail::to($pengaduan->masyarakat->email)->send(new NotifikasiPengaduan($data));

        return redirect('/'.$level.'/data/pengaduan')->with('pesan', 'Tanggapan berhasil dikirim');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tanggapan::destroy($id);
        return redirect('/admin/data/tanggapan');
    }
}
