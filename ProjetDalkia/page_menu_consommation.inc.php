<!DOCTYPE html>
<html lang="en">
<head>
    <head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <?php
/* Définition de la variable titre pour la page d'accueil */
      $titre_page="consommation";
      /* Inclusion de l'en-têtre */
      include 'header.php';?>
      <!-- Appel du header -->
      <?php include 'header_commercial.php';?>
      <?php session_start();   ?>
   
  </head>
</head>
<body>
<br>
<br>

<br>
<!-- affichage du graphique de l'entreprise en fonction de la liste déroulante lorsqu'on appuie sur le bouton valider -->

<div class="container ">
    
    <style>
    #chartdiv {
      width: 100%;
      height: 500px;
      margin-top: 200px;
      background:#F9F9F9;
      opacity: 0.75;
      padding: 25px;
  }
    body
    {
     background-image: url("photo/nikon.jpg");
     background-size: cover

    }
        form
        {
            /*text-align: center;*/
            position: absolute;
            left: 37%;
            background:#F9F9F9;
            opacity: 0.75;
            padding: 25px;
        }
    </style>

    <!-- Resources -->
    <script src="./amcharts4/core.js"></script>
    <script src="./amcharts4/charts.js"></script>
    <script src="./amcharts4/themes/animated.js"></script>
    
    <br/>


       <br />
        <form method="POST" action="page_menu_consommation.inc.php">
            <h2 id="contactForm">Page de consommation</h2>
            <fieldset>
                <br>
                <div class="form-group">
                    <div class="form-row">
                        <p>Choisir une entreprise</p>
                    </div>
                </div>                
                <div class="form-group">
                    <div class="form-row">
                        <!-- Appel de la liste déroulante -->
                        <?php include('liste_deroulante_consommation.php'); ?>
                    </div>
                </div>
            </fieldset> 
            
            
            <br>
            <center><p> <button class="btn btn-primary " type="submit" name="Afficher la comparaison">Affichage</button> </p></center>
           
        </form>
    </div>
    <br><br><br><br>
    <div id="chartdiv"></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>

<?php

// Connexion to the database
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=dalkia_database;charset=utf8', 'root','');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
$sites='';
if (isset($_POST['sites'])) {
  $sites = $_POST['sites'];
}

$requ = $bdd->prepare('SELECT * FROM conso_mensuelle WHERE Entreprise = ?');
$requ->execute(array($_POST['nom_entreprise']));


$entreprise = '';
$janvier = '';
$fevrier = '';
$mars = '';
$avril = '';
$mai = '';
$juin = '';
$juillet = '';
$aout = '';
$septembre = '';
$octobre = '';
$novembre = '';
$decembre = '';

while($donnee = $requ->fetch())
{ 
  $entreprise = $donnee['Entreprise'];
  $janvier = $donnee['janvier'];
  $fevrier = $donnee['fevrier'];
  $mars = $donnee['mars'];
  $avril = $donnee['avril'];
  $mai = $donnee['mai'];
  $juin = $donnee['juin'];
  $juillet = $donnee['juillet'];
  $aout = $donnee['aout'];
  $septembre = $donnee['septembre'];
  $octobre = $donnee['octobre'];
  $novembre = $donnee['novembre'];
  $decembre = $donnee['decembre'];
}

?>


<!-- Chart code -->
<script>

var entreprise = '<?php echo $entreprise; ?>' ;

  var janvier = '<?php echo $janvier; ?>' ;
  janvier=janvier.replace(" ","");
  janvier = parseFloat(janvier);

  var fevrier = '<?php echo $fevrier; ?>' ;
  fevrier=fevrier.replace(" ","");
  fevrier = parseFloat(fevrier);

  var mars = '<?php echo $mars; ?>' ;
  mars=mars.replace(" ","");
  mars = parseFloat(mars);

  var avril = '<?php echo $avril; ?>' ;
  avril=avril.replace(" ","");
  avril = parseFloat(avril);

  var mai = '<?php echo $mai; ?>' ;
  mai=mai.replace(" ","");
  mai = parseFloat(mai);

  var juin = '<?php echo $juin; ?>' ;
  juin=juin.replace(" ","");
  juin = parseFloat(juin);

  var juillet = '<?php echo $juillet; ?>' ;
  juillet=juillet.replace(" ","");
  juillet = parseFloat(juillet);

  var aout = '<?php echo $aout; ?>' ;
  aout=aout.replace(" ","");
  aout = parseFloat(aout);

  var septembre = '<?php echo $septembre; ?>' ;
  septembre=septembre.replace(" ","");
  septembre = parseFloat(septembre);

  var octobre = '<?php echo $octobre; ?>' ;
  octobre=octobre.replace(" ","");
  octobre = parseFloat(octobre);

  var novembre = '<?php echo $novembre; ?>' ;
  novembre=novembre.replace(" ","");
  novembre = parseFloat(novembre);

  var decembre = '<?php echo $decembre; ?>' ;
  decembre=decembre.replace(" ","");
  decembre = parseFloat(decembre);

  //Tableau de la consommation sur les mois
  var tabConsoMois = [];
  tabConsoMois.push(janvier, fevrier, mars, avril, mai, juin, juillet, aout, septembre, octobre, novembre, decembre);
  console.log(tabConsoMois);

  

    var january = new Date("January 1, 2017 00:00:00");
    var february = new Date("February 1, 2017 00:00:00");
    var march = new Date("March 1, 2017 00:00:00");
    var april = new Date("April 1, 2017 00:00:00");
    var may = new Date("May 1, 2017 00:00:00");
    var june = new Date("June 1, 2017 00:00:00");
    var july = new Date("July 1, 2017 00:00:00");
    var august = new Date("August 1, 2017 00:00:00");
    var september = new Date("September 1, 2017 00:00:00");
    var november = new Date("November 1, 2017 00:00:00");
    var october = new Date("October 1, 2017 00:00:00");
    var december = new Date("December 1, 2017 00:00:00");

    var mois = [];
    mois = new Array(january, february, march, april, may, june, july, august, september, october, november, december);

  let data = [];
  for(var i=0; i<12; i++){

      data.push(

        {
          mois: mois[i],
          consommation: tabConsoMois[i]
        }

      );
    }
    console.log(data);



/* Chart code */
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

let chart = am4core.create("chartdiv", am4charts.XYChart);

/*let data = [];
let value = 50;
for(let i = 0; i < 300; i++){
  let date = new Date();
  date.setHours(0,0,0,0);
  date.setDate(i);
  value -= Math.round((Math.random() < 0.5 ? 1 : -1) * Math.random() * 10);
  data.push({date:date, value: value});
}
*/
chart.data = data;

// Create axes
let dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.minGridDistance = 60;

let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
let series = chart.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "consommation";
series.dataFields.dateX = "mois";
series.tooltipText = "{consommation}"

series.tooltip.pointerOrientation = "vertical";

chart.cursor = new am4charts.XYCursor();
chart.cursor.snapToSeries = series;
chart.cursor.xAxis = dateAxis;

//chart.scrollbarY = new am4core.Scrollbar();
chart.scrollbarX = new am4core.Scrollbar();

</script>