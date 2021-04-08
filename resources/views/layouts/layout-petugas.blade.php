<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('/assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

@php $level = auth()->user()->level; @endphp

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="mr-3 bg-dark rounded-lg o-hidden" style="padding: 9px; width: 80px; height: 50px;">
                    <h3 class="mt-1" style="position: relative;">
                        <i class="fas fa-city text-gray-100" style="position: absolute; top:-4px; right:0px; left:0px;"></i>
                        <i class="fas fa-users text-gray-600" style="position: absolute; top:15px; right:0px; left:0px;"></i>
                    </h3>
                </div>
                <div class="sidebar-brand-text">Pengaduan Masyarakat</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item font-weight-bold">
                <a class="nav-link" href="{{url('/'.$level)}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Data Masyarakat -->
            <li class="nav-item font-weight-bold">
                <a class="nav-link" href="{{url('/'.$level.'/data/masyarakat')}}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Masyarakat</span>
                </a>
            </li>

            @if($level == 'admin')
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Petugas Collapse Menu -->
                <li class="nav-item font-weight-bold">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePetugas" aria-expanded="true" aria-controls="collapsePetugas">
                        <i class="fas fa-users-cog"></i>
                        <span>Petugas</span>
                    </a>
                    <div id="collapsePetugas" class="collapse" aria-labelledby="headingPetugas" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{url('/admin/data/petugas')}}">Data Petugas</a>
                            <a class="collapse-item" href="{{url('/admin/register')}}">Registrasi Petugas</a>
                        </div>
                    </div>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Data Masyarakat -->
            <li class="nav-item font-weight-bold">
                <a class="nav-link" href="{{url('/'.$level.'/data/pengaduan')}}">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Data Pengaduan</span>
                </a>
            </li>

            @if($level == 'admin')
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Petugas Collapse Menu -->
                <li class="nav-item font-weight-bold">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTanggapan" aria-expanded="true" aria-controls="collapseTanggapan">
                        <i class="fas fa-clipboard-check"></i>
                        <span>Data Tanggapan</span>
                    </a>
                    <div id="collapseTanggapan" class="collapse" aria-labelledby="headingPetugas" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{url('/admin/data/tanggapan')}}">Semua Data Tanggapan</a>
                            <a class="collapse-item" href="{{url('/'.$level.'/data/tanggapan/saya')}}">Data Tanggapan Anda</a>
                        </div>
                    </div>
                </li>
            @else
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Nav Item - Data Masyarakat -->
                <li class="nav-item font-weight-bold">
                    <a class="nav-link" href="{{url('/'.$level.'/data/tanggapan/saya')}}">
                        <i class="fas fa-clipboard-check"></i>
                        <span>Data Tanggapan Anda</span>
                    </a>
                </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->nama}}</span>
                                <button class="btn btn-lg btn-dark py-1 px-2"><i class="fas fa-user text-light"></i></button>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{url('/'.$level.'/profile')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('content')

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin meninggalkan website ini?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik tombol Logout jika ingin meninggalkan website ini, Klik Batal jika tidak</div>
                <div class="modal-footer">
                    <form action="{{url('/logout')}}" method="post">
                        @csrf
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('/assets/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('/assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('/assets/js/demo/datatables-demo.js')}}"></script>

</body>

</html>