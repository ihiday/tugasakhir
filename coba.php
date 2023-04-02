<?php
include("function.php");

$dis = dataIni($conn, "RM500", "2020", "01");
var_dump(
    $dis
);

echo $dis[0]["namarm"];
