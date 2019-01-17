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
             opacity: 0.55;
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
    
    <br/>


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
                <h4 class="formtitle">Nom*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="nom">Nom</label>
                    <!-- Vérifie que le champ de texte à bien été remplie-->
                    <input class="form-control col-sm-8 <?php if ($erreur_feedback){echo isset($_SESSION['nom_erreur'])? 'is-invalid' : 'is-valid' ; }?>" id="nom" name="nom" placeholder="Votre nom..." <?php if (isset($_SESSION['nom'])){echo 'value='.$_SESSION['nom'];} ?> required>
                    <?php if (isset($_SESSION['nom_erreur'])){
    echo '<div class="col-sm-4"></div><div class="col-sm-8 invalid-feedback">'.$_SESSION['nom_erreur'].'</div>';
    unset($_SESSION['nom_erreur']);}
                    ?>
                </div>
            </section>
            <section>
                <h4 class="formtitle">Prénom*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="prenom">Prénom</label>
                    <!-- Vérifie que le champ de texte à bien été remplie-->
                    <input class="form-control col-sm-8 <?php if ($erreur_feedback){echo isset($_SESSION['prenom_erreur'])? 'is-invalid' : 'is-valid' ; }?>" id="prenom" name="prenom" placeholder="Votre prénom..." <?php if (isset($_SESSION['prenom'])){echo 'value='.$_SESSION['prenom'];} ?> required>
                    <?php if (isset($_SESSION['nom_erreur'])){
    echo '<div class="col-sm-4"></div><div class="col-sm-8 invalid-feedback">'.$_SESSION['prenom_erreur'].'</div>';
    unset($_SESSION['prenom_erreur']);}
                    ?>
                </div>
            </section>
            <section>
                <h4 class="formtitle">Votre e-mail*</h4>
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <label class="col-sm-4" for="courriel">Adresse de courriel</label>
                            <!-- Vérifie que le champ de texte à bien été remplie et qu'il correspond bien à un email-->
                            <input class="form-control col-sm-8
                                          <?php if ($erreur_feedback){echo isset($_SESSION['courriel_erreur'])? 'is-invalid' : 'is-valid' ; }
                                          ?>
                                          " type="email" id="courriel" name="courriel" placeholder="xxx@yyy.zz"
                                          <?php if (isset($_SESSION['courriel'])){echo $_SESSION['courriel'];}
                                          ?> required>
                            <?php if (isset($_SESSION['courriel_erreur'])){
    echo '<div class="col-sm-4"></div><div class="col-sm-8 invalid-feedback">'.$_SESSION['courriel_erreur'].'</div>';
    unset($_SESSION['courriel_erreur']);}
                            ?>
                        </div>
                    </div>
                </fieldset>
            </section>
            <section>
                <h4 class="formtitle">Localisation*</h4>
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <label class="col-sm-4" for="localisation">Adresse</label>
                            <!-- Vérifie que le champ de texte à bien été remplie-->
                            <input class="form-control col-sm-8
                                          <?php if ($erreur_feedback){echo isset($_SESSION['localisation'])? 'is-invalid' : 'is-valid' ; }
                                          ?>
                                          " type="POST" id="lieu" name="lieu" placeholder="Votre adresse"
                                          <?php if (isset($_SESSION['localisation'])){echo $_SESSION['localisation'];}
                                          ?> required>
                            <?php if (isset($_SESSION['localisation_erreur'])){
    echo '<div class="col-sm-4"></div><div class="col-sm-8 invalid-feedback">'.$_SESSION['localisation_erreur'].'</div>';
    unset($_SESSION['localisation_erreur']);}
                            ?>
                        </div>
                    </div>
                </fieldset>
            </section>   
            <section>
                <h4 class="formtitle">Identification*</h4>
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <label class="col-sm-4" for="identifiant">Identifiant</label>
                            <!-- Vérifie que le champ de texte à bien été remplie-->
                            <input class="form-control col-sm-8
                                          <?php if ($erreur_feedback){echo isset($_SESSION['identifiant'])? 'is-invalid' : 'is-valid' ; }
                                          ?>
                                          " type="POST" id="identifiant" name="identifiant" placeholder="Votre identifiant"
                                          <?php if (isset($_SESSION['identifiant'])){echo $_SESSION['identifiant'];}
                                          ?> required>
                            <?php if (isset($_SESSION['identifiant_erreur'])){
    echo '<div class="col-sm-4"></div><div class="col-sm-8 invalid-feedback">'.$_SESSION['identifiant_erreur'].'</div>';
    unset($_SESSION['identifiant_erreur']);}
                            ?>
                        </div>
                    </div>
                </fieldset>
            </section>  
            
                <h4 class="formtitle">Mot de passe*</h4>
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <!-- Cache le mot de passe lors de la saisie-->
                            <label class="col-sm-4" for="password">Password</label>
                            <!-- Vérifie que le champ de texte à bien été remplie-->
                            <input class="form-control col-sm-8
                                          <?php if ($erreur_feedback){echo isset($_SESSION['password'])? 'is-invalid' : 'is-valid' ; }
                                          ?>
                                          " type="password" id="pass" name="pass" placeholder="Votre password"
                                          <?php if (isset($_SESSION['password'])){echo $_SESSION['password'];}
                                          ?> required>
                            <?php if (isset($_SESSION['password_erreur'])){
    echo '<div class="col-sm-4"></div><div class="col-sm-8 invalid-feedback">'.$_SESSION['password_erreur'].'</div>';
    unset($_SESSION['password_erreur']);}
                            ?>
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
