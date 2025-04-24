<?php
require_once '../Include/Entete.inc.php';

// Script permettant suppression d'une caserne depuis admin.php

$journal = fopen('../Log/Journal.log', 'a');

if ($journal) {
    
    $heure = date('d-m-Y H:i:s');

    if (isset($_POST['Caserne'])) {
        try {
            $nomCaserne =  $caserneManager->getCaserneId($_POST['Caserne']);
            $caserneManager->suppressionCaserne($_POST['Caserne']);

            // Écrire dans le fichier journal
            $log_message = "[$heure] {$_SESSION['prenomUtilisateur']} {$_SESSION['nomUtilisateur']} a supprimé une caserne.\n";
            $log_message .= "[$heure] L'ID de la caserne a été supprimé: {$_POST['Caserne']}\n";
            $log_message .= "[$heure] Nom de la caserne supprimé: {$nomCaserne}\n";
            fwrite($journal, $log_message);

            $_SESSION['success_Caserne'] = "La caserne a été supprimé.";
            fclose($journal);
            header("Location: ../Pages/Admin.php");
            exit();
        } catch (Exception $e) {
            // Gérer l'erreur en cas d'échec de la suppression
            fclose($journal);
            echo '<p class="custom-margin-top-6">Une erreur est survenue : ' . $e->getMessage() . '</p>';
            $_SESSION['error_caserne'] = "Erreur lors de la suppression de la caserne";
        }
    } else {

        $_SESSION['error_caserne'] = "Erreur lors de la suppression de la caserne";
        header("Location: ../Pages/Admin.php");
        fclose($journal);
        exit();
    }

    // Fermer le fichier journal
    fclose($journal);
} else {
    // Gérer l'erreur si l'ouverture du fichier journal a échoué
    error_log("Erreur : Impossible d'ouvrir le fichier journal.", 0);
}

require_once '../Include/PiedDePage.inc.php';
?>