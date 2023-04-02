<?php
// include "../db_conn.php";
include "db_conn.php";
$conn = $conn;




function dataPenjualan($conn, $namamaterial, $tahun, $bulan)
{
    // $sql = "SELECT *,namarm as nama,monthname(tanggal) as bulan, year(tanggal) as tahun FROM hasil where namarm = '$namamaterial' and tanggal <'$tahun-$bulan-01' order by tanggal desc limit 27;";
    $sql = "SELECT *,DATE_FORMAT(tanggal, '%m-%Y') as ambil,namarm as nama,monthname (tanggal) as bulan, year(tanggal) as tahun FROM hasil where namarm = '$namamaterial' and tanggal <'$tahun-$bulan-01' order by tanggal desc limit 27;";
    $result = mysqli_query($conn, $sql);
    foreach ($result as $data) {
        $hasil[] = $data;
    }
    return $hasil;
    // echo $sql;
}

function dataIni($conn, $namamaterial, $tahun, $bulan)
{
    // $sql = "SELECT *,namarm as nama,monthname(tanggal) as bulan, year(tanggal) as tahun FROM hasil where namarm = '$namamaterial' and tanggal <'$tahun-$bulan-01' order by tanggal desc limit 27;";
    $sql = "SELECT *,DATE_FORMAT(tanggal, '%m-%Y') as ambil,namarm as nama,monthname (tanggal) as bulan, year(tanggal) as tahun FROM hasil where namarm = '$namamaterial' and tanggal = '$tahun-$bulan-01'";
    $result = mysqli_query($conn, $sql);
    foreach ($result as $data) {
        $hasil[] = $data;
    }
    return $hasil;
    // echo $sql;
}

function tahunBarang($conn)
{
    $sql = "SELECT DISTINCT year(tanggal) as tahun FROM penjualan order by tahun asc;";
    $result = mysqli_query($conn, $sql);
    foreach ($result as $data) {
        $hasil[] = $data;
    }
    return $hasil;
}

function namaMaterial($conn)
{
    $sql = "SELECT DISTINCT namarm as nama FROM hasil;";
    $result = mysqli_query($conn, $sql);
    foreach ($result as $data) {
        $hasilNamaMaterial[] = $data;
    }
    return $hasilNamaMaterial;
}

function cekLogin($conn, $username, $password)
{
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    foreach ($result as $data) {
        $hasilCekLogin[] = $data;
    }
    return $hasilCekLogin;
}

function logout()
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}

function dataBarang($conn, $tahun, $material)
{
    $sql = "select namaitem, sum(jumlah) as total,monthname(tanggal)as bulan, year(tanggal) as tahun FROM penjualan WHERE namaitem = '" . $material . "' AND year(tanggal) = '" . $tahun . "' GROUP BY month(tanggal);";
    $result = mysqli_query($conn, $sql);
    foreach ($result as $data) {
        $hasilDataBarang[] = $data;
    }
    return $hasilDataBarang;
}


function ambilTotal($array)
{
    $j = 0;
    for ($i = count($array); $i > 0; $i--) {
        $hasilAmbilTotal[$j] = $array[$i - 1]['total'];
        $j++;
        // foreach ($array as $k) {
        //     $hasilAmbilTotal[] = $k['total'];
        // }
    }
    return $hasilAmbilTotal;
}

function ambiBulan($array)
{
    foreach ($array as $k) {
        $hasilAmbilBulan[] = $k['bulan'];
    }
    return $hasilAmbilBulan;


    // for ($i = 0; $i < count($array); $i++) {
    //     $hasilAmbilBulan[] = $array[$i]['bulan'];
    // }
    // return $hasilAmbilBulan;
}
function ambiTahun($array)
{
    // foreach ($array as $k) {
    //     $hasilAmbilBulan[] = $k['bulan'];
    // }
    // return $hasilAmbilBulan;


    for ($i = 0; $i < count($array); $i++) {
        $hasilAmbilTahun[] = $array[$i]['tahun'];
    }
    return $hasilAmbilTahun;
}

function ambilData($conn)
{
    // $namamaterial = "material1";
    $year = '2022';
    $rawMaterial = mysqli_query($conn, "SELECT namaitem from konversi");
    foreach ($rawMaterial as $key => $data) {
        echo $data['namaitem'];
        $namabarang[] = $data['namaitem'];
    }
    for ($i = 0; $i < count($namabarang); $i++) {
        $haah = $namabarang[$i];
        $res = mysqli_query($conn, "select namaitem, sum(jumlah) as total,month(tanggal)as bulan, year(tanggal) as tahun FROM penjualan WHERE namaitem = '$haah' AND year(tanggal) = '$year' GROUP BY month(tanggal);");
        foreach ($res as $databarang) {
            $hasilAmbilData[] = $databarang;
        }
    }
    return $hasilAmbilData;
}

// function prosesData($conn, $array)
// {

//     for ($i = 0; $i < count($array); $i++) {
//         $nama = $array[$i]['namaitem'];
//         $total = $array[$i]['total'];
//         $bulan = $array[$i]['bulan'];
//         $tahun = $array[$i]['tahun'];
//         $res = mysqli_query(
//             $conn,
//             "insert into proses (nama,total,tanggal) values ('$nama','$total','$tahun-$bulan-01')"
//         );
//         if ($res) {
//             echo "Data Inserted successfully.<br>";
//         } else {
//             echo "Data Insertion Failed; " . mysqli_error($conn);
//         }
//     }
// }

//bulan
// SELECT DISTINCT month(tanggal) as bulan FROM penjualan ORDER by bulan ASC;

function namaBulan($no)
{
    $bulan = "";
    switch ($no) {
        case "01":
            $bulan = "januari";
            break;
        case "02":
            $bulan = "februari";
            break;
        case "03":
            $bulan = "maret";
            break;
        case "04":
            $bulan = "april";
            break;
        case "05":
            $bulan = "mei";
            break;
        case "06":
            $bulan = "juni";
            break;
        case "07":
            $bulan = "juli";
            break;
        case "08":
            $bulan = "agustus";
            break;
        case "09":
            $bulan = "september";
            break;
        case "10":
            $bulan = "oktober";
            break;
        case "11":
            $bulan = "november";
            break;
        case "12":
            $bulan = "desember";
            break;
    }
    return $bulan;
}
