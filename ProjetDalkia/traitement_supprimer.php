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
//$mail_utilisateur = $_POST['mail_utilisateur'];
//var reponse = window.confirm("Etes-vous sur de vouloir supprimer cette entrée ?");
//if(reponse)
//{
// alert("Oui");
$requete = $bdd->prepare('DELETE FROM identification WHERE mail=? '); //requete sql pour update les données
$requete->execute(array($_POST['mail_utilisateur'])); //recupération de la variable sélectionné dans la liste déroulante
//message de confirmation
echo "<script type='text/javascript'>alert('Un utilisateur a été supprimé')</script>";
//renvoie sur une page
echo "<script type='text/javascript'>document.location.replace('supprimer.php');</script>";
//}
//else
//{
//  alert("Non");
//    echo "Vous n'avez pas supprimé l'entrée";
//}
?>