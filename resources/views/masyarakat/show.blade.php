@extends('../layouts/layout-masyarakat')

@section('title', 'Profile Saya')

@section('content')
<div class="container">

	@if (session('pesan'))
		<div class="alert alert-success">
			{{ session('pesan') }}
		</div>
	@endif

    <!-- DataTales Example -->
    <div class="card shadow">

        {{-- Card Header --}}
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Profile Saya</h5>
        </div>

        {{-- Card Body --}}
        <div class="card-body">

                <div class="row">                
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped" cellspacing="0">
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><strong>{{ auth()->user()->nik }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td><strong>{{ auth()->user()->username }}</strong></td>
                                </tr>
                                <tr>
                                    <td>nama</td>
                                    <td>:</td>
                                    <td><strong>{{ auth()->user()->nama }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><strong>{{ auth()->user()->email }}</strong></td>
                                </tr>
                                <tr>
                                    <td>No. Telepon</td>
                                    <td>:</td>
                                    <td><strong>{{ auth()->user()->telp }}</strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

        </div>
	</div>
	<div class="text-center mt-4 mb-5 pb-5">
		<a href="{{ url('/masyarakat') }}" class="btn btn-primary">Kembali</a>
		<a href="{{ url('/masyarakat/edit') }}" class="btn btn-warning">Edit Profile</a>
	</div>

</div>
@endsection