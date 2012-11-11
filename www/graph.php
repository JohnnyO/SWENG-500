<?php 


// content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

$datay1 = array(0.147368
,0.0315789
,0.0736842,
0.463158,
0.105263,
0.0631579,
0.2);
$datay2 = array(0.136842,
0.126316
,-0.273684,0.442105,
0.0315789
,0.336842,
0.315789);
$datay3 = array(0.305263,
0.0105263,
-0.0947368
,0.473684
,0.242105,0.0631579
,0.315789);
$datay4 = array(0.126316,
-0.0947368,
-0.0421053
,0.505263
,0.2,
0.0315789,
0.157895);
$datay5 = array(0.136842,
-0.0210526,
-0.273684,
0.473684
,0.126316,0.0736842,
0.389474);

// Setup the graph
$graph = new Graph(500,300);
$graph->SetScale('intlin',0,0,0,6);



$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Accuracy');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('week1','week2','week3','week4','week5','week6','week7'));
$graph->xgrid->SetColor('#cccccc');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#CCFF00");
$p1->SetLegend('Yahoo.com');

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#FF9933");
$p2->SetLegend('FFToolbox');

// Create the third line
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#33CC33");
$p3->SetLegend('Jamey Eisenberg');

$p4 = new LinePlot($datay4);
$graph->Add($p4);
$p4->SetColor("#99CCFF");
$p4->SetLegend('Nathan Zegura-CBS.com');

$p5 = new LinePlot($datay5);
$graph->Add($p5);
$p5->SetColor("#FF99FF");
$p5->SetLegend('Dave Richard-CBS.com');



$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>


