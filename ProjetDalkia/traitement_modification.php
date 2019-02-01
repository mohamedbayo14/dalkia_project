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
$requete=$bdd->prepare('SELECT mail FROM identification WHERE id_identification=?'); //recherche de l'id, mdp, et du type de droit de la personne en fonction de l'identifiant.
$requete->execute(array($id));//recherche de l'identifiant écrit dans le champ de texte
while ($donnees = $requete->fetch())
{
    $mail= $donnees["mail"];   
};
if ($mail==$_POST['mail_id'])
{
    $requete1=$bdd->prepare('SELECT mail FROM identification WHERE id_identification=?'); //recherche de l'id, mdp, et du type de droit de la personne en fonction de l'identifiant.
    $requete1 = $bdd->prepare('UPDATE identification SET mdp=?, mail=? WHERE id_identification=?');
    //recherche des valeurs dans les champs de textes et dans la variables de sessions
    $requete1->execute(array(md5($_POST['pass']),$_POST['courriel'],$id));
    //message de confirmation
    echo "<script type='text/javascript'>alert('Votre identifiant et votre mot de passe ont bien été modifiés.')</script>";
    echo "<script type='text/javascript'>document.location.replace('page_modification.php');</script>";
}
if ($mail!=$_POST['mail_id'])
{
    echo "<script type='text/javascript'>alert('Le mail de connexion est faux.')</script>";
    echo "<script type='text/javascript'>document.location.replace('page_modification.php');</script>";
    
}
?>
