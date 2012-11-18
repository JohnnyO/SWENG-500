<?php 


// content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');


require_once('DbInterface.php');

$mydb = new DbInterface();
$mydb->connectDb();

$playerOne = $_GET['player1'];
$playerTwo = $_GET['player2'];

$datay1 = $mydb->getPredictionArray($playerOne,7);
$datay2 = $mydb->getPredictionArray($playerTwo,7);

  

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
$p2 = new LinePlot($datay2);
$graph->Add($p1);
$graph->Add($p2);
$p1->SetColor("#CCFF00");
$p1->SetLegend('Yahoo.com');



$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>


