<!Doctype>
<!DOCTYPE html>
<html>
<head>
    <title>Comparaison</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
        
        

        h2
        {
            text-align: center;
            color: white;
        }
        body
        {
           background-image: url("photo/landscape.jpg");
           background-size: cover
        }
        html, body {
            width: 100%;
            height: 100%;
            margin: 0px;
        }

        #chartdiv {
            width: 70%;
            height: 500px;
            background:#F9F9F9;
            opacity: 0.75;
            padding: 25px;
            margin: auto;
        }
    </style>

    <script src="//www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="//www.amcharts.com/lib/3/serial.js"></script>
    <script src="//www.amcharts.com/lib/3/themes/light.js"></script>
</head>
<body>
    <br>
    <h2>Courbes de comparaison</h2>
    <br><br>
    <div id="chartdiv"></div>
    <a href="page_comparaison.php">
        <button type="button" class="btn btn-success">Retour</button>
    </a>
</body>
</html>

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


/*require_once ('C:\wamp64\www\dalkia_project\ProjetDalkia\jpgraph-4.2.5\src\jpgraph.php');
require_once ('C:\wamp64\www\dalkia_project\ProjetDalkia\jpgraph-4.2.5\src\jpgraph_line.php');*/
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

$Cout_gaz=-($Cout_gaz_janvier+$Cout_gaz_fevrier+$Cout_gaz_mars+$Cout_gaz_avril+$Cout_gaz_mai+$Cout_gaz_juin+$Cout_gaz_juillet+$Cout_gaz_aout+$Cout_gaz_septembre+$Cout_gaz_octobre+$Cout_gaz_novembre+$Cout_gaz_decembre);

$Cout_fioul=-($Cout_fioul_janvier+$Cout_fioul_fevrier+$Cout_fioul_mars+$Cout_fioul_avril+$Cout_fioul_mai+$Cout_fioul_juin+$Cout_fioul_juillet+$Cout_fioul_aout+$Cout_fioul_septembre+$Cout_fioul_octobre+$Cout_fioul_novembre+$Cout_fioul_decembre);

$Comparaison_dalkia_fioul=($Cout_Dalkia-$Cout_fioul)/$Cout_fioul;
$Comparaison_dalkia_gaz=($Cout_Dalkia-$Cout_gaz)/$Cout_gaz;

?>

<script>

var Cout_janvier = '<?php echo $Cout_janvier; ?>' ;
var Cout_fevrier = '<?php echo $Cout_fevrier; ?>' ;
var Cout_mars = '<?php echo $Cout_mars; ?>' ;
var Cout_avril = '<?php echo $Cout_avril; ?>' ;
var Cout_mai = '<?php echo $Cout_mai; ?>' ;
var Cout_juin = '<?php echo $Cout_juin; ?>' ;
var Cout_juillet = '<?php echo $Cout_juillet; ?>' ;
var Cout_aout = '<?php echo $Cout_aout; ?>' ;
var Cout_septembre = '<?php echo $Cout_septembre; ?>' ;
var Cout_octobre = '<?php echo $Cout_octobre; ?>' ;
var Cout_novembre = '<?php echo $Cout_novembre; ?>' ;
var Cout_decembre = '<?php echo $Cout_decembre; ?>' ;

var datay1 = [];
datay1.push(Cout_janvier, Cout_fevrier, Cout_mars, Cout_avril, Cout_mai, Cout_juin, Cout_juillet, Cout_aout, Cout_septembre, Cout_octobre, Cout_novembre, Cout_decembre);

var Cout_fioul_janvier = '<?php echo $Cout_fioul_janvier; ?>' ;
var Cout_fioul_fevrier = '<?php echo $Cout_fioul_fevrier; ?>' ;
var Cout_fioul_mars = '<?php echo $Cout_fioul_mars; ?>' ;
var Cout_fioul_avril = '<?php echo $Cout_fioul_avril; ?>' ;
var Cout_fioul_mai = '<?php echo $Cout_fioul_mai; ?>' ;
var Cout_fioul_juin = '<?php echo $Cout_fioul_juin; ?>' ;
var Cout_fioul_juillet = '<?php echo $Cout_fioul_juillet; ?>' ;
var Cout_fioul_aout = '<?php echo $Cout_fioul_aout; ?>' ;
var Cout_fioul_septembre = '<?php echo $Cout_fioul_septembre; ?>' ;
var Cout_fioul_octobre = '<?php echo $Cout_fioul_octobre; ?>' ;
var Cout_fioul_novembre = '<?php echo $Cout_fioul_novembre; ?>' ;
var Cout_fioul_decembre = '<?php echo $Cout_fioul_decembre; ?>' ;

