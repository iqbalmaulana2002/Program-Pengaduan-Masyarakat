<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Masyarakat;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:masyarakat')->except('logout');
        $this->middleware('guest:petugas')->except('logout');
    }

    public function index()
    {
        return view('landingPage');
    }

    public function viewRegister()
    {
        return view('auth/register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric|unique:masyarakat',
            'nama' => 'required|max:36',
            'email' => 'required|max:50|email|unique:masyarakat',
            'username' => 'required|max:25|unique:masyarakat',
            'no_telepon' => 'required|numeric|unique:masyarakat,telp',
            'password' => 'required|max:255|same:konfirmasi_password',
            'konfirmasi_password' => 'required|max:255|same:password'
        ]);

        Masyarakat::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'telp' => $request->no_telepon
        ]);
        return redirect('/login')->with('pesan', 'Akun Anda Berhasil Di Registrasi');
    }

    public function viewLogin()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('masyarakat')->attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/masyarakat');

        } elseif (Auth::guard('petugas')->attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            if (auth()->guard('petugas')->user()->level == 'admin') {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/petugas');
            }
            
        } else {
            return redirect('/login')->with('pesanDanger', 'Username atau Password anda salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('pesan', 'Anda berhasil Logout');
    }
}
