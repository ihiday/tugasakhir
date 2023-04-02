<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">info akun</h6>
                    <a href="../logout.php" class="btn btn-dark">Logout</a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p>Selamat datang <?= $_SESSION['nama'] ?>, ini merupakan halaman utama dari dashboard admin. dalam halaman ini anda dapat mengorganisir akun, dan bahan baku.<br></p>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">jumlah akun</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <?php
                            $sql = "SELECT distinct jenis FROM users";
                            $result = mysqli_query($conn, $sql);
                            foreach ($result as $data => $value) {
                                $y = $value['jenis'];
                                $hasil[] = $data;
                                $sql2 = "SELECT COUNT(id) as total,jenis as tipe FROM users where jenis = '$y';";
                                $result2 = mysqli_query($conn, $sql2);
                                foreach ($result2 as $nilai) {
                                    if ($nilai['tipe'] == '1') {
                                        $nilai['tipe'] = 'admin';
                                    } else {
                                        $nilai['tipe'] = 'user';
                                    }
                                    $jumlah = $nilai['total'];
                                    $jenis = $nilai['tipe'];
                                }
                            ?>
                                <tr>
                                    <?php
                                    $total[] = $jumlah;
                                    ?>
                                    <th scope="col"><?= $jumlah; ?></th>
                                    <th scope="col"><?= $jenis; ?></th>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td>total akun = <?= array_sum($total); ?> </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
    </div>

</div>
<!-- /.container-fluid -->