<?php
session_start();
session_destroy();//on casse la session durant la deconnexion
header('location: page_connexion.php');//renvoie à la page de connexion
exit;
?>