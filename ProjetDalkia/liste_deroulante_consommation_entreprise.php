<!-- création liste deroulante -->
<select name="nom_entreprise" style="width:130px">
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dalkia_database;charset=utf8', 'root','');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

//recherche des nom_entreprise
$requete=$bdd->query("SELECT Entreprise FROM conso_mensuelle");
while ($donnees = $requete->fetch())
{
?>
<!-- stockage des données dans la liste déroulante -->
<option><?php echo $donnees['Entreprise'] ?></option>
   <?php
}
   ?>
</select>
