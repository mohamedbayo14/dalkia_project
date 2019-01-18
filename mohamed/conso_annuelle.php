<!Doctype>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Consommation annuelle</title>

	<style>
		.formulaire{
			position: absolute;
			left: 37%;
			margin-top: 50px;
		}
	</style>

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
	

</body>
</html>