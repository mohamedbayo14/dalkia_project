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

$reponse = $bdd->query('SELECT message FROM messagerie');



while ($donnees = $reponse->fetch())
{
?>
    <p>
       <br />
       <br />
       <br />
       <br />
    <strong>message</strong> : <?php echo $donnees['message']; ?><br/>
    </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>






?>