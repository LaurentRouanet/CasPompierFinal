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

  ob_start();
  require_once ('Connexion.inc.php');
  require_once ('MesFonctions.inc.php');

  // Pour le chargement automatique des classes
  function chargerClasse($classname)
  {
    require '../Classes/'.$classname.'.class.php';
  }
  spl_autoload_register('chargerClasse');

  $gradeManager = new GradeManager($db);
  $caserneManager = new CaserneManager($db);
  $pompierManager = new PompierManager($db);
  $volontaireManager = new VolontaireManager($db);
  $professionnelManager = new ProfessionnelManager($db);
  $employeurManager = new EmployeurManager($db);
  $enginManager = new EnginManager($db);
  $typeEnginManager = new TypeEnginManager($db);
  $userManager = new UserManager($db);
  $affactationManager = new AffectationManager($db);

  /*if (isset($_POST['deconnexion']))
  {
    session_unset ();
    session_destroy ();
    header('Location: ../pages/formulaire.php');
  }*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pompier</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Liaison au fichier css de Bootstrap -->
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="../bootstrap/css/style.css" rel="stylesheet">
  <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />-->
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
    <?php include ("Menu.inc.php"); ?>
  </header>