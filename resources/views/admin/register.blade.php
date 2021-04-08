@extends('layouts/layout-petugas')

@section('title', 'Tambah Petugas')

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md">
                <h3 class="mt-2 mb-4"><i class="fas fa-user-plus d-none d-sm-inline"></i> Tambah Petugas Baru</h3>
                    <form method="POST" action="{{url('/admin/register')}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="nama" class="text-dark">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukan Nama Anda" value="{{old('nama')}}" required>
                                @error('nama')<div class="text text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="level" class="text-dark">Level</label>
                                <select name="level" class="form-control @error('level') is-invalid @enderror" id="level" required>
                                    <option value="" disabled selected>-- Pilih Level --</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                                @error('level')<div class="text text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-dark">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukan Email Anda" value="{{old('email')}}" required>
                            @error('email')<div class="text text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 mb-3 mb-md-0">
                                <label for="username" class="text-dark">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Masukan Username Anda" value="{{old('username')}}" required>
                                @error('username')<div class="text text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4">
                                <label for="telp" class="text-dark">No. Telepon</label>
                                <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" placeholder="Masukan No. Telepon Anda" value="{{old('telp')}}" required>
                                @error('telp')<div class="text text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="password" class="text-dark">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Masukan Password Anda" required>
                                @error('password')<div class="text text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="konfirmasi_password" class="text-dark">Konfirmasi Password</label>
                                <input type="password" class="form-control @error('konfirmasi_password') is-invalid @enderror" name="konfirmasi_password" id="konfirmasi_password" placeholder="Konfirmasi Password" required>
                                @error('konfirmasi_password')<div class="text text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <button type="submit" class="mt-2 btn btn-primary float-right">Tambahkan Petugas Baru</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
