<?php
include("../Include/Entete.inc.php");
include("../Classes/PompierManager.class.php");

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    if (isset($_GET['matricule'])) {
        $matricule = $_GET['matricule'];
        
        try {
            $pompierManager->supprimerPompier($matricule);
            $_SESSION['success_message'] = "Le pompier a été supprimé avec succès.";
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Erreur lors de la suppression du pompier : " . $e->getMessage();
        }
    } else {
        $_SESSION['error_message'] = "Aucun matricule spécifié.";
    }
    
    header("Location: gestion_pompier.php");
    exit();
} else {
    header("Location: ../Pages/Accueil.php");
    exit();
}
?>