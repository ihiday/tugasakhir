<?php
if (isset($_GET['halaman'])) {
    $jenishalaman = $_GET['halaman'];
} else {
    $jenishalaman = null;
};

session_start();
include "../function.php";
// include "../db_conn.php";
include "../db_conn.php";
if ((isset($_SESSION['username']) && isset($_SESSION['id'])) && $_SESSION['jenis'] == 0) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin 2 - Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="https://example.com/fontawesome/v6.2.0/js/all.js" data-auto-replace-svg></script>
        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">

        <!-- data tables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    </head>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-solid fa-house"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> <sup></sup></div>
            </a>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="user.php">
                    <i class="fa-duotone fa-users"></i>
                    <span><?= $_SESSION['username']; ?></span>
                </a>
            </li>
            <li>
                <div class="card header justify-content-between">
                    <a href="../logout.php" class="btn btn-dark">Logout</a>
                </div>

            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <?php
            switch ($jenishalaman) {
                case "forecast":
                    include("user/halaman.php");
                    break;
                case "akurasi":
                    include("user/akurasi.php");
                    break;
                default:
                    if (isset($_GET['id'])) {
                        include("update.php");
                    } else {
                        include("user/halaman.php");
                    }
            }
            ?>
            <!-- end main -->
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Bootstrap core JavaScript-->
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="../js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="../vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="../js/demo/chart-area-demo.js"></script>
            <script src="../js/demo/chart-pie-demo.js"></script>
            <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
            <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.datatab').DataTable();
                });
            </script>

            </body>

    </html>

<?php } else {
    header("location:index.php");
} ?>