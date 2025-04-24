<?php
require_once '../Include/Entete.inc.php';

$journal = fopen('../Log/Journal.log', 'a');


// Script permettant la modification d'un véhicule depuis modification_Engin.php

if ($journal) {
    
    $heure = date('d-m-Y H:i:s');

    // Vérifier si le formulaire a été soumis via la méthode POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            
            $enginAvant = $typeEnginManager->affichageTypeEnginId($_POST['id']);

            // Récupérer l'ID, le libellé et l'URL de l'image de l'objet avant la mise à jour
            $idAvant = $enginAvant['id'];
            $libelleAvant = $enginAvant['Libellé'];
            $urlPhotoAvant = $enginAvant['Url_Image'];

           
            $id = $idAvant;
            $libelle = $libelleAvant;
            $urlPhoto = $urlPhotoAvant;

            // Vérifier s'il y a une nouvelle image à télécharger
            if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
                // Supprimer l'ancienne image
                unlink($urlPhotoAvant);

                // Générer un identifiant unique pour la nouvelle image
                $identifiantUnique = substr(uniqid(), 0, 10);
                $urlPhoto = '../Images/Vehicule/' . $identifiantUnique;
            }

            // Mettre à jour le libellé si fourni dans le formulaire
            if (isset($_POST['libelleEngin']) && !empty($_POST['libelleEngin'])) {
                $libelle = $_POST['libelleEngin'];
            }

            // Mettre à jour les données de l'objet dans la base de données
            $enginData = new TypeEngin([
                'id' => $id,
                'Libelle' => $libelle,
                'Url_Image' => $urlPhoto
            ]);

            $typeEnginManager->updateTypeEnginId($enginData);

            // Vérification si un fichier a été téléchargé et le télécharger sur le serveur
            if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                move_uploaded_file($_FILES['photo']['tmp_name'], $urlPhoto);
            }

            // Écrire dans le fichier journal les détails de la mise à jour
            $log_message = "[$heure] {$_SESSION['prenomUtilisateur']} {$_SESSION['nomUtilisateur']} a mis à jour un engin.\n";
            $log_message .= "[$heure] ID de l'engin avant la mise à jour: {$idAvant}\n";
            $log_message .= "[$heure] Libellé de l'engin avant la mise à jour: {$libelleAvant}\n";
            $log_message .= "[$heure] URL de l'engin avant la mise à jour: {$urlPhotoAvant}\n";
            $log_message .= "[$heure] ID de l'engin après la mise à jour: {$id}\n";
            $log_message .= "[$heure] Libellé de l'engin après la mise à jour: {$libelle}\n";
            $log_message .= "[$heure] URL de l'engin après la mise à jour: {$urlPhoto}\n";
            fwrite($journal, $log_message);

            // Redirection vers la page des véhicules avec un message de succès
            $_SESSION['success_message'] = "L'engin a été modifié.";
            fclose($journal);
            header("Location: ../Pages/Vehicule.php");
            exit();
        }
    } else {
        // Gérer l'erreur si l'ID de l'objet n'est pas correct ou si le formulaire n'a pas été soumis via POST
        $_SESSION['error_message'] = "L'ID de l'engin n'est pas correct ou le formulaire n'a pas été soumis.";
        fclose($journal);
        header("Location: ../Pages/Vehicule.php");
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