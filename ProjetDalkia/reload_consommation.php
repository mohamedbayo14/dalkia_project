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
      <? session_start(); ?>
   
  </head>
</head>
<body>
<br>
<br>

<br>
<!-- affichage du graphique de l'entreprise en fonction de la liste déroulante lorsqu'on appuie sur le bouton valider -->
<form method="POST" action="reload_consommation.php">      
<section>
        <div class="row">
        <div class="col-lg-8">
        <br>
        <br>

                <h4 class="formtitle">Menu Principal</h4>
    <fieldset>
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
    <div class="Graph">
           <?php              
              $_SESSION['nom_entre'] = $_POST['nom_entreprise']; 
              echo "<img src='./traitement_consommation.php'; />";              
           ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
    
</html>
