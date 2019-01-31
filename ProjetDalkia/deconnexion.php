<?php
session_start();
$_SESSION = array();
session_destroy();//on casse la session durant la deconnexion
header('location: page_connexion.php');//renvoie à la page de connexion
exit;
?>