<?php
require_once '../Include/Entete.inc.php';

// Script permettant suppression d'une affection d'un véhicule depuis suppressionVéhiculeCaserne.php

// Vérifier si la variable POST contient l'ID de l'objet à supprimer
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['numero'], $_POST['typeEnginId'], $_POST['caserneId']) && !empty($_POST['numero'] && !empty($_POST['typeEnginId']) && !empty($_POST['caserneId']))) {

        $numero = $_POST['numero'];
        $typeEngin =  $_POST['typeEnginId'];
        $caserne = $_POST['caserneId'];
     
        try {
            // Suppression de l'objet dans la base de données
            $enginManager->suppressionId($typeEngin ,$caserne, $numero );
            
            $journal = fopen('../log/Journal.log', 'a');
            $heure = date('d-m-Y H:i:s');
            // Écrire dans le fichier journal
            $log_message = "[$heure] {$_SESSION['prenomUtilisateur']} {$_SESSION['nomUtilisateur']} retirer un véhicule d'une caserne.\n";
            $log_message .= "[$heure] Le véhicule: {$typeEngin} immatriculé {$typeEngin} a était supprimé de la caserne {$caserne}\n";
            fwrite($journal, $log_message);

            fclose($journal);
            $_SESSION['success_message'] = "Le véhicule a été désaffecté.";
            header("Location: ../Pages/SuppressionVehiculeCaserne.php");
            exit();
        } catch (Exception $e) {
            // Gérer l'erreur en cas d'échec de la suppression
            fclose($journal);
            echo '<p class="custom-margin-top-6">Une erreur est survenue : ' . $e->getMessage() . '</p>';
        }
        header("Location: ../Pages/SuppressionVehiculeCaserne.php");
    } else {
        
        header("Location: ../Pages/SuppressionVehiculeCaserne.php");
       $_SESSION['success_message'] = "Erreur";
        exit();
    }

    // Fermer le fichier journal
}

require_once '../Include/PiedDePage.inc.php';
?>