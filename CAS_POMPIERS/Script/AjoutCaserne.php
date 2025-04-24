<?php
require_once '../Include/Entete.inc.php';

// Script permettant l'ajout d'une caserne issu du formulaire de la page admin.php

// Vérification si le formulaire a été soumis via la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['nom']) && !empty($_POST['id'] && !empty($_POST['nom']))) {
        
        
        $idCaserne = $caserneManager->getCaserneVérification($_POST['id']);
        $nomCaserne = $caserneManager->getCaserneNom($_POST['nom']);

        print_r($idCaserne);
        if($idCaserne !== false && $idCaserne == $_POST['id']){
            $_SESSION['error_message'] = "Id caserne déjà présent.";
            header("Location: ../Pages/Admin.php");
            exit();
        }elseif($nomCaserne!== false && $nomCaserne== $_POST['nom']){
            $_SESSION['error_message'] = "Nom caserne déjà présent.";
            header("Location: ../Pages/Admin.php");
            exit();
        }else{

            $ajoutCaserne = new Caserne([
                'id' => $_POST['id'],
                'Nom'  => $_POST['nom']
            ]);
            
            $caserneManager -> add($ajoutCaserne);
            $_SESSION['success_message'] = "La caserne a été crée.";
            $journal = fopen('../Log/Journal.log', 'a');
            $heure = date('d-m-Y H:i:s');

            // Écrire dans le fichier journal
            $log_message = "[$heure] {$_SESSION['prenomUtilisateur']} {$_SESSION['nomUtilisateur']} crée une caserne.\n";
            $log_message .= "[$heure] ID caserne: {$_POST['id']}\n";
            $log_message .= "[$heure] Caserne: {$_POST['nom']}\n";
            fwrite($journal, $log_message);
            fclose($journal);

            header("Location: ../Pages/Admin.php");
            exit();

        }
       
    }else {
        // Gestion de l'erreur si tous les champs du formulaire ne sont pas remplis
        $_SESSION['error_message'] = "Veuillez remplir tous les champs du formulaire.";
        header("Location: ../Pages/Admin.php");
        exit();
    }
}

require_once '../Include/PiedDePage.inc.php';
?>