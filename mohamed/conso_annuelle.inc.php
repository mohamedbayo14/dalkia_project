<!Doctype>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Consommation annuelle</title>

	<!-- <style>
		.formulaire{
			position: absolute;
			left: 37%;
			margin-top: 50px;
		}

		.figure{
			position: absolute;
			left: 27%;
			margin-top: 50px;
		}
	</style> -->

	<link rel="stylesheet" type="text/css" href="conso.css">
	<!-- <script src="./d3.min.js"></script> -->
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>

	<!-- <script src="./conso.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Navbar -->
	<nav
	id="menu" class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
	<!-- Le container permet d'aligner les éléments de la barre de navigation sur les autre conteneurs -->
		<div class="container">
			<!-- Icone "home" sur la barre de navigation -->
			<a class="navbar-brand" href="#"><img id="IdDalkia" src="https://upload.wikimedia.org/wikipedia/fr/thumb/3/3c/Logo-dalkia-groupe-edf.jpg/170px-Logo-dalkia-groupe-edf.jpg" alt="Dalkia"></a>
			<!-- Bouton apparaissant pour les petits écrans, à cliquer pour faire apparaitre le menu -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#elementsMenu" aria-controls="elementsMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Elements du menu -->
			<div class="collap
			se navbar-collapse" id="elementsMenu">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="main_page.php">Consommation </a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="main_page.php">Contrat </a>
				</li>          
				<li class="nav-item active">
					<a class="nav-link" href="deconnexion.php"> Deconnexion </a>
				</li>				
			</ul>
			</div>	
		</div>
	</nav>
	<!-- End navbar -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="formulaire">
		<form method="POST" action="conso_annuelle.inc.php">      
		<section>
        	<div class="row">
        	<div class="col-lg-8">
        	<br>
        	<br>

            
    		<fieldset>
    			<div class="form-group">
        			<div class="form-row">
           				<p class="test">Choisir une entreprise</p>
        			</div>
    			</div>                
   			<div class="form-group">
     	    <div class="form-row">
            <!-- Appel de la liste déroulante -->
           <?php include('liste_deroulante_consommation.php'); ?>
        </div>
    </div>
    </fieldset>                
                    
        </div>
        </div>
    <div class="row">
        <div class="col-lg-8">
        <br>
          
        </div></div>
     <div class="Graph">
           <p> <button class="btn btn-primary" type="submit" name="valid_contact">Valider</button> </p> 
     </div>
    </section>
</form>
	</div>
	
	<div class="figure">
		<svg></svg>
		<div></div>
	</div>
		
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
//echo $a2011;
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

    console.log(tabCouple);
    // fonction de tracé de l'histogramme
    function histogramme(tabHist){

        var margin = {top: 350, right: 20, bottom: 30, left: 70},
        width = 960 - margin.left - margin.right,
        height = 800 - margin.top - margin.bottom;

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
        histogramme(tabCouple)
</script>