var datay2 = [];
datay2.push(Cout_fioul_janvier, Cout_fioul_fevrier, Cout_fioul_mars, Cout_fioul_avril, Cout_fioul_mai, Cout_fioul_juin, Cout_fioul_juillet, Cout_fioul_aout, Cout_fioul_septembre, Cout_fioul_octobre, Cout_fioul_novembre, Cout_fioul_decembre);


var Cout_gaz_janvier = '<?php echo $Cout_gaz_janvier; ?>' ;
var Cout_gaz_fevrier = '<?php echo $Cout_gaz_fevrier; ?>' ;
var Cout_gaz_mars = '<?php echo $Cout_gaz_mars; ?>' ;
var Cout_gaz_avril = '<?php echo $Cout_gaz_avril; ?>' ;
var Cout_gaz_mai = '<?php echo $Cout_gaz_mai; ?>' ;
var Cout_gaz_juin = '<?php echo $Cout_gaz_juin; ?>' ;
var Cout_gaz_juillet = '<?php echo $Cout_gaz_juillet; ?>' ;
var Cout_gaz_aout = '<?php echo $Cout_gaz_aout; ?>' ;
var Cout_gaz_septembre = '<?php echo $Cout_gaz_septembre; ?>' ;
var Cout_gaz_octobre = '<?php echo $Cout_gaz_octobre; ?>' ;
var Cout_gaz_novembre = '<?php echo $Cout_gaz_novembre; ?>' ;
var Cout_gaz_decembre = '<?php echo $Cout_gaz_decembre; ?>' ;

var datay3 = [];
datay3.push(Cout_gaz_janvier, Cout_gaz_fevrier, Cout_gaz_mars, Cout_gaz_avril, Cout_gaz_mai, Cout_gaz_juin, Cout_gaz_juillet, Cout_gaz_aout, Cout_gaz_septembre, Cout_gaz_octobre, Cout_gaz_novembre, Cout_gaz_decembre);

//var datay1 = [100,200,12,158,12,25,158,145,145,123,147,159];
//var datay2 = [150,20,102,18,125,125,128,147,195,23,177,57];
//var datay3 = [120,140,112,168,124,195,108,45,45,128,145,155];



var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [{
    "category": "Janvier",
    "value1": datay1[0],
    "value2": datay2[0],
    "value3": datay3[0]
  }, {
    "category": "Fevrier",
    "value1": datay1[1],
    "value2": datay2[1],
    "value3": datay3[1]
  }, {
    "category": "Mars",
    "value1": datay1[2],
    "value2": datay2[2],
    "value3": datay3[2]
  }, {
    "category": "Avril",
    "value1": datay1[3],
    "value2": datay2[3],
    "value3": datay3[3]
  }, {
    "category": "Mai",
    "value1": datay1[4],
    "value2": datay2[4],
    "value3": datay3[4]
  }, {
    "category": "Juin",
    "value1": datay1[5],
    "value2": datay2[5],
    "value3": datay3[5]
  }, {
    "category": "Juillet",
    "value1": datay1[6],
    "value2": datay2[6],
    "value3": datay3[6]
  }, {
    "category": "Août",
    "value1": datay1[7],
    "value2": datay2[7],
    "value3": datay3[7]
  }, {
    "category": "Septembre",
    "value1": datay1[8],
    "value2": datay2[8],
    "value3": datay3[8]
  }, {
    "category": "Octobre",
    "value1": datay1[9],
    "value2": datay2[9],
    "value3": datay3[9]
  }, {
    "category": "Novembre",
    "value1": datay1[10],
    "value2": datay2[10],
    "value3": datay3[10]
  }, {
    "category": "Decembre",
    "value1": datay1[11],
    "value2": datay2[11],
    "value3": datay3[11]
  }],
  "valueAxes": [{
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0,
    "title": "Coûts"
  }],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [{
    "title": "dalkia",
    "balloonText": "[[title]]: <b>[[value]]</b>",
    "bullet": "round",
    "bulletSize": 10,
    "bulletBorderColor": "#ffffff",
    "bulletBorderAlpha": 1,
    "bulletBorderThickness": 2,
    "valueField": "value1"
  }, {
    "title": "fioul",
    "balloonText": "[[title]]: <b>[[value]]</b>",
    "bullet": "round",
    "bulletSize": 10,
    "bulletBorderColor": "#ffffff",
    "bulletBorderAlpha": 1,
    "bulletBorderThickness": 2,
    "valueField": "value2"
  }, {
    "title": "gaz",
    "balloonText": "[[title]]: <b>[[value]]</b>",
    "bullet": "round",
    "bulletSize": 10,
    "bulletBorderColor": "#ffffff",
    "bulletBorderAlpha": 1,
    "bulletBorderThickness": 2,
    "valueField": "value3"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "category",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0
  },
  "legend": {}
});

</script>