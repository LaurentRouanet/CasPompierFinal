<?php
include("../Include/Entete.inc.php");
// Script permettant l'inscription d'un utilisateur a l'application depuis la page inscription.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
        if ($_POST['motDePasse1'] !== $_POST['motDePasse2']) {
            $_SESSION['erreurMotDePasse'] = "Les mots de passe ne sont pas identiques.";
            header("Location: ../Pages/inscription.php");
            exit();
        }
        if ($userManager->getUser($_POST['mail']))
        {
            $_SESSION['erreurMail'] = "Le mail existe déjà.";
            header("Location: ../Pages/Inscription.php");
            exit();
        }
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['mail'];
        $mdp = $_POST['motDePasse1'];

        $utilisateur = new User([
           'nom' =>  $nom,
           'prenom' =>  $prenom,
           'mail' => $email,
           'mdp' => $mdp
        ]);

        $userManager ->add($utilisateur);
        $journal = fopen('../Log/Journal.log', 'a');

        if ($journal) {
            // Récupération de l'heure actuelle
            $heure = date('d-m-Y H:i:s');

            // Construction du message de journal
            $log_message = "[$heure] Nouvel utilisateur inscrit.\n";
            $log_message .= "[$heure] Nom: $nom\n";
            $log_message .= "[$heure] Prénom: $prenom\n";
            $log_message .= "[$heure] Email: $email\n";
            $log_message .= "[$heure] Type: " . $userManager -> getType($email) ."\n";

            // Écriture du message de journal dans le fichier
            fwrite($journal, $log_message);

            // Fermeture du fichier journal
            fclose($journal);
        } else {
            // Gérer l'erreur si l'ouverture du fichier journal a échoué
            error_log("Erreur : Impossible d'ouvrir le fichier journal pour l'inscription.", 0);
            header('Location: ../Pages/Accueil.php');
        }
        $_SESSION['success_message'] = "L'utilisateur a été crée.";
        header('Location: ../Pages/Inscription.php');
        exit();
       
    }catch (InvalidArgumentException $e) {
        
        $_SESSION['erreur_formulaire'] = "Une erreur est survenue : " . $e->getMessage();
        header('Location: ../Pages/Inscription.php');
        exit();
    }
}

include ("../Include/PiedDePage.inc.php");
?>