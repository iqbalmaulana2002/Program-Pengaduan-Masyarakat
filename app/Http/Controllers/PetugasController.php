<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Masyarakat;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date('Y-m-d');
        $belum = Pengaduan::where('tgl_pengaduan', $today)->where('status', '0')->count();
        $proses = Pengaduan::where('tgl_pengaduan', $today)->where('status', 'proses')->count();
        $selesai = Pengaduan::where('tgl_pengaduan', $today)->where('status', 'selesai')->count();
        return view('petugas/index', ['belum' => $belum, 'proses' => $proses, 'selesai' => $selesai]);
    }

    public function dataMasyarakat()
    {
        $masyarakat = Masyarakat::orderBy('created_at', 'desc')->get();
        return view('admin/dataMasyarakat', compact('masyarakat'));
    }

    public function dataPengaduan()
    {
        $pengaduan = Pengaduan::orderBy('id', 'desc')->get();
        return view('admin/dataPengaduan', compact('pengaduan'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailPengaduan(Pengaduan $pengaduan)
    {
        return view('admin/detailPengaduan', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function profile()
    {
        return view('/petugas/profile');
    }

    public function editProfile()
    {
        return view('/petugas/editProfile', ['admin' => 'admin']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $id = auth()->user()->id;
        $request->validate([
            'nama' => 'required|max:36',
            'email' => 'required|min:5|max:50|email|unique:petugas,email,'.$id.',id',
            'username' => 'required|min:4|max:25|unique:petugas,username,'.$id.',id',
            'no_telepon' => 'required|numeric|unique:petugas,telp,'.$id.',id'
        ]);
        
        Petugas::where('id', $id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->no_telepon
        ]);
        return redirect('/admin/profile')->with('pesan', 'Profile berhasil di edit');
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
