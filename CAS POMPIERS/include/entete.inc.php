<?php
  // Gestion de la session
  if (!isset($_SESSION))
  {
    session_start();
  }
  if (!isset($_SESSION['login']))
  {
    $_SESSION['login'] = False;
  }

  require_once ('../include/connection.inc.php');
  require_once ("../include/mesFonction.inc.php");

  // Pour le chargement automatique des classes
  function chargerClasse($classname)
  {
    require '../Classes/'.$classname.'.class.php';
  }
  spl_autoload_register('chargerClasse');

  $manager = new UserManager($db);

  if (isset($_POST['deconnexion']))
  {
    session_unset ();
    session_destroy ();
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cas Pompier 2024</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Liaison au fichier css de Bootstrap -->
	<link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
	<style>
		.carousel-item
		{
			width: 100%;
			height: auto;
			background-color:#5f666d;
			color:white;
		}
	</style>
</head>
<body>
  <header>
    
    <?php 
      include("menu.inc.php"); 
    ?>
  </header>