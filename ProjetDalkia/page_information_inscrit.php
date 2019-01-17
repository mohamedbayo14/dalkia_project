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
      <?php session_start();   ?>
      <!-- appel de la page traitement_information_inscrit.php qui va permettre de créer le tableau  -->
      <?php include('traitement_information_inscrit.php'); ?> 
      
      

   
  </head>
</head>
    
<body>
<style>

    body
    {
     background-image: url("photo/conception.jpg");
     background-size: cover
    }

</style>

<br><br><br>

<br><br><br><h1> Information des inscrits</h1><br><br>


<!-- Création du tableau apdatative-->
<table class="table table-bordered" {
}>
<!-- Création des colonnes -->
<tr>
    <th><p class="text-error">Nom</p></th>
    <th><p class="text-error">Prénom</p></th>
    <th><p class="text-error">Adresse mail</p></th>
    <th><p class="text-error">Lieu</p></th>
    <th><p class="text-error">Statut</p></th>
</tr>
<tr>
<!-- Remplissage du tableau en fonction des données resorties de la base de données -->
<?php while($row = $req->fetch()) { ?>
        <td><?php echo $row['nom']; ?></td>
        <td><?php echo $row['prenom']; ?></td>
        <td><?php echo $row['mail']; ?></td>
        <td><?php echo $row['lieu']; ?></td>
        <td><?php echo $row['statut']; ?></td>
</tr>
<?php }   
$req->closeCursor();   
?>


 </table>  
<style>
table {
  font-family: arial, sans-serif;
  border-color:black;
  border-collapse: collapse;
  
  width: 100%;
}

tr {
    background-color: aliceblue;
    opacity : 0.65;
    text-align: left;
    padding: 8px;
}

 th, td { color:black;
     
     text-align: left;
     padding: 8px;
    
}
</style>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>