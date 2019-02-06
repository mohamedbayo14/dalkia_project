<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dalkia_database;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->prepare('SELECT janvier,fevrier,mars,avril,mai,juin,juillet,aout,septembre,octobre,novembre,decembre,entreprise FROM conso_mensuelle WHERE entreprise=?');
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
require_once ('C:\wamp64\www\ping\dalkia_project\ProjetDalkia\jpgraph-4.2.5\src\jpgraph.php');
require_once ('C:\wamp64\www\ping\dalkia_project\ProjetDalkia\jpgraph-4.2.5\src\jpgraph_line.php');
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
$graph->SetMargin(100,100,100,100);
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
$name=date("d-m-Y")."-".date("H-i")."-".$_POST['nom_entreprise'];
$lien_telechargement = "C:/"."conso_mensuel ".$name;
$graph->Stroke($lien_telechargement.".png");
//$graph->Stroke("..\..\Downloads/name1.png");
//var_dump($name);
//var_dump($date);
?>
<html lang="en">
<head>
    <head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <?php
/* Définition de la variable titre pour la page d'accueil */
      $titre_page="Inscription";
      /* Inclusion de l'en-têtre */
      ?>
      <!-- Appel du header -->
      <?php session_start();?>
   
  </head>
</head>
    <body>
        <center>
 <form method="POST" action="download_graph_consommation.php">
            <h2 id="contactForm">Le graphique s'est bien téléchargé dans votre dossier Téléchargements</h2>
        <a href="<?php echo $name ?>"></a>
            <fieldset>
                <br>
               
               
            </fieldset> 
<!--
                <select name="titre">

                <option value="consommation" selected="selected">consommation mensuelle</option>
                <option value="Mlle">Mademoiselle</option>
                <option value="Mr">Monsieur</option>
                </select>
    
-->
            
            <a href="telechargement_graphique.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Revenir sur la page téléchargement</a>
   
<head>

  <title>Bootstrap Example</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  

  <style>
  body {
  padding-top: 50px;
  background-color:#FFFFF; 
  }
  </style>

</head>
            
            </form>
        </center>   
    </body>
</html> 
