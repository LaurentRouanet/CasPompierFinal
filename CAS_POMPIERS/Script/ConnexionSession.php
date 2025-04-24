<?php
include("../Include/Entete.inc.php");

// Script permettant la connexion et la récupération des informations de l'utilisateur issu du formulaire de la page connexion.php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if ($utilisateur=$userManager->getUser($_POST['mail']))
  {
    if ($utilisateur['mdp'] == md5($_POST['motDePasse1']))
    {
      session_start ();
      $_SESSION['login'] = true;
      $_SESSION['TypeUtilisateur'] = $utilisateur['type'];
      $_SESSION['prenomUtilisateur'] = $utilisateur['prenom'];
      $_SESSION['nomUtilisateur'] = $utilisateur['nom'];
      header('Location: ../Pages/accueil.php');
    }else{
      //echo "<div class='container'>";
      //echo "<p>Le mot de passe fourni est : " . md5($_POST['motdepasse']) . "</p>";
      $_SESSION['erreur_mdp'] = "Mot de passe incorrect";
      header('Location: ../Pages/Connexion.php');
      
    }
  }else{
    header('Location: ../Pages/Connexion.php');
    $_SESSION['erreur_mail'] = "Mail invalide";
  }
}

include ("../Include/PiedDePage.inc.php");
?>