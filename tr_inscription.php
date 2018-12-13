<!DOCTYPE html>
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dalkia_database;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$requete = $bdd->prepare('INSERT INTO identification(nom_entreprise,mail, lieu,identifiant,mdp,statut) VALUES(?,?,?,?,MD5(?),?)');
$requete->execute(array($_POST['nom'],$_POST['courriel'],$_POST['lieu'],$_POST['identifiant'],$_POST['pass'],'inconnu'));

echo "<script type='text/javascript'>alert('Votre incription a été envoyé au administrateur. Veuillez attendre vos droits de connexion')</script>";
echo "<script type='text/javascript'>document.location.replace('inscription.php');</script>";
?>
