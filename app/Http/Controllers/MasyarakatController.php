<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nik = auth()->user()->nik;
        $pengaduan = Pengaduan::where('nik', $nik)->orderBy('id', 'desc')->get();
        return view('masyarakat/index', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masyarakat/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'isi_laporan' => 'required',
            'foto' => 'required|mimes:jpg,png,jpeg|max:3072'
        ]);

        $today = date("Y-m-d");
        $nik = auth()->user()->nik;
        $newImg = time().'-img-pengaduan.'.$request->foto->extension();

        // Insert Data ke Database
        Pengaduan::create([
            'tgl_pengaduan' => $today,
            'nik' => $nik,
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $newImg,
            'status' => '0'
        ]);

        // Upload Foto
        $request->foto->move(public_path('img'), $newImg);

        return redirect('/masyarakat')->with('pesan', 'Pengaduan berhasil di buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('masyarakat/show');
    }

    public function detailPengaduan($id)
    {
        $masyarakat = auth()->user()->pengaduan;
        $pengaduan = null;
        $tanggapan = null;
        foreach ($masyarakat as $m) {
            if ($id == $m->id) {
                $pengaduan = Pengaduan::find($id);
            }
        }
        return view('masyarakat/detailPengaduan', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('masyarakat/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $nik = auth()->user()->nik;
        $request->validate([
            'nama' => 'required|max:36',
            'email' => 'required|min:5|max:50|email|unique:masyarakat,email,'.$nik.',nik',
            'username' => 'required|min:4|max:25|unique:masyarakat,username,'.$nik.',nik',
            'no_telepon' => 'required|numeric|unique:masyarakat,telp,'.$nik.',nik'
        ]);
        
        Masyarakat::where('nik', $nik)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->no_telepon
        ]);
        return redirect('/masyarakat/profile')->with('pesan', 'Profile berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
