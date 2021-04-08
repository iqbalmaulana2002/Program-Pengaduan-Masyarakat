<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('/assets/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('/assets/css/sb-admin-2.min.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('/assets/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-success topbar mb-4 static-top shadow">
                    <div class="mr-3 bg-dark rounded-lg text-center o-hidden" style="padding: 9px; width: 80px; height: 50px;">
                        <a href="<?php echo e(url('/masyarakat')); ?>">
                            <h3 class="mt-1" style="position: relative;">
                                <i class="fas fa-city text-gray-100" style="position: absolute; top:-4px; right:0px; left:0px;"></i>
                                <i class="fas fa-users text-gray-600" style="position: absolute; top:15px; right:0px; left:0px;"></i>
                            </h3>
                        </a>
                    </div>
                    <a href="<?php echo e(url('/masyarakat')); ?>" class="text-decoration-none">
                        <h5 class="text-light d-none d-md-block"><strong>Website Pengaduan Masyarakat</strong></h5>
                    </a>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-sm-inline text-white small"><?php echo e(auth()->user()->nama); ?></span>
                                <button class="btn btn-lg btn-dark py-1 px-2"><i class="fas fa-user text-light"></i></button>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo e(url('/masyarakat/profile')); ?>">
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

                <?php echo $__env->yieldContent('content'); ?>

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
                <div class="modal-body">Terima kasih telah menggunakan layanan kami.</div>
                <div class="modal-footer">
                    <form action="<?php echo e(url('/logout')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('/assets/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('/assets/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('/assets/js/sb-admin-2.min.js')); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo e(asset('/assets/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo e(asset('/assets/js/demo/datatables-demo.js')); ?>"></script>

</body>

</html><?php /**PATH D:\Folder_iqbal\Ujikom\Pengaduan-Masyarakat\resources\views////layouts/layout-masyarakat.blade.php ENDPATH**/ ?>