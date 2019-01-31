<!-- création liste deroulante -->
<select name="mail_utilisateur" style="width:130px">
<?php
$bdd=new PDO('mysql:host=localhost;dbname=dalkia_database','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//recherche des nom_entreprise
$requete=$bdd->query("SELECT mail FROM identification");
while ($donnees = $requete->fetch())
{
?>
<!-- stockage des données dans la liste déroulante -->
<option><?php echo $donnees['mail'] ?></option>
   <?php
}
   ?>
</select>
