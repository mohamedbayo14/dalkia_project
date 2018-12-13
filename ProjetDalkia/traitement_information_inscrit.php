<?php
$i=0;
$tab=array();
$pdo=new PDO('mysql:host=localhost;dbname=dalkia_database','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$sql=('SELECT nom,mail,lieu,prenom,statut FROM identification '); // requête pour lire dans la base de donnée
$req = $pdo->query($sql); 

?>