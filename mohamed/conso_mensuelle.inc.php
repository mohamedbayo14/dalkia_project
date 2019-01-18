<!Doctype>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Consommation mensuelle</title>

	<style>
		.formulaire{
			position: absolute;
			left: 37%;
			margin-top: 50px;
		}

		.figure{
			position: absolute;
			left: 27%;
			margin-top: 30%;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="conso.css">
	<!-- <script src="./d3.min.js"></script> -->
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js"></script>

	<!-- <script src="./conso.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="./d3.min.js"></script>

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
		<form method="POST" action="conso_mensuelle.inc.php">      
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
           <?php include('liste_deroulante_consommation_entreprise.php'); ?>
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

	<br>
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

	//Tableau des mois
	var tabMois = [];
	tabMois.push(01, 02, 03, 04, 05, 06, 07, 08, 09, 10, 11, 12);

	//Tableau de la consommation sur les mois
	var tabConsoMois = [];
	tabConsoMois.push(janvier, fevrier, mars, avril, mai, juin, juillet, aout, septembre, octobre, novembre, decembre);

	tabCouple = [];
	for(var i=0; i<12; i++){

      tabCouple.push(

        {
          mois: tabMois[i],
          consommation: tabConsoMois[i]
        }

      );
    }
    console.log(tabCouple);

    function drawChart (tableau){

        /*let couleurs = [];
        let couleurs2 = [];       
        let delta = 360 / tableau.length;

        for(let i=0; i<tableau.length; i++) {
            couleurs.push(d3.hsl(delta*i, 0.5, 0.6));
            couleurs2.push(d3.hsl(delta * i, 0.9, 0.6));
        }
*/
        //Dimentsions 
    	var svgWidth = 600, svgHeight = 500;
   		var margin = { top: 20, right: 20, bottom: 30, left: 50 };
   		var width = svgWidth - margin.left - margin.right;
   		var height = svgHeight - margin.top - margin.bottom;

        //Selection et configuration de svg
   		var svg = d3.select('svg')
     	.attr("width", svgWidth)
     	.attr("height", svgHeight);

     	var g = svg.append("g")
   		.attr("transform", 
      	"translate(" + margin.left + "," + margin.top + ")"
   		);

        //Echelle
   		var x = d3.scaleTime().rangeRound([0, width]);
		var y = d3.scaleLinear().rangeRound([height, 0]);
		
		var line = d3.line()
   		.x(function(d) { return x(d.mois)})
   		.y(function(d) { return y(d.consommation)})
   		x.domain(d3.extent(tableau, function(d) { return d.mois }));
   		y.domain(d3.extent(tableau, function(d) { return d.consommation }));

        //Axe x: Mois
   		g.append("g")
   		.attr("transform", "translate(0," + height + ")")
   		.call(d3.axisBottom(x))
   		.select(".domain")
        .attr("text-anchor", "end")
        .text("Mois");
   		//.remove();

        //Axe y: Consommation
   		g.append("g")
   		.call(d3.axisLeft(y))
   		.append("text")
   		.attr("fill", "#000")
   		.attr("transform", "rotate(-90)")
   		.attr("y", 6)
   		.attr("dy", "0.71em")
   		.attr("text-anchor", "end")
   		.text("Consommation");

        //Courbe
   		g.append("path")
		.datum(tableau)
        .attr("class", "axis")
		.attr("fill", "none")
		.attr("stroke", "steelblue")
		.attr("stroke-linejoin", "round")
		.attr("stroke-linecap", "round")
		.attr("stroke-width", 2.5)
        //.style("stroke", color)
		.attr("d", line);

        //Titre
        g.append("text")
        .attr("x", (width / 2))             
        .attr("y", 10 - (margin.top / 2))
        .attr("text-anchor", "middle")
        .style("fill", "#5a5a5a")
        .style("font-family", "Raleway")
        .style("font-weight", "300")
        .style("font-size", "24px")
        .text("Courbe de consommation mensuelle de "+ entreprise);
    }

    drawChart(tabCouple);
</script>