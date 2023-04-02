<?php
include("function.php");

require_once('jpgraph-4.4.1/src/jpgraph.php');
require_once('jpgraph-4.4.1/src/jpgraph_line.php');
$namamaterial = "RM500";
$tahun = "2022";
$bulan = "02";

$array = dataPenjualan($conn, $namamaterial, $tahun, $bulan);
// var_dump($array);

// foreach ($array as $data) {
//     echo "[" . $data['ambil'] . "," . $data['id'] . "," . $data['total'] . "]";
// }


foreach ($array as $data) {
    $data1[] = ($data['total']);
}
foreach ($array as $data) {
    $data2[] =   $data['total'];
}
foreach ($array as $data) {
    $data3[] =  $data['id'];
}
$pre = trader_sma($data2, 2);
array_map("intval", $pre);
unset($data2[0]);
unset($data1[0]);

// var_dump($data1);
// print_r($forecast);
$datay1 = array_reverse($data1);

// var_dump($data1);
$datay2 = $pre;
// $datay3 = $data;
$datay3 = array(5, 17, 32, 24);

// Setup the graph
$graph = new Graph(1500, 400);
$graph->SetScale("textlin");

$theme_class = new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Filled Y-grid');
$graph->SetBox(true);

$graph->SetMargin(40, 20, 36, 63);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false, false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($data1);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Line 1');

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('Line 2');

// Create the third line
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#FF1493");
$p3->SetLegend('Line 3');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();





