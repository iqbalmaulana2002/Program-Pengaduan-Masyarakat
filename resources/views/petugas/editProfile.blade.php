@extends('layouts/layout-petugas')

@section('title', 'Edit Profile')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md">
            <h3 class="mb-4"><i class="fas fa-edit"></i> Edit Profile</h3>
            <form method="post" action="{{url('/'.auth()->user()->level.'/profile/edit')}}">
                @method('patch')
                @csrf

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{auth()->user()->username}}">
                    @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{auth()->user()->nama}}">
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{auth()->user()->email}}">
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="no_telepon">No. Telepon</label>
                    <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" id="no_telepon" value="{{auth()->user()->telp}}">
                    @error('no_telepon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group row float-right">
                    <div class="col-md mt-4 mb-5">
                        <a href="{{url('/'.auth()->user()->level.'/profile')}}" class="btn btn-outline-success btn-light">Kembali</a>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection