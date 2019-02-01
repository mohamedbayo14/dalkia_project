<!Doctype>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Consommation annuelle</title>

	<style>
		.figure{
			position: absolute;
			left: 27%;
			top: 50%;
			opacity: 0.75;
            padding: 25px;
		}
		.pie{
			margin-left: 60%;
			margin-top: 175px;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="conso.css">
	<!-- <script src="./d3.min.js"></script> -->
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>

	<!-- <script src="./conso.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
        <style>
        body
        {
             background-image: url("./photo/conso.jpg");
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
    /*Début pie chart*/
    //Déclaration  
    const height = 600;
    const width = 1000;
    const inner = 0;
    const outer = 150;
    let svg = d3.select('body')
        .append('svg')
        .attr('width', width)
        .attr('height', height);
    let g = svg
        .append('g')
        .attr('transform', `translate(${width/2}, ${height/2})`);
    //Configuration des couleurs avec hsl      
    let couleurs = [];
    let couleurs2 = [];
    let delta = 360 / 12;
    for(let i=0; i<12; i++) {
        couleurs.push(d3.hsl(delta*i, 0.5, 0.6));
        couleurs2.push(d3.hsl(delta * i, 0.9, 0.6));
    }
    console.log(tabCouple);
    //Tracé du camembert  
    let camembert = function() {
        console.log(tabCouple);
        //Configuration des marges
        var margin = { top: 10, right: 20, bottom: 30, left: 50 };
        //Calcul des angles
        const sum = d3.sum(tabConsoAnnees);
        const nb = tabConsoAnnees.length;
        let dataAngle = [];
        let angle = 0;
        for(let i=0; i<nb; i++) {
            dataAngle.push(angle);
            angle += tabConsoAnnees[i]*360/sum;
        }
        dataAngle.push(angle);
        let secteurs = g.selectAll('path')
            .data(tabConsoAnnees);
        secteurs.enter()
            .append('path')
            .attr('d', function(d, i) {
        let arc = d3.svg.arc()
            .innerRadius(inner)
            .outerRadius(outer)
            .startAngle(Math.PI * 2 * dataAngle[i] / 360)
            .endAngle(Math.PI * 2 * dataAngle[i + 1] / 360);
            return arc();
        })
        .attr('fill', function(d, i) {
            return couleurs[i];
        })
        .on('mouseover', function(d, i){
            d3.select(this)
              .attr('fill', couleurs2[i]);
        })
        .on('mouseout', function (d, i) {
            d3.select(this)
              .attr('fill', couleurs[i]);
        });
      secteurs.attr('d', function (d, i) {
          let arc = d3.svg.arc()
              .innerRadius(inner)
              .outerRadius(outer)
              .startAngle(Math.PI * 2 *dataAngle[i]/360)
              .endAngle(Math.PI * 2 * dataAngle[i+1] / 360);
          return arc();
      })
      .attr('fill', function (d, i) {
        return couleurs[i];
    })
    /* Légende*/    
    var leg=svg.selectAll("g").data(tabCouple);
    leg.enter() 
       .append("g")
       .attr("class","legende")
       .attr("transform",function(d,i){
        return "translate(450,"+(100+30*i)+")";
        });
    var z = 25;
    //Petits rectangles pour la légende  
    leg.append("rect")
       .attr("x", 205 + z)
       .attr('y', 12 + z)
       .attr("width",15)
       .attr("height",15)
       .attr("fill",function (d,i){
        return couleurs[i];
        });
    //Texts associés aux rectangles
    leg.append("text")
       .attr("x", 225 + z)
       .attr('y', 22 + z)
       .attr("fill","black")
       .style("font-size","12px")
       .text(function(d,i) {
        return tabCouple[i].annees;
        });
    g.append("text")
     .attr("x", 20)             
     .attr("y", -200)
     .attr("text-anchor", "middle")
     .style("fill", "#5a5a5a")
     .style("font-family", "Raleway")
     .style("font-weight", "300")
     .style("font-size", "20px")
     .text("Répartition de la consommation sur les annees pour");
    z = z + 15;
    secteurs.exit().remove();
  }
    /*Fin pie chart*/
    console.log(tabCouple);
    // fonction de tracé de l'histogramme
    function histogramme(tabHist){
        var margin = {top: 12, right: 20, bottom: 30, left: 70},
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;
        var formatPercent = d3.format(".0%");
        var x = d3.scale.ordinal()
            .rangeRoundBands([0, width], .1);
        var y = d3.scale.linear()
            .domain([Math.min(tabCouple[0].consommation, tabCouple[1].consommation,
            	tabCouple[2].consommation, tabCouple[3].consommation, tabCouple[4].consommation,
            	tabCouple[5].consommation, tabCouple[6].consommation), Math.max(tabCouple[0].consommation, tabCouple[1].consommation,
            	tabCouple[2].consommation, tabCouple[3].consommation, tabCouple[4].consommation,
            	tabCouple[5].consommation, tabCouple[6].consommation)])
            .range([height, 0]);
        var xAxis = d3.svg.axis()
            .scale(x)
            .orient("bottom");
        var yAxis = d3.svg.axis()
            .scale(y)
            .orient("left")
            //.tickFormat(formatPercent);
        var svg = d3.select("body").append("svg")
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
        //svg.call(tip);
        x.domain(tabHist.map(function(d) { return d.annees; }));
        y.domain([0, d3.max(tabHist, function(d) { return d.consommation; })]);
        svg.append("g")
            .attr("class", "x axis")
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis);
        svg.append("g")
            .attr("class", "y axis")
            .call(yAxis)
            .append("text")
            .attr("transform", "rotate(-90)")
            .attr("y", 6)
            .attr("dy", ".71em")
            .style("text-anchor", "end")
            .text("consommation");
        svg.selectAll(".bar")
            .data(tabHist)
            .enter().append("rect")
            .attr("class", "bar")
            .attr("x", function(d) { return x(d.annees); })
            .attr("width", x.rangeBand())
            .attr("y", function(d) { return y(d.consommation); })
            .attr("height", function(d) { return height - y(d.consommation); })
            .on('click', function(d,i){
              let color = d3.select(this).attr('fill');
              let svg = d3.select("svg");
              svg.selectAll("*").remove();
              console.log("Bonjour");
            })
            /*.on('mouseover', tip.show)
            .on('mouseout', tip.hide)*/
        }
        // Fin fonction de tracé de l'histogramme
        camembert();
        histogramme(tabCouple)
</script>