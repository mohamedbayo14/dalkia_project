<!-- création liste deroulante -->
<select name="nom_entreprise" style="width:130px">
<?php
$bdd=new PDO('mysql:host=localhost;dbname=dalkia_database','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//recherche des nom_entreprise
$requete=$bdd->query("SELECT entreprise FROM consommation");
while ($donnees = $requete->fetch())
{
?>
<!-- stockage des données dans la liste déroulante -->
<option><?php echo $donnees['entreprise'] ?></option>
   <?php
}
   ?>
</select>
