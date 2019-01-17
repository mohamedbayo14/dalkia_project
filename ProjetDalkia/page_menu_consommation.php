<!DOCTYPE html>
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
    
    <br/>


       <br />
        <form method="POST" action="traitement_consommation.php">
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>