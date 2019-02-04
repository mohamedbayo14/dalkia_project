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

} 


require_once ('C:\wamp64\www\Ping\projet\dalkia_project\ProjetDalkia\jpgraph-4.2.5\src\jpgraph.php');
require_once ('C:\wamp64\www\Ping\projet\dalkia_project\ProjetDalkia\jpgraph-4.2.5\src\jpgraph_line.php');
$bdd=new PDO('mysql:host=localhost;dbname=dalkia_database','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  
//Calcul du cout de la solution dalkia

$Cout_janvier=(($janvier*$_POST['R1'])+($_POST['R2']*141)/12)*1.055;
$Cout_fevrier=(($fevrier*$_POST['R1'])+($_POST['R2']*141)/12)*1.055;
$Cout_mars=(($mars*$_POST['R1'])+($_POST['R2']*141)/12)*1.055;
$Cout_avril=(($avril*$_POST['R1'])+($_POST['R2']*141)/12)*1.055;
$Cout_mai=(($mai*$_POST['R1'])+($_POST['R2']*141)/12)*1.055;
$Cout_juin=(($juin*$_POST['R1'])+($_POST['R2']*141)/12)*1.055;
$Cout_juillet=(($juillet*$_POST['R1'])+($_POST['R2']*141)/12)*1.055;
$Cout_aout=(($aout*$_POST['R1'])+($_POST['R2']*141)/12)*1.055;
$Cout_septembre=(($septembre*$_POST['R1'])+($_POST['R2']*141)/12)*1.055;
$Cout_octobre=(($octobre*$_POST['R1'])+($_POST['R2']*141)/12)*1.055;
$Cout_novembre=(($novembre*$_POST['R1'])+($_POST['R2']*141)/12)*1.055;
$Cout_decembre=(($decembre*$_POST['R1'])+($_POST['R2']*141)/12)*1.055;

$Cout_Dalkia=-($Cout_janvier+$Cout_fevrier+$Cout_mars+$Cout_avril+$Cout_mai+$Cout_juin+$Cout_juillet+$Cout_aout+$Cout_septembre+$Cout_octobre+$Cout_novembre+$Cout_decembre);

//Calcul cout du fioul

$Quantité_fioul_janvier=$janvier/$_POST['R_FIOUL']/$_POST['PCI_FIOUL'];
$Quantité_fioul_fevrier=$fevrier/$_POST['R_FIOUL']/$_POST['PCI_FIOUL'];
$Quantité_fioul_mars=$mars/$_POST['R_FIOUL']/$_POST['PCI_FIOUL'];
$Quantité_fioul_avril=$avril/$_POST['R_FIOUL']/$_POST['PCI_FIOUL'];
$Quantité_fioul_mai=$mai/$_POST['R_FIOUL']/$_POST['PCI_FIOUL'];
$Quantité_fioul_juin=$juin/$_POST['R_FIOUL']/$_POST['PCI_FIOUL'];
$Quantité_fioul_juillet=$juillet/$_POST['R_FIOUL']/$_POST['PCI_FIOUL'];
$Quantité_fioul_aout=$aout/$_POST['R_FIOUL']/$_POST['PCI_FIOUL'];
$Quantité_fioul_septembre=$septembre/$_POST['R_FIOUL']/$_POST['PCI_FIOUL'];
$Quantité_fioul_octobre=$octobre/$_POST['R_FIOUL']/$_POST['PCI_FIOUL'];
$Quantité_fioul_novembre=$novembre/$_POST['R_FIOUL']/$_POST['PCI_FIOUL'];
$Quantité_fioul_decembre=$decembre/$_POST['R_FIOUL']/$_POST['PCI_FIOUL'];

$Cout_fioul_janvier=($Quantité_fioul_janvier*$_POST['Prix_fioul'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_fioul_fevrier=($Quantité_fioul_fevrier*$_POST['Prix_fioul'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_fioul_mars=($Quantité_fioul_mars*$_POST['Prix_fioul'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_fioul_avril=($Quantité_fioul_avril*$_POST['Prix_fioul'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_fioul_mai=($Quantité_fioul_mai*$_POST['Prix_fioul'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_fioul_juin=($Quantité_fioul_juin*$_POST['Prix_fioul'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_fioul_juillet=($Quantité_fioul_juillet*$_POST['Prix_fioul'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_fioul_aout=($Quantité_fioul_aout*$_POST['Prix_fioul'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_fioul_septembre=($Quantité_fioul_septembre*$_POST['Prix_fioul'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_fioul_octobre=($Quantité_fioul_octobre*$_POST['Prix_fioul'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_fioul_novembre=($Quantité_fioul_novembre*$_POST['Prix_fioul'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_fioul_decembre=($Quantité_fioul_decembre*$_POST['Prix_fioul'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];

//Calcul cout du gaz

$Quantité_gaz_janvier=$janvier/$_POST['R_GAZ']/$_POST['PCI_GAZ'];
$Quantité_gaz_fevrier=$fevrier/$_POST['R_GAZ']/$_POST['PCI_GAZ'];
$Quantité_gaz_mars=$mars/$_POST['R_GAZ']/$_POST['PCI_GAZ'];
$Quantité_gaz_avril=$avril/$_POST['R_GAZ']/$_POST['PCI_GAZ'];
$Quantité_gaz_mai=$mai/$_POST['R_GAZ']/$_POST['PCI_GAZ'];
$Quantité_gaz_juin=$juin/$_POST['R_GAZ']/$_POST['PCI_GAZ'];
$Quantité_gaz_juillet=$juillet/$_POST['R_GAZ']/$_POST['PCI_GAZ'];
$Quantité_gaz_aout=$aout/$_POST['R_GAZ']/$_POST['PCI_GAZ'];
$Quantité_gaz_septembre=$septembre/$_POST['R_GAZ']/$_POST['PCI_GAZ'];
$Quantité_gaz_octobre=$octobre/$_POST['R_GAZ']/$_POST['PCI_GAZ'];
$Quantité_gaz_novembre=$novembre/$_POST['R_GAZ']/$_POST['PCI_GAZ'];
$Quantité_gaz_decembre=$decembre/$_POST['R_GAZ']/$_POST['PCI_GAZ'];

$Cout_gaz_janvier=($Quantité_gaz_janvier*$_POST['Prix_gaz'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_gaz_fevrier=($Quantité_gaz_fevrier*$_POST['Prix_gaz'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_gaz_mars=($Quantité_gaz_mars*$_POST['Prix_gaz'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_gaz_avril=($Quantité_gaz_avril*$_POST['Prix_gaz'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_gaz_mai=($Quantité_gaz_mai*$_POST['Prix_gaz'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_gaz_juin=($Quantité_gaz_juin*$_POST['Prix_gaz'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_gaz_juillet=($Quantité_gaz_juillet*$_POST['Prix_gaz'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_gaz_aout=($Quantité_gaz_aout*$_POST['Prix_gaz'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_gaz_septembre=($Quantité_gaz_septembre*$_POST['Prix_gaz'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_gaz_octobre=($Quantité_gaz_octobre*$_POST['Prix_gaz'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_gaz_novembre=($Quantité_gaz_novembre*$_POST['Prix_gaz'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
$Cout_gaz_decembre=($Quantité_gaz_decembre*$_POST['Prix_gaz'])*1.2+(($_POST['P2_sup']+$_POST['P3_sup'])/12)*$_POST['TVA'];
    
//Affichage des courbes

$datay1 = array($Cout_janvier,$Cout_fevrier,$Cout_mars,$Cout_avril,$Cout_mai,$Cout_juin,$Cout_juillet,$Cout_aout,$Cout_septembre,$Cout_octobre,$Cout_novembre,$Cout_decembre);
$datay2 = array($Cout_fioul_janvier,$Cout_fioul_fevrier,$Cout_fioul_mars,$Cout_fioul_avril,$Cout_fioul_mai,$Cout_fioul_juin,$Cout_fioul_juillet,$Cout_fioul_aout,$Cout_fioul_septembre,$Cout_fioul_octobre,$Cout_fioul_novembre,$Cout_fioul_decembre);
$datay3 = array($Cout_gaz_janvier,$Cout_gaz_fevrier,$Cout_gaz_mars,$Cout_gaz_avril,$Cout_gaz_mai,$Cout_gaz_juin,$Cout_gaz_juillet,$Cout_gaz_aout,$Cout_gaz_septembre,$Cout_gaz_octobre,$Cout_gaz_novembre,$Cout_gaz_decembre);


// Setup the graph
$graph = new Graph(1000,400);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set("Consommation de l'entreprise en euros TTC");
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

//echo $Cout_Dalkia;
//echo $Quantité_gaz_janvier;
//echo $Quantité_fioul_janvier;

// Create the first line
$p1 = new LinePlot($datay1);
$p2 = new LinePlot($datay2);
$p3 = new LinePlot($datay3);

//$p5 = new LinePlot($Quantité_gaz_janvier);
//$p6 = new LinePlot($Quantité_fioul_janvier);
$graph->Add($p1);
$p1->SetColor("#6495ED");//solution dalk ia

$graph->Add($p2);
$p2->SetColor("#221515");//fioul

$graph->Add($p3);
$p2->SetColor("#c3bfbf");//gaz

//$graph->Add($p4);




/*légende*/



$graph->legend->SetFrameWeight(1);

// Output line
$name=date("d-m-Y")."-".date("H-i")."-".$_POST['nom_entreprise'];
$lien_telechargement = "C:\Users\bayo1\Bureau/"."comparaison_conso ".$name;
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
