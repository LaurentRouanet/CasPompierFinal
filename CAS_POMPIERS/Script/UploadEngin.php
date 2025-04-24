<?php
require_once '../Include/Entete.inc.php';


// Script permettant l'ajout'd'un véhicule depuis ajout_Vehicule.php

// Vérification si le formulaire a été soumis via la méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $journal = fopen('../Log/Journal.log', 'a');
    // Vérification des champs du formulaire
    if (isset($_POST['idTypeEngin'], $_POST['libelleEngin'], $_FILES['photo']) && !empty($_POST['idTypeEngin'])) {
        // Génération d'un identifiant unique pour l'image
        $identifiantUnique = substr(uniqid(), 0, 10);
        $urlPhoto = '../Images/Vehicules/' . $identifiantUnique;

        // Vérification si l'engin existe déjà dans la base de données
        $typeEngins = $typeEnginManager->affichageTypeEngin();
        $enginExiste = false;
        foreach ($typeEngins as $typeEngin) {
            if ($typeEngin['id'] === $_POST['idTypeEngin']) {
                $enginExiste = true;
                break;
            }
        }
        if ($enginExiste) {
            $_SESSION['error_message'] = "L'engin existe déjà.";
            header("Location: ../Pages/AjoutVehicule.php");
            exit();
        } else {
            // Préparation des données de l'engin pour l'ajout à la base de données
            $enginData = new TypeEngin([
                'id' => $_POST['idTypeEngin'],
                'Libelle' => $_POST['libelleEngin'],
                'Url_Image' => $urlPhoto
            ]);

            // Vérification du type MIME du fichier
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES['photo']['tmp_name']);
            finfo_close($finfo);

            // Liste des types MIME autorisés
            $typesMIMEAutorises = array('image/png', 'image/jpeg', 'image/jpg');

            if (!in_array($mime, $typesMIMEAutorises)) {
                $_SESSION['error_message'] = "Le type de fichier n'est pas autorisé. Veuillez télécharger une image PNG ou JPEG.";
                fclose($journal);
                header("Location: ../Pages/AjoutVehicule.php");
                exit();
            }

            // Vérification si le fichier a bien été téléchargé
            if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                // Téléversement du fichier sur le serveur
                move_uploaded_file($_FILES['photo']['tmp_name'], $urlPhoto);
               
                // Insertion des données dans la base de données
                $typeEnginManager->insererTypeEngin($enginData);
                
                $heure = date('d-m-Y H:i:s');
                
                // Écrire dans le fichier journal
                $log_message = "[$heure] {$_SESSION['prenomUtilisateur']} {$_SESSION['nomUtilisateur']} a créé un nouvel engin.\n";
                $log_message .= "[$heure] ID de l'engin: {$_POST['idTypeEngin']}\n";
                $log_message .= "[$heure] Libellé de l'engin: {$_POST['libelleEngin']}\n";
                $log_message .= "[$heure] Chemin de l'engin: {$urlPhoto}\n";
                fwrite($journal, $log_message);
                fclose($journal);
                // Redirection avec un message de succès
                $_SESSION['success_message'] = "L'engin a été créé.";
                header("Location: ../Pages/AjoutVehicule.php");
                exit();
            } else {
                // Gestion de l'erreur si le fichier n'a pas été correctement téléchargé
                $_SESSION['error_message'] = "Une erreur s'est produite lors du téléchargement du fichier.";
                fclose($journal);
                header("Location: ../Pages/AjoutVehicule.php");
                exit();
            }
        }
    } else {
        // Gestion de l'erreur si tous les champs du formulaire ne sont pas remplis
        $_SESSION['error_message'] = "Veuillez remplir tous les champs du formulaire.";
        fclose($journal);
        header("Location: ../Pages/AjoutVehicule.php");
        exit();
    }
} else {
    // Redirection si le formulaire n'a pas été soumis via POST
    fclose($journal);
    header("Location: ../Pages/AjoutVehicule.php");
    exit();
}

require_once '../Include/PiedDePage.inc.php';
?>