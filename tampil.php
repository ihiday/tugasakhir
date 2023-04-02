<?php
include("function.php");
$data = dataPenjualan($conn, 'RM500', '2018', '02');

var_dump($data);
// prosesData($conn, $coba);
