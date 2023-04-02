<?php
error_reporting(0);
if (isset($_GET['tahun']) and isset($_GET['material'], $_GET['material'])) {
    $array = dataPenjualan($conn, $_GET['material'], $_GET['tahun'],  $_GET['bulan']);
    $dis = dataIni($conn, $_GET['material'], $_GET['tahun'],  $_GET['bulan']);
    $real = array_reverse(ambilTotal($array));
    $ambilbulan = array_reverse(ambiBulan($array));
    $ambiltahun = array_reverse(ambiTahun($array));
} else {
    $real  = [9, 4, 5, 6, 3, 2, 1, 2, 4, 5, 6, 8];
    $ambilbulan = ["bulan", "bulan", "bulan", "bulan", "bulan", "bulan", "bulan", "bulan", "bulan", "bulan", "bulan", "bulan",];
}
$nomorbulan = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
// switch ($namabulan) {
//     case '01':
//         $namabulan = 'januari';
//         break;
//     case '02':
//         $namabulan = 'februari';
//         break;
//     case '03':
//         $namabulan = 'maret';
//         break;
//     case '04':
//         $namabulan = 'april';
//         break;
//     case '05':
//         $namabulan = 'mei';
//         break;
//     case '06':
//         $namabulan = 'juni';
//         break;
//     case '07':
//         $namabulan = 'juli';
//         break;
//     case '08':
//         $namabulan = 'agustus';
//         break;
//     case '09':
//         $namabulan = 'september';
//         break;
//     case '10':
//         $namabulan = 'oktober';
//         break;
//     case '11':
//         $namabulan = 'november';
//         break;
//     case '12':
//         $namabulan = 'desember';
//         break;
//     default:
//         $namabulan = 'januari';
//         break;
// }


?>

<div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
    </nav>
    <!-- End of Topbar -->

    <!-- main content -->
    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <table class="table table-stripped table-hover datatab">
                <tr>
                    <th>Bulan</th>
                    <th>Aktual</th>
                    <th>forecast</th>
                    <th>aktual - forecast</th>
                    <th>|aktual - forecast|</th>
                    <th>|aktual - forecast|/aktual</th>
                </tr>
                <?php
                $periode = 9;

                // $real  = [9, 4, 5, 6, 3, 2, 1, 2, 4, 5, 6, 8];
                $forecast = trader_sma($real, $periode);
                for ($i = 0; $i < $jumlah = count($real); $i++) {
                    echo "<tr>";
                    echo "<td>" .  $ambilbulan[$i] . " " . $ambiltahun[$i];
                    "</td>";
                    echo "<td>" . $real[$i] . "</td>";
                    $j = $i;
                    if ($i >= $periode) {
                        echo "<td>" . $peramalan = round($forecast[$j - 1]) . "</td>";
                        $ft[] = $forecast[$j - 1];
                        // echo "<td>" . $peramalan = round($forecast[$i]) . "</td>";
                    } else {
                        echo "<td> " . 0 . "</td>";
                    }
                    echo "<td> " . $eror = $real[$i] - round($forecast[$j - 1]) . "</td>";
                    echo "<td> " . abs($eror) . "</td>";
                    echo "<td> " . round($presentase = abs(intval($eror) / $real[$i]), 2) . "</td>";
                    if ($presentase != 1) {
                        $hasilpresentase[] = $presentase;
                    }
                    echo "<tr>";
                }
                for ($i = $jumlah - 1; $i >= ($jumlah - $periode); $i--) {
                    $hasilprediksi[] = $real[$i];
                }
                // for ($i = 0; $i < $jumlah = count($real); $i++) {

                // }
                echo "<tr>";
                echo "<td>" .  $dis[0]["bulan"] . " " . $dis[0]["tahun"];
                "</td>";
                echo "<td>" .  $dis[0]["total"];
                "</td>";
                echo "<td>" .  $_GET["hasil"];
                "</td>";
                echo "<td>" .  ($dis[0]["total"] - $_GET["hasil"]);
                "</td>";
                echo "<td>" .  abs($dis[0]["total"] - $_GET["hasil"]);
                "</td>";
                echo "<td>" .  $mape = round((abs($dis[0]["total"] - $_GET["hasil"])) / $dis[0]["total"], 2);
                "</td>";

                echo "</tr>";
                ?>

            </table>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">MAPE </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    // var_dump($hasilpresentase);
                    echo round(((array_sum($hasilpresentase)) / count($hasilpresentase)) * 100, 2);
                    ?>
                </div>
            </div>
            <!-- <button class="btn-info">upload</button> -->
            <a href="http://localhost/tugasakhir/pages/user.php?halaman=forecasting">
                <button class="btn-info">kembali</button>
            </a>

        </div>

        <!-- Content Row -->

        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<?php
// var_dump($ft);
?>