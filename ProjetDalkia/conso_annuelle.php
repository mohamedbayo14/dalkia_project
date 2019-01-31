<!Doctype>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Consommation annuelle</title>



	<?php
/* Définition de la variable titre pour la page d'accueil */
      $titre_page="conso_annuelle";
      /* Inclusion de l'en-têtre */
      include 'header.php';?>
      <!-- Appel du header -->
      <?php include 'header_commercial.php'; ?>
    <?php session_start();  
         if (!isset($_SESSION['id'])) {
         // pas loguer
        header('location: page_connexion.php');
}?>
    <meta charset="utf-8">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container ">
	
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
    </div>

	

</body>
</html>