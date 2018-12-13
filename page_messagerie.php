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

      <title>Messagerie</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="design.css">
  </head>
    
    <!--------------------------------------------------------------------------------- Stocker des mails dans la BDD ---------------------------------------------------------------------------------------------------> 
    
  <body>
      
 <div>
     
       <form action="tr_page_messagerie.php" method="POST">    
            
       <br />
       <br />
       <br />
       <br />
            
       <label for="form-message">Message :</label>
       <textarea id="messagerie" name="mess" class="messagerie" rows="5" cols="25"></textarea>

       <label for="form-message">Email destinataire:</label>
       <input type="email" name ="mail_dest" id ="mail_d" required/>
       
       <label for="form-message">Email expéditeur:</label>
       <input type="email" name ="mail_exp" id ="mail_e" required/>
       
       <input type="submit" value="Envoyer"/>         
     
       </form>
      
 </div>
         
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>

    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------> 

</html>