<!DOCTYPE html>
<?php
session_start();
//appel de la base de donnée
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dalkia_database;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$id=$_SESSION['id'];
//requête sql pour modifier des données
$requete = $bdd->prepare('UPDATE identification SET identifiant=?, mdp=?, mail=? WHERE id_identification=?');
//recherche des valeurs dans les champs de textes et dans la variables de sessions
$requete->execute(array($_POST['identifiant'],md5($_POST['pass']),$_POST['courriel'],$id));

//message de confirmation
echo "<script type='text/javascript'>alert('Votre incription a été envoyé au administrateur. Veuillez attendre vos droits de connexion')</script>";
echo "<script type='text/javascript'>document.location.replace('page_menu_consommation.php');</script>";
?>
