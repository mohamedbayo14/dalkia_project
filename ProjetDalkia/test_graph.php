<?php

require_once ('C:\Users\davy7\Desktop\ProjetDalkia\jpgraph-4.2.5\src\jpgraph.php');
require_once ('C:\Users\davy7\Desktop\ProjetDalkia\jpgraph-4.2.5\src\jpgraph_line.php');
  
$datay1 = array(0,1,2,3,4,5,6,7,8,9,10,11 );
// Setup the graph
$graph = new Graph(1000,400);
$graph->SetScale("textlin");
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set("Consommation de l'entreprise en MW");
$graph->SetBox(false);
$graph->SetMargin(250,20,36,63);
$graph->img->SetAntiAliasing();
$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'));
$graph->xgrid->SetColor('#E3E3E3');
// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$graph->legend->SetFrameWeight(1);
// Output line
$graph->Stroke();
?>