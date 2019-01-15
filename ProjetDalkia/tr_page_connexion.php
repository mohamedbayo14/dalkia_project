<?php
$bdd=new PDO('mysql:host=localhost;dbname=dalkia_database','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete=$bdd->prepare('SELECT nom_entreprise,mdp,statut FROM identification WHERE identifiant=?');
$requete->execute(array($_POST['identifiant']));

while ($donnees = $requete->fetch())
{
    $nom_entreprise= $donnees['nom_entreprise'] ;
	$password= $donnees['mdp'];
    $statut= $donnees['statut'] ;
    
}   

if (($password == md5($_POST['pass'])) && ($statut=='client'))
{
    session_start();
    $_SESSION['entreprise'] = $nom_entreprise;
    echo "<script type='text/javascript'>document.location.replace('consommation_client.php');</script>";
}
elseif (($password == $_POST['pass']) && ($statut=='admin'))
{
    echo "<script type='text/javascript'>document.location.replace('page_accueil.php');</script>";
}
else
{
    echo "<script type='text/javascript'>alert('Mauvais identifiant ou mot de passe')</script>";
    echo "<script type='text/javascript'>document.location.replace('page_connexion.php');</script>";
}
    
?>