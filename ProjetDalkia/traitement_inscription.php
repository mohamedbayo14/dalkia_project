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
$password = $_POST['pass'];
if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{7,}$#', $password)) 
{
    // insérer une ligne dans la base de données
    $requete = $bdd->prepare('INSERT INTO identification(mail,mdp,statut) VALUES(?,Md5(?),?)');	
    // recherche des informations contenues dans les textareas
    $requete->execute(array($_POST['courriel'],$_POST['pass'],'inconnu'));
    //affichage message de confirmation
    echo "<script type='text/javascript'>alert('Votre incription a été envoyée aux administrateurs. Veuillez attendre vos droits de connexion')</script>";
//affichage de la page inscription
    echo "<script type='text/javascript'>document.location.replace('page_inscription.php');</script>";
}
else 
{
     echo "<script type='text/javascript'>alert('Mot de passe non conforme.Veuillez recommencer avec un mot de passe conforme.')</script>";
//affichage de la page inscription
    echo "<script type='text/javascript'>document.location.replace('page_inscription.php');</script>";
} 



?>


