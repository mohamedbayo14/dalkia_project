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
      <?php session_start();
         if (!isset($_SESSION['id'])) {
         // pas loguer
        header('location: page_connexion.php');}
        ?>
   
  </head>
</head>
<body>
<br>
<br>

<br>
<!--telechargement du graphique de l'entreprise en fonction de la liste déroulante lorsqu'on appuie sur le bouton valider -->


    
    <div class="row">
        
      
        
        
    
    <style>
    body
    {
     background-image: url("photo/nikon.jpg");
     background-size: cover

    }
        .form1
        {
            /*text-align: left;*/
            position: absolute;
            left: 47%;
             background:#F9F9F9;
             opacity: 0.75;
             padding: 25px;
        }
        
        .form2
        {
            /*text-align: left;*/
             left: 87%;
             background:#F9F9F9;
             opacity: 0.75;
             padding: 30px;
        }
    </style>
    
    <br/>


       <br />
               
       
           
                     <div class="col-sm-4">
        <form class="form1" method="POST" action="download_graph_consommation.php">
            <h2 id="contactForm">Consommation mensuelle</h2>
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
                        <?php include('liste_deroulante_consommation_entreprise.php'); ?>
                    </div>
                </div>
            </fieldset> 
        
                
            <p> <button class="btn btn-primary " type="submit" name="Télécharge">Télécharger</button> </p>
            </form>
                 </div>
            
            <div class="col-sm-4">
      <form class= "form2" method="POST" action="download_graph_comparaison.php">
              <h2 id="contactForm">Comparaison consommation</h2>
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
            <section>
                <h4 class="formtitle">R1 (HT/MWH)*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="R1">R1</label>
                    <input class="form-control col-sm-8" id="R1" name="R1" placeholder="R1 (HT/MWH)" required>
                </div>
            </section>
            <section>
                <h4 class="formtitle">R2 (HT/KWH)*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="R2">R2</label>
                    <input class="form-control col-sm-8" id="R2" name="R2" placeholder="R2 (HT/KWH)" required>
                </div>
                <h4 class="formtitle">Rendement chaudiere Gaz*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="R_GAZ">R_GAZ</label>
                    <input class="form-control col-sm-8" id="R_GAZ" name="R_GAZ" placeholder="Rendement chaudiere Gaz" required>
                </div>
                <h4 class="formtitle">Rendement chaudiere Fioul*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="R_FIOUL">R_FIOUL</label>
                    <input class="form-control col-sm-8" id="R_FIOUL" name="R_FIOUL" placeholder="Rendement chaudiere Fioul" required>
                </div>
                <h4 class="formtitle">Prix HL de fioul*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="Prix_fioul">Prix_fioul</label>
                    <input class="form-control col-sm-8" id="Prix_fioul" name="Prix_fioul" placeholder="Prix de l'HL de fioul" required>
                </div>
                <h4 class="formtitle">Prix MWH gaz*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="Prix_gaz">Prix_gazL</label>
                    <input class="form-control col-sm-8" id="Prix_gaz" name="Prix_gaz" placeholder="Prix du MWH de gaz" required>
                </div>
                <h4 class="formtitle">PCI Fioul*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="PCI_FIOUL">PCI_FIOUL</label>
                    <input class="form-control col-sm-8" id="PCI_FIOUL" name="PCI_FIOUL" placeholder="PCI FIOUL" required>
                </div>
                <h4 class="formtitle">PCI GAZ*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="PCI_GAZ">PCI_GAZ</label>
                    <input class="form-control col-sm-8" id="PCI_GAZ" name="PCI_GAZ" placeholder="PCI GAZ" required>
                </div>
                <h4 class="formtitle">P2 supposé*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="P2_sup">P2 sup</label>
                    <input class="form-control col-sm-8" id="P2_sup" name="P2_sup" placeholder="P2 supposé" required>
                </div>
                <h4 class="formtitle">P3 supposé*</h4>
                <div class="form-group form-row">
                    <label class="col-sm-4" for="P3_sup">P3 sup</label>
                    <input class="form-control col-sm-8" id="P3_sup" name="P3_sup" placeholder="P3 supposé" required>
                </div>
                <h4 class="formtitle">TVA P2/P3*</h4>
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
        
                
    
           
       
   
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>