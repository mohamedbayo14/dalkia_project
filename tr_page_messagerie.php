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


$requete = $bdd->prepare('INSERT INTO messagerie(message, id_client, mail_destinataire, mail_expediteur) VALUES(?,?,?,?)');
$requete->execute(array($_POST['mess'], 1, $_POST['mail_dest'],$_POST['mail_exp']));


?>
