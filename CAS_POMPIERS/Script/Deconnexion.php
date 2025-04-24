<?php
include("../Include/Entete.inc.php");

session_destroy();

// Script permettant la deconnexion d'un utilisateur
header("Location: ../Pages/Accueil.php");
exit();
include ("../Include/PiedDePage.inc.php");
?>