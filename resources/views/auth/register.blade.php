@extends('../layouts.layout-auth')

@section('title', 'Registrasi')

@section('content')
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 mx-auto" style="width: 95%">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-md">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                            </div>
                            <form class="user" method="POST" action="{{url('/register')}}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="nik" class="text-dark">NIK</label>
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="Masukan NIK Anda" value="{{old('nik')}}" required>
                                        @error('nik')<div class="text text-danger">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nama" class="text-dark">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukan Nama Anda" value="{{old('nama')}}" required>
                                        @error('nama')<div class="text text-danger">{{ $message }}</div>@enderror
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
                                        <label for="no_telepon" class="text-dark">No. Telepon</label>
                                        <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" id="no_telepon" placeholder="Masukan No. Telepon Anda" value="{{old('no_telepon')}}" required>
                                        @error('no_telepon')<div class="text text-danger">{{ $message }}</div>@enderror
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
                                <button type="submit" class="btn btn-primary btn-user btn-block">Registrasikan Akun</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{url('/login')}}">Sudah punya akun? Login disini!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
