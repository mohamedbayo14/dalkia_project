<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <?php
/* Définition de la variable titre pour la page d'accueil */
      $titre_page="Page de connexion";
      /* Inclusion de l'en-têtre */
      include 'header.php';?>
      <!-- appel du header-->
      <?php include 'header_inscription_connexion.php';?>
      <?php session_start();   ?>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  </head>
  <body>
<style>

    body
    {
     background-image: url("photo/catalina.jpg");
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
    <br/>
    <!-- Création du formulaire -->
    <section>
        <div class="row">
            <div class="col-lg-8">
     <h2 id="contactForm">Page de connexion</h2>
                </div>
        </div>
       <br />
       <br />


    </section>
        <?php
        /* on affiche un message si on a validé le formulaire */
    
        if(isset($_SESSION['form_erreur'])){
            echo '<div class="alert';
            if($_SESSION['form_erreur']){
                echo ' alert-danger" role="alert">
                    Votre formulaire contient des erreurs';
            }else{
                echo ' alert-success" role="alert">';
                echo 'Merci '. $_SESSION['nom'].' <br>Nous traiterons votre demande dans les plus brefs délais.';
            }
            echo '</div>';
            $erreur_feedback=$_SESSION['form_erreur'];
            unset($_SESSION['form_erreur']);
            unset($_SESSION['nom']);
        }else{
            $erreur_feedback=FALSE;
        }
        ?>
        <!-- Renvoie à la page traitement_page_connexion.php lors de l'appuie sur le bouton si toute les conditions ont été respecté -->
        <form method="POST" action="traitement_page_connexion.php">
            <section>
                <h4 class="formtitle">Identification</h4>
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <label class="col-sm-4" for="identifiant">Identifiant</label>
                            <!-- Verifie que le champ à bien été remplie -->
                            <input class="form-control col-sm-8
                                          <?php if ($erreur_feedback){echo isset($_SESSION['identifiant_erreur'])? 'is-invalid' : 'is-valid' ; }
                                          ?>
                                          " type="POST" id="identifiant" name="identifiant" placeholder="Votre identifiant"
                                          <?php if (isset($_SESSION['courriel'])){echo $_SESSION['identifiant'];}
                                          ?> required>
                            <!-- Verifie que le champ à bien été remplie et que c'est bien une adresse email -->
                            <?php if (isset($_SESSION['courriel_erreur'])){
    echo '<div class="col-sm-4"></div><div class="col-sm-8 invalid-feedback">'.$_SESSION['identifiant_erreur'].'</div>';
    unset($_SESSION['courriel_erreur']);}
                            ?>
                        </div>
                    </div>
                </fieldset>
            </section>     
                <h4 class="formtitle">Mot de passe</h4>
                <fieldset>
                    <div class="form-group">
                        <div class="form-row">
                            <!-- Cache le mot de passe lors de la saisie -->
                            <label class="col-sm-4" for="password">Password</label>
                            <!-- Verifie que le champ à bien été remplie -->
                            <input class="form-control col-sm-8
                                          <?php if ($erreur_feedback){echo isset($_SESSION['password'])? 'is-invalid' : 'is-valid' ; }
                                          ?>
                                          " type="password" id="pass" name="pass" placeholder="Votre password"
                                          <?php if (isset ($_SESSION['password'])){echo $_SESSION['password'];}
                                          ?> required>
                            <?php if (isset($_SESSION['password_erreur'])){
    echo '<div class="col-sm-4"></div><div class="col-sm-8 invalid-feedback">'.$_SESSION['password_erreur'].'</div>';
    unset($_SESSION['password_erreur']);}
                            ?>
                        </div>
                    </div>
                </fieldset>
            
            <center><p> <button class="btn btn-primary" type="submit" name="valid_contact">Valider</button> </p></center>
        </form>
    </div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>