<?php
require_once '../Include/Entete.inc.php';

// Script permettant l'ajout d'un engin a une caserne issu du formulaire de la page ajoutVehiculeCaserne.php

// Vérification si le formulaire a été soumis via la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['vehicule'], $_POST['Caserne'], $_POST['numeroEngin']) && !empty($_POST['vehicule'] && !empty($_POST['Caserne']) && !empty($_POST['numeroEngin']))) {
        
        
        

        if($enginManager->affectionId($_POST['vehicule'], $_POST['Caserne'], $_POST['numeroEngin'])){
            $_SESSION['error_message'] = "Ce numéro de véhicule est déjà affecter à cette caserne.";
            header("Location: ../Pages/AjoutVehiculeCaserne.php");
            exit();
        }else{

            $affectationEngin = new Engin([
                'Numéro' => $_POST['numeroEngin'],
                'Caserne_id'  => $_POST['Caserne'],
                'Type_Engin_id' => $_POST['vehicule']
            ]);
            
            $enginManager -> insererEngin($affectationEngin);
            $_SESSION['success_message'] = "Le véhicule a été affecté.";
            $journal = fopen('../Log/Journal.log', 'a');
            $heure = date('d-m-Y H:i:s');

            $caserneLibellé = $caserneManager->getCaserneId($_POST['Caserne']);
            // Écrire dans le fichier journal
            $log_message = "[$heure] {$_SESSION['prenomUtilisateur']} {$_SESSION['nomUtilisateur']} a affecté un véhicule à une caserne.\n";
            $log_message .= "[$heure] ID du véhicule: {$_POST['vehicule']}\n";
            $log_message .= "[$heure] Caserne: {$caserneLibellé}\n";
            $log_message .= "[$heure] Numéro du véhicule: {$_POST['numeroEngin']}\n";
            fwrite($journal, $log_message);
            fclose($journal);

            header("Location: ../Pages/AjoutVehiculeCaserne.php");
            exit();

        }
       
    }else {
        // Gestion de l'erreur si tous les champs du formulaire ne sont pas remplis
        $_SESSION['error_message'] = "Veuillez remplir tous les champs du formulaire.";
        header("Location: ../Pages/AjoutVehiculeCaserne.php");
        exit();
    }
}

require_once '../Include/PiedDePage.inc.php';
?>