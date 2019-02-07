<!Doctype>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Consommation annuelle</title>

	<style>
  #chartdiv {
    width: 80%;
    height: 500px;
    background:#F9F9F9;
    opacity: 0.75;
    padding: 25px;
    margin: auto;
  }
  #chartdiv1 {
    width: 80%;
    height: 500px;
    background:#F9F9F9;
    opacity: 0.75;
    padding: 25px;
    margin: auto;
  }
  body
  {
    background-image: url("./photo/catalina.jpg");
    background-size: cover

  }
  form
  {
    /*text-align: center;*/
    position: absolute;
    left: 41%;
    background:#F9F9F9;
    opacity: 0.75;
    padding: 25px;
  }
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<link rel="stylesheet" type="text/css" href="conso.css">


<?php
/* Définition de la variable titre pour la page d'accueil */
$titre_page="conso_annuelle";
/* Inclusion de l'en-têtre */
include 'header.php';?>
<?php session_start();  
if (!isset($_SESSION['id'])) {
         // pas loguer
  header('location: page_connexion.php');
}?>
<!-- Appel du header -->
<?php include 'header_commercial.php';?>

<meta charset="utf-8">

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
  <br/>
  <br/>
  <br/>
  <br/>
  <br />
  <form method="POST" action="conso_annuelle.inc.php">
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
          <?php include('liste_deroulante_consommation1.php'); ?>
        </div>
      </div>
    </fieldset> 


    <br>
    <center><p> <button class="btn btn-primary " type="submit" name="valid_contact">Valider</button> </p></center>

  </form>
  <!-- HTML -->
  <br><br><br><br><br><br><br><br><br><br><br><br>
  <div id="chartdiv"></div>
  <br><br><br><br><br><br><br><br>
  <div id="chartdiv1"></div>

  <div class="figure">

    <div></div>
  </div>
  <svg class="pie"></svg>

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
$requ = $bdd->prepare('SELECT * FROM conso_annuelle WHERE Sites = ?');
$requ->execute(array($_POST['nom_entreprise']));
$entreprise = '';
$habitat = '';
$site = '';
$a2011 = '';
$a2012 = '';
$a2013 = '';
$a2014 = '';
$a2015 = '';
$a2016 = '';
$a2017 = '';
while($donnee = $requ->fetch())
{ 
	$entreprise = $donnee['Entreprise'];
	$habitat = $donnee['Habitat'];
	$site = $donnee['Sites'];
	$a2011 = $donnee['a2011'];
	$a2012 = $donnee['a2012'];
	$a2013 = $donnee['a2013'];
	$a2014 = $donnee['a2014'];
	$a2015 = $donnee['a2015'];
	$a2016 = $donnee['a2016'];
	$a2017 = $donnee['a2017'];
}
?>

<script>

	var entreprise = '<?php echo $entreprise; ?>' ;
  var site = '<?php echo $site; ?>' ;
  var a2011 = '<?php echo $a2011; ?>' ;
  a2011=a2011.replace(" ","");
  a2011 = parseFloat(a2011);
  var a2012 = '<?php echo $a2012; ?>' ;
  a2012=a2012.replace(" ","");
  a2012 = parseFloat(a2012);
  var a2013 = '<?php echo $a2013; ?>' ;
  a2013=a2013.replace(" ","");
  a2013 = parseFloat(a2013);
  var a2014 = '<?php echo $a2011; ?>' ;
  a2014=a2014.replace(" ","");
  a2014 = parseFloat(a2014);
  var a2015 = '<?php echo $a2015; ?>' ;
  a2015=a2015.replace(" ","");
  a2015 = parseFloat(a2015);
  var a2016 = '<?php echo $a2016; ?>' ;
  a2016=a2016.replace(" ","");
  a2016 = parseFloat(a2016);
  var a2017 = '<?php echo $a2017; ?>' ;
  a2017=a2017.replace(" ","");
  a2017 = parseFloat(a2017);
	//console.log(a2017);
	//Tableau des années
	var tabAnnees = [];
	tabAnnees.push(2011, 2012, 2013, 2014, 2015, 2016, 2017);
	//Tableau de la consommation sur les années
	var tabConsoAnnees = [];
	tabConsoAnnees.push(a2011, a2012, a2013, a2014, a2015, a2016, a2017);
	tabCouple = [];
	for(var i=0; i<7; i++){
    tabCouple.push(
    {
      annees: tabAnnees[i],
      consommation: tabConsoAnnees[i]
    }
    );
  }
  data = [];
  for(var i=0; i<7; i++){
    data.push(
    {
      annees: tabAnnees[i],
      consommation: tabConsoAnnees[i]
    }
    );
  }

  /*Fin pie chart*/
  console.log(tabCouple);

    // Themes begin
    am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);
var chart1 = am4core.create("chartdiv1", am4charts.PieChart);

chart.data = data;
chart1.data = data;

// Add data
/*chart.data = [{
  "annee": tabAnnees[0],
  "consommation": tabConsoAnnees[0]
}, {
  "annee": tabAnnees[1],
  "consommation": tabConsoAnnees[1]
}, {
  "annee": tabAnnees[2],
  "consommation": tabConsoAnnees[2]
}, {
  "annee": tabAnnees[3],
  "consommation": tabConsoAnnees[3]
}, {
  "annee": tabAnnees[4],
  "consommation": tabConsoAnnees[4]
}, {
  "annee": tabAnnees[5],
  "consommation": tabConsoAnnees[5]
}, {
  "annee": tabAnnees[6],
  "consommation": tabConsoAnnees[6]
}];
*/
// Create axes

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "annees";
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.minGridDistance = 30;

categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
  /*if (target.dataItem && target.dataItem.index & 2 == 2) {
    return dy + 25;
  }*/
  return dy;
});

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.valueY = "consommation";
series.dataFields.categoryX = "annees";
series.name = "consommation";
series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;
valueAxis.title.text = "Consommation en kWh";

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;


// Add and configure Series
var pieSeries = chart1.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "consommation";
pieSeries.dataFields.category = "annees";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;
</script>
