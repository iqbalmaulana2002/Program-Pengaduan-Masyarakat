<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Exports\PengaduanExport;
use PDF;
use File;

class AdminController extends Controller
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
        return view('admin/index', compact('belum', 'proses', 'selesai'));
    }

    public function dataMasyarakat()
    {
        $masyarakat = Masyarakat::orderBy('created_at', 'desc')->get();
        return view('admin/dataMasyarakat', compact('masyarakat'));
    }

    public function dataPetugas()
    {
        $petugas = Petugas::orderBy('id', 'desc')->get();
        return view('admin/dataPetugas', compact('petugas'));
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
    public function viewRegister()
    {
        return view('admin/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:36',
            'email' => 'required|max:50|email|unique:petugas',
            'username' => 'required|max:25|unique:petugas',
            'telp' => 'required|numeric|unique:petugas',
            'level' => 'required',
            'password' => 'required|max:255|same:konfirmasi_password',
            'konfirmasi_password' => 'required|max:255|same:password'
        ]);

        Petugas::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'telp' => $request->telp,
            'level' => $request->level
        ]);
        return redirect('/admin/data/petugas')->with('pesan', 'Petugas Baru Berhasil Di Tambahkan');
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
        return view('/petugas/editProfile');
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
    public function deletePetugas($id)
    {
        Petugas::destroy($id);
        return redirect('/admin/data/petugas')->with('pesan', 'Data Berhasil Di Hapus');
    }

    public function deleteMasyarakat($nik)
    {
        Masyarakat::where('nik', $nik)->delete();
        return redirect('/admin/data/masyarakat')->with('pesan', 'Data Berhasil Di Hapus');
    }

    public function deletePengaduan($id)
    {
        Pengaduan::where('id', $id)->delete();
        Tanggapan::where('id_pengaduan', $id)->delete();
        return redirect('/admin/data/pengaduan')->with('pesan', 'Data Berhasil Di Hapus');
    }

    public function viewCetakData()
    {
        $pengaduan = Pengaduan::all();
        return view('admin/generateLaporan', compact('pengaduan'));
    }

    public function exportExcel()
    {
        return Excel::download(new PengaduanExport, time().'pengaduan.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $pengaduan = null;
        if ($request->status == null && empty($request->tgl_awal) && empty($request->tgl_akhir)) {
            $pengaduan = Pengaduan::all();
        } elseif (empty($request->tgl_awal) || empty($request->tgl_akhir)) {
            $pengaduan = Pengaduan::where('status', $request->status)->get();
        } elseif ($request->status == null) {
            $pengaduan = Pengaduan::whereDate('tgl_pengaduan', '>=', $request->tgl_awal)->whereDate('tgl_pengaduan', '<=', $request->tgl_akhir)->get();
        } else {
            $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$request->tgl_awal, $request->tgl_akhir])
                        ->where('status', $request->status)
                        ->get();
        }

        if ($pengaduan->isEmpty()) {
            return redirect('/admin/cetak/data/pengaduan')->with('pesan', 'Data tidak ada, pastikan data yang anda masukan benar');
        }

        $pdf = PDF::loadView('admin/export/pdf', compact('pengaduan'));
        return $pdf->download(time().'-pengaduan.pdf');
    }

}
