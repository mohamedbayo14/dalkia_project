<?php
$i=0;
$tab=array();
$pdo=new PDO('mysql:host=localhost;dbname=dalkia_database','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$sql=('SELECT mail,statut FROM identification '); // requête pour lire dans la base de donnée
$req = $pdo->query($sql); 

?>