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
      <!-- appel du header-->
      <?php include 'header_admin.php';?>
   
  </head>
</head>
<body>
<style>


        
    body
    {
     background-image: url("photo/fjord.jpg");
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
<br>
<br>
<br>
<br>

<br><br>
<br>


<br>
<!-- Donne les droits d'accès à une personne inscrite de la liste déroulante lorsqu'on appuie sur le bouton valider -->
<form method="POST" action="traitement_droit_acces.php">      
<section>
        <div class="row">
        <div class="col-lg-8">
        <br>
        <br>

                <h4 class="formtitle">Donner droit d'utilisateur</h4>
    <fieldset>
    <div class="form-group">
        <div class="form-row">
           <p>Choisir un nom</p>
        </div>
    </div>                
    <div class="form-group">
        <div class="form-row">
            <!-- appel de la liste déroulante -->
           <?php include('liste_deroulante_non_inscrit.php'); ?>
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



    
 
           


    
            
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>