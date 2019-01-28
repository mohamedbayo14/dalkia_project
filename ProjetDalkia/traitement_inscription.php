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

// insérer une ligne dans la base de données

$requete = $bdd->prepare('INSERT INTO identification(nom,mail, lieu,identifiant,mdp,statut,prenom) VALUES(?,?,?,?,Md5(?),?,?)');
	
// recherche des informations contenues dans les textareas
$requete->execute(array($_POST['nom'],$_POST['courriel'],$_POST['lieu'],$_POST['identifiant'],$_POST['pass'],'inconnu',$_POST['prenom']));
//affichage message de confirmation
echo "<script type='text/javascript'>alert('Votre incription a été envoyé au administrateur. Veuillez attendre vos droits de connexion')</script>";
//affichage de la page inscription
echo "<script type='text/javascript'>document.location.replace('page_inscription.php');</script>";

?>


