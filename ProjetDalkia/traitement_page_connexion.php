<?php
//appel de la base de donnée
$bdd=new PDO('mysql:host=localhost;dbname=dalkia_database','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$requete=$bdd->prepare('SELECT id_identification,mdp,statut FROM identification WHERE mail=?'); //recherche de l'id, mdp, et du type de droit de la personne en fonction de l'identifiant.
$requete->execute(array($_POST['identifiant']));//recherche de l'identifiant écrit dans le champ de texte


while ($donnees = $requete->fetch())// on sort les informations de la base de donnée pour les stocker dans une variable
{
    $id_identification= $donnees['id_identification'] ;
	$password= $donnees['mdp'] ;
    $statut= $donnees['statut'] ;
}  

if (!isset($password)){
    echo "<script type='text/javascript'>alert('Mauvais identifiant/mot de passe ou compte non validé')</script>";
    echo "<script type='text/javascript'>document.location.replace('page_connexion.php');</script>";
}


if ($password == md5($_POST['pass']) && ($statut=='utilisateur')) //condition si la personne qui se connecte est un commercial
    {

    session_start();
    $_SESSION['id'] = $id_identification; // stockage en variable globale
    echo "<script type='text/javascript'>document.location.replace('page_menu_consommation.php');</script>";//appel du menu de consommation
}
elseif (($password == md5($_POST['pass'])) && ($statut=='admin'))
{
    session_start();
    $_SESSION['id'] = $id_identification; // stockage en variable globale
    echo "<script type='text/javascript'>document.location.replace('page_information_inscrit.php');</script>";//appel du menu administrateur
    
}
else
{
    //alerte si erreur lors de la saisie ou la personne n'a pas de drois d'accès
    echo "<script type='text/javascript'>alert('Mauvais identifiant/mot de passe ou compte non validé')</script>";
    echo "<script type='text/javascript'>document.location.replace('page_connexion.php');</script>";
}

?>