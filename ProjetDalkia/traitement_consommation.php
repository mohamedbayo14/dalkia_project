<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dalkia_database;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->prepare('SELECT janvier,fevrier,mars,avril,mai,juin,juillet,aout,septembre,octobre,novembre,decembre FROM conso_mensuelle WHERE entreprise=?');
$reponse->execute(array($_POST['nom_entreprise']));
while ($donnees = $reponse->fetch())
{
    $janvier= intval($donnees["janvier"]);   
    $fevrier=intval($donnees["fevrier"]);
    $mars= intval($donnees["mars"]);
    $avril= intval($donnees["avril"]);
    $mai= intval($donnees["mai"]);
    $juin= intval($donnees["juin"]); 
    $juillet= intval($donnees["juillet"]); 
    $aout= intval($donnees["aout"]);
    $septembre= intval($donnees["septembre"]);
    $octobre= intval($donnees["octobre"]);   
    $novembre= intval($donnees["novembre"]);   
    $decembre= intval($donnees["decembre"]);
};
require_once ('C:\wamp64\www\Ping\projet\dalkia_project\ProjetDalkia\jpgraph-4.2.5\src\jpgraph.php');
require_once ('C:\wamp64\www\Ping\projet\dalkia_project\ProjetDalkia\jpgraph-4.2.5\src\jpgraph_line.php');
$bdd=new PDO('mysql:host=localhost;dbname=dalkia_database','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  
$datay1 = array($janvier,$fevrier,$mars,$avril,$mai,$juin,$juillet,$aout,$septembre,$octobre,$novembre,$decembre );
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