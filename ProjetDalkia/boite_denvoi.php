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
      <?php include 'menu.php';?>
      <?php session_start();   ?>

      <title>boite d'envoi</title>
      <link rel="stylesheet" href="design.css">
  </head>
    
    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------> 
    
 <body style="background-image: url('Catalina.jpg'); background-size: cover; height: 100%;  ">

     <div class="contact-title" >
         
       <br />
       <br />
       <br />
       <br />
       <br />
       <br />
     
     <h1>Say hello</h1>
     <h2>We are always ready to serve you!</h2>
     
     </div>
     
     <div class="contact-form">
        <form action = "tr_boite_denvoi.php" id="contact-form" method="post">
            
            <input name="name" type="text" class="form-control" placeholder="from :" required><br>
            <input name="email" type="email" class="form-control" placeholder="To :" required><br>
            <textarea name="messageToSend" class="form-control" placeholder="your Message..." rows="4" required></textarea><br>
            <input type="submit" class="form-control submit" value="ENVOYER">
            
         </form>    
     </div>
    
         
       
  </body>

    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------> 

</html>