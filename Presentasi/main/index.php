<?php 
include 'session.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPK Kelompok IV</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon ">
                    <h1>SPK</h1>
                </div>
                <div class="sidebar-brand-text mx-3"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="?page=tampil_kriteria">
                        <i class="fas fa-list"></i>
                        <span>Kriteria</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?page=tampil_alternatif">
                            <i class="fas fa-book-open"></i>
                            <span>Alternatif</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?page=tampil_matriks">
                                <i class="fas fa-table"></i>
                                <span>Nilai Matriks Alternatif</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=tampil_hasil">
                                    <i class="fas fa-receipt"></i>
                                    <span>Hasil Topsis</span></a>
                                </li>


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

                                        <h5 style="margin-top:1%;">Aplikasi Penentuan Siswa Terbaik</h5>
                                        <!-- Topbar Navbar -->
                                        <ul class="navbar-nav ml-auto">

                                            <!-- Nav Item - User Information -->
                                            <li class="nav-item dropdown no-arrow">
                                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>

                                            </a>

                                        </li>

                                    </ul>

                                </nav>
                                <!-- End of Topbar -->

                                <!-- Begin Page Content -->
                                <div class="container-fluid">

                                    <?php 
                                    if (isset($_GET['page'])  > 0) {
                                        $hal = str_replace(".", "/", $_GET['page']) . ".php";
                                    }else {
                                        $hal = "dasboard.php";
                                    }
                                    if (file_exists($hal)) {
                                        include($hal);
                                    } 
                                    ?>
                                    <?php 
                                    if(isset($_GET['page'])){
                                        $page = $_GET['page'];         
                                        switch ($page) {

                                            case 'tampil_kriteria':
                                            include "kriteria/tampil.php";
                                            break;
                                            case 'tambah_kriteria':
                                            include "kriteria/tambah.php";
                                            break;                          
                                            case 'simpan_kriteria':
                                            include "kriteria/simpan.php";
                                            break;        
                                            case 'edit_kriteria':
                                            include "kriteria/edit.php";
                                            break;  
                                            case 'update_kriteria':
                                            include "kriteria/update.php";
                                            break;
                                            case 'hapus_kriteria':
                                            include "kriteria/hapus.php";
                                            break;

                                            case 'tampil_alternatif':
                                            include "alternatif/tampil.php";
                                            break;
                                            case 'tambah_alternatif':
                                            include "alternatif/tambah.php";
                                            break;                          
                                            case 'simpan_alternatif':
                                            include "alternatif/simpan.php";
                                            break;        
                                            case 'edit_alternatif':
                                            include "alternatif/edit.php";
                                            break;  
                                            case 'update_alternatif':
                                            include "alternatif/update.php";
                                            break;
                                            case 'hapus_alternatif':
                                            include "alternatif/hapus.php";
                                            break;

                                            case 'tampil_matriks':
                                            include "matriks/tampil.php";
                                            break;
                                            case 'tambah_matriks':
                                            include "matriks/tambah.php";
                                            break;                          
                                            case 'simpan_matriks':
                                            include "matriks/simpan.php";
                                            break;        
                                            case 'edit_matriks':
                                            include "matriks/edit.php";
                                            break;  
                                            case 'update_matriks':
                                            include "matriks/update.php";
                                            break;
                                            case 'hapus_matriks':
                                            include "matriks/hapus.php";
                                            break;


                                            case 'tampil_hasil':
                                            include "hasil/tampil.php";
                                            break;
                                            case 'tambah_hasil':
                                            include "hasil/tambah.php";
                                            break;                          
                                            case 'simpan_hasil':
                                            include "hasil/simpan.php";
                                            break;        
                                            case 'edit_hasil':
                                            include "hasil/edit.php";
                                            break;  
                                            case 'update_hasil':
                                            include "hasil/update.php";
                                            break;
                                            case 'hapus_hasil':
                                            include "hasil/hapus.php";
                                            break;

                                        }
                                    }
                                    ?>

                                </div>
                                <!-- /.container-fluid -->

                            </div>
                            <!-- End of Main Content -->

                            <!-- Footer -->
                            <footer class="sticky-footer bg-white">
                                <div class="container my-auto">
                                    <div class="copyright text-center my-auto">
                                        <span>Copyright &copy; Kelompok IV</span>
                                    </div>
                                </div>
                            </footer>
                            <!-- End of Footer -->

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
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script>

                <!-- Page level plugins -->
                <script src="vendor/datatables/jquery.dataTables.min.js"></script>
                <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/datatables-demo.js"></script>
                <script type="text/javascript"></script>

            </body>

            </html>