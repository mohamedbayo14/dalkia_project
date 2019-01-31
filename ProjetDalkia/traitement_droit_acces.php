<!DOCTYPE html>
<?php
//appel de la base de donnée
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dalkia_database;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$requete = $bdd->prepare('UPDATE identification SET statut = "utilisateur" WHERE mail=? '); //requete sql pour update les données
$requete->execute(array($_POST['mail_inconnu'])); //recupération de la variable sélectionné dans la liste déroulante
//message de confirmation

echo "<script type='text/javascript'>alert('Les droits ont été attribués')</script>";
//renvoie sur une page
echo "<script type='text/javascript'>document.location.replace('page_droit_acces.php');</script>";
?>