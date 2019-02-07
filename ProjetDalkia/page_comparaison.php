<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <?php
/* Définition de la variable titre pour la page d'accueil */
      $titre_page="Comparaison";
      /* Inclusion de l'en-têtre */
      include 'header.php';?>
      <?php include 'header_commercial.php';?>
      <?php session_start();   
        if (!isset($_SESSION['id'])) {
         // pas loguer
        header('location: page_connexion.php');
}
      ?>

      <title>page inscription</title>
    

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
    <section>
        <div class="row">
            <div class="col-lg-8">

     <h2 id="contactForm">Formulaire de comparaison Dalkia/Gaz/Fioul</h2>
                </div>
        </div>
    </section>

       <br />
        <form method="POST" action="traitement_comparaison.php">
            
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
            <section>
                <h4 class="formtitle">R1 (HT/MWh)</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="R1">R1</label>
                    <input class="form-control col-sm-8" id="R1" name="R1" placeholder="R1 (HT/MWh)" required>
                </div>
            </section>
            <section>
                <h4 class="formtitle">R2 (HT/kWh)</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="R2">R2</label>
                    <input class="form-control col-sm-8" id="R2" name="R2" placeholder="R2 (HT/kWh)" required>
                </div>
                <h4 class="formtitle">Rendement chaudière Gaz</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="R_GAZ">R_GAZ</label>
                    <input class="form-control col-sm-8" id="R_GAZ" name="R_GAZ" placeholder="Rendement chaudière Gaz" required>
                </div>
                <h4 class="formtitle">Rendement chaudière Fioul</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="R_FIOUL">R_FIOUL</label>
                    <input class="form-control col-sm-8" id="R_FIOUL" name="R_FIOUL" placeholder="Rendement chaudière Fioul" required>
                </div>
                <h4 class="formtitle">Prix HL de fioul</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="Prix_fioul">Prix_fioul</label>
                    <input class="form-control col-sm-8" id="Prix_fioul" name="Prix_fioul" placeholder="Prix de l'HL de fioul" required>
                </div>
                <h4 class="formtitle">Prix MWh gaz</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="Prix_gaz">Prix_gazL</label>
                    <input class="form-control col-sm-8" id="Prix_gaz" name="Prix_gaz" placeholder="Prix du MWh de gaz" required>
                </div>
                <h4 class="formtitle">PCI Fioul</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="PCI_FIOUL">PCI_FIOUL</label>
                    <input class="form-control col-sm-8" id="PCI_FIOUL" name="PCI_FIOUL" placeholder="PCI FIOUL" required>
                </div>
                <h4 class="formtitle">PCI GAZ</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="PCI_GAZ">PCI_GAZ</label>
                    <input class="form-control col-sm-8" id="PCI_GAZ" name="PCI_GAZ" placeholder="PCI GAZ" required>
                </div>
                <h4 class="formtitle">P2 supposé</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="P2_sup">P2 sup</label>
                    <input class="form-control col-sm-8" id="P2_sup" name="P2_sup" placeholder="P2 supposé" required>
                </div>
                <h4 class="formtitle">P3 supposé</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="P3_sup">P3 sup</label>
                    <input class="form-control col-sm-8" id="P3_sup" name="P3_sup" placeholder="P3 supposé" required>
                </div>
                <h4 class="formtitle">TVA P2/P3</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="TVA">TVA</label>
                    <input class="form-control col-sm-8" id="TVA" name="TVA" placeholder="TVA pour le P2/P3" required>
                </div>
            </section>
            <center>
            <p> <button class="btn btn-primary " type="submit" name="Afficher la comparaison">Comparaison</button> </p>
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
