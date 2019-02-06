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
$password = $_POST['pass'];
if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{7,}$#', $password)) 
{
//requête sql pour modifier des données
$requete = $bdd->prepare('UPDATE identification SET mdp=?, mail=? WHERE id_identification=?');
//recherche des valeurs dans les champs de textes et dans la variables de sessions
$requete->execute(array(md5($_POST['pass']),$_POST['courriel'],$id));

//message de confirmation
echo "<script type='text/javascript'>alert('Votre identifiant et votre mot de passe ont bien été modifiés')</script>";
echo "<script type='text/javascript'>document.location.replace('page_menu_consommation.php');</script>";
}
else
    {
     echo "<script type='text/javascript'>alert('Mot de passe non conforme')</script>";
//affichage de la page inscription
    echo "<script type='text/javascript'>document.location.replace('page_modification.php');</script>";
}
?>
