<!-- création liste deroulante -->
<select name="nom_inconnu" style="width:130px">
<?php
$bdd=new PDO('mysql:host=localhost;dbname=dalkia_database','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//recherche des nom_entreprise
$requete=$bdd->query("SELECT nom FROM identification WHERE statut='inconnu' ");
while ($donnees = $requete->fetch())
{
?>
<!-- stockage des données dans la liste déroulante -->
<option><?php echo $donnees['nom'] ?></option>
   <?php
}
   ?>
</select>
