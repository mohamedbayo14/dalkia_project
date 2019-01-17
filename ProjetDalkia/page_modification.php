<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <?php
/* Définition de la variable titre pour la page d'accueil */
      $titre_page="Modification";
      /* Inclusion de l'en-têtre */
      include 'header.php';?>
      <!-- Appel de du header -->
      <?php include 'header_commercial.php';?>
      <?php session_start();   ?>

      
      if(empty($_SESSION)) { session_start(); if(! isset($_SESSION['ouvert'])) { header("Location : /login.php"); } }

      <title>page de Modification</title>
      <!-- Bootstrap CSS -->
    
      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    
  </head>
  <body>
<style>
        body
        {
           background-image: url("photo/montain.jpg");
           background-size: cover
        }
     form
         {
             background:#F9F9F9;
             opacity: 0.75;
             padding: 25px;
        }
    </style>
       <br />
       <br />
       <br />
       <br />


<div class="container ">
    
    <style>
        p1
        {
            font-weight: bold;
            font-size: 10px;
            position: absolute;
            top: 98px;
            left: 55px;
        }
        
    </style>
    <section>
        <div class="row">
            <div class="col-lg-8">

     <h2 id="contactForm">Modification des informations du compte</h2>
                </div>
        </div>
    </section>

       <br />
        <!-- Met à jour la base de donnée en appuyant sur le bouton -->
        <form method="POST" action="traitement_modification.php">
            <section>
                <h4 class="formtitle">Identifiant de connexion*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="nom">identifiant</label>
                    <input class="form-control col-sm-8" id="identifiant" name="identifiant" placeholder="Votre identifiant..." required>
                </div>
            </section>
            <section>
                <h4 class="formtitle">Votre e-mail*</h4>
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <label class="col-sm-4" for="courriel">Adresse de courriel</label>
                            <input class="form-control col-sm-8 " type="email" id="courriel" name="courriel" placeholder="xxx@gmail.com">
                        </div>
                    </div>
                </fieldset>
            </section>
                <h4 class="formtitle">Mot de passe*</h4>
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <label class="col-sm-4" for="password">Password</label>
                            <input class="form-control col-sm-8 " type="password" id="pass" name="pass" placeholder="Votre password">
                        </div>
                    </div>
                </fieldset>
            <center>
            <p> <button class="btn btn-primary " type="submit" name="valid_contact">Envoyer</button> </p>
  
            </center>
        </form>
    </div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
