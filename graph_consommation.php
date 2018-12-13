<?php // content="text/plain; charset=utf-8"
require_once ('C:\Users\marti\Desktop\cours 3A-IF\PING\jpgraph-4.2.5\src\jpgraph.php');
require_once ('C:\Users\marti\Desktop\cours 3A-IF\PING\jpgraph-4.2.5\src\jpgraph_line.php');

$datay1 = array(11824.2559,7605.58181,8427.83073,5932.50497,5795.46348,1836.755,1836.755,1836.755,1836.755,2149.74674,5202.32864,7581.78893);
$datay2 = array(22987.255,13277.545,15170.035,5932.50497,9111.3725,0,0,0,0,720.3825,7746.212,13222.7833);
$datay3 = array(22987.255,20649.305,23592.515,14660.5875,14170.0525,0,0,0,0,1120.3425,12046.948,20564.1393);

// Setup the graph
$graph = new Graph(1100,500);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Consommation suivant la solution Dalkia, Gaz ou Fioul');
$graph->SetBox(false);

$graph->SetMargin(40,20,36,63);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Decembre'));
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Dalkia');

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('Gaz');

// Create the third line
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#FF1493");
$p3->SetLegend('Fioul');

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>