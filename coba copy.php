<?php
if (!isset($_GET['halo'])) {
    $_GET['formGender'] = null;
    $_GET['formGy'] = null;
} else {
    $gender = $_GET['formGender'];
    $anfim = $_GET['formGy'];
}

include "db_conn.php";
include "function.php";
$sql = "select namaitem, sum(jumlah) as y,monthname(tanggal)as label, year(tanggal) as tahun FROM penjualan WHERE namaitem = '" . "3550-K030-00S0-0M01" . "' AND year(tanggal) = '" . "2018" . "' GROUP BY month(tanggal);";
$result = mysqli_query($conn, $sql);
foreach ($result as $nilai) {
    $hasil2[] = $nilai;
}

$dataPoints = $hasil2;
// $dataPoints = array(
//     array("y" => 3373.64, "label" => "Germany"),
//     array("y" => 2435.94, "label" => "France"),
//     array("y" => 1842.55, "label" => "China"),
//     array("y" => 1828.55, "label" => "Russia"),
//     array("y" => 1039.99, "label" => "Switzerland"),
//     array("y" => 765.215, "label" => "Japan"),
//     array("y" => 612.453, "label" => "Netherlands")
// );

?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Gold Reserves"
                },
                axisY: {
                    title: "Gold Reserves (in tonnes)"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## tonnes",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>


<?php
// $data = dataBarang($conn);
// foreach ($data as $k) {
//     echo $k['total'] . "<br>";
// }
