<!DOCTYPE html>
<html lang="en">
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
      <?php include 'header_inscription_connexion.php';?>
      <?php session_start();   ?>

      <title>page inscription</title>
    

    <!-- Bootstrap CSS -->
    
      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    
  </head>
  <body>
<style>

    body
    {
     background-image: url("photo/paysage.jpg");
     background-size: cover;
     background-position: center; 
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
         p2
        {
            
            font-size: 10px;
           
        }
    </style>
    
    <br/>
    
<p2><font color = "white">Le mot de passe doit contenir au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial. Taille minimale du mot de passe : 8 caractères</font></p2>

       <br />
        <!-- appel de la page traitement_inscription.php lorsque qu'on appuie sur le bouton validé et lorsques toutes les conditions sont respectées-->
        <form method="POST" action="traitement_inscription.php">
                <section>
        <div class="row">
            <div class="col-lg-8">

     <h2 id="contactForm">Formulaire d'inscription</h2>
                </div>
        </div>
    </section>
            

            <section>
                <h4 class="formtitle">Votre e-mail</h4>
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <label class="col-sm-4" for="courriel">Adresse de courriel</label>
                            <!-- Vérifie que le champ de texte à bien été remplie et qu'il correspond bien à un email-->
                            <input class="form-control col-sm-8 
                                          " type="email" id="courriel" name="courriel" placeholder="xxx@yyy.zz"
                                           required>
                        </div>
                    </div>
                </fieldset>
            </section>
 

            
                <h4 class="formtitle">Mot de passe</h4>
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <!-- Cache le mot de passe lors de la saisie-->
                            <label class="col-sm-4" for="password">Password</label>
                            <!-- Vérifie que le champ de texte à bien été remplie-->
                            <input class="form-control col-sm-8
                                          " type="password" id="pass" name="pass"  placeholder="Votre password" onchange="form.pass_confirm = (this.value == '' ? ' : this.value);" required>
                        </div>
                    </div>
                </fieldset>
            
            <h4 class="formtitle">Confirmation mot de passe</h4>
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <!-- Cache le mot de passe lors de la saisie-->
                            <label class="col-sm-4" for="password">Password</label>
                            <!-- Vérifie que le champ de texte à bien été remplie-->
                            <input class="form-control col-sm-8
                                          " type="password" id="pass" name="pass_confirm"  placeholder="Les mots de passe doivent être identiques" required>
                        </div>
                    </div>
                </fieldset>
            
           <center> <p> <button class="btn btn-primary " type="submit" name="valid_contact">Envoyer</button> </p></center>
        </form>
    </div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
