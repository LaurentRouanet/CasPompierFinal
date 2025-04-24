<?php
  include("../Include/Entete.inc.php");

  // Script permettant l'inscription d'un pompier depuis la page formulaire.php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
        // Récupération des données du formulaire
        $matricule = $_POST['matricule'];
        //print_r($matricule);
        if($pompierManager->chercherMatricule($matricule)){
            $_SESSION['erreur'] = ("Le matricule existe déjà.");
            header('Location: ../Pages/Formulaire.php');
            exit();
        }

        $date_naissance = $_POST['naissance'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe']; 
        $grade = $_POST['Grade'];
        $telephone = $_POST['tel'];
        $caserne = $_POST['Caserne'];
        $type_pompier = $_POST['type_pompier']; 
        $dateActuelle = date('Y-m-d');
        // Insertion des données dans la table Pompier
        
        try {
            $pompier = new Pompier([
                'Matricule' => $matricule, 
                'DateNaiss' => $date_naissance, 
                'Nom' => $nom, 
                'Prenom' => $prenom, 
                'Sexe' => $sexe, 
                'id' => $grade, 
                'Tel' => $telephone
            ]);
        } catch (InvalidArgumentException $e) {
            header('Location: ../Pages/Formulaire.php');
            exit; // Assure que le script s'arrête après la redirection
        }
        
        try {
            $affectation = new Affectation([
                'Date' => $dateActuelle,
                'Matricule' => $matricule,
                'id' => $caserne
            ]);
        } catch (InvalidArgumentException $e) {
            header('Location: ../Pages/Formulaire.php');
            exit; // Assure que le script s'arrête après la redirection
        }
        
        // Si tout se passe bien, insérer dans la base de données
        $pompierManager->inserer($pompier);
        $affactationManager->add($affectation);

        if ($type_pompier === 'volontaire'){

            $nomEmployeur = $_POST['nom_employeur'];
            $prenomEmployeur = $_POST['prenom_employeur'];
            $telEmployeur = $_POST['tel_employeur'];

            $employeurInfo = $employeurManager->affichageEmployeur();
      
            // Variable pour stocker l'ID de l'employeur trouvé
            $employeurID = 0;
            
            // Parcourir les informations des employeurs pour comparer avec les données du formulaire
              foreach ($employeurInfo as $employeur) {
                  if ($nomEmployeur === $employeur['Nom'] && $prenomEmployeur === $employeur['Prenom'] && $telEmployeur === $employeur['Tel']) {
                      // Si les données du formulaire correspondent à une entrée dans la table Employeur, 
                      // stocker l'ID de l'employeur
                      $employeurID = $employeur['id'];
                      // Sortir de la boucle car nous avons trouvé une correspondance
                      break;
                  }
              }

              if ($employeurID === 0){
                
                $employeur = new Employeur([
                      'Nom' => $nomEmployeur,
                      'Prenom' => $prenomEmployeur,
                      'Tel' => $telEmployeur
                ]);
                
                $employeurManager->insererEmployeur($employeur);

                $employeurInfo = $employeurManager->affichageEmployeur();
                foreach ($employeurInfo as $employeur) {
                    if ($nomEmployeur === $employeur['Nom'] && $prenomEmployeur === $employeur['Prenom'] && $telEmployeur === $employeur['Tel']) {
                        // Si les données du formulaire correspondent à une entrée dans la table Employeur, 
                        // stocker l'ID de l'employeur
                        $employeurID = $employeur['id'];
                        // Sortir de la boucle car nous avons trouvé une correspondance
                        break;
                    }
                }
              }

              $volontaire = new Volontaire([
                'Matricule' => $matricule,
                'id'=> $employeurID

              ]);

              $volontaireManager->inserer($volontaire);
        } else {
            $pro = new Professionnel(['Matricule' => $matricule]);
            $professionnelManager->inserer($pro);
        }
        $journal = fopen('../Log/Journal.log', 'a');

        if ($journal) {
            // Récupération de l'heure actuelle
            $heure = date('d-m-Y H:i:s');

            // Construction du message de journal
            $log_message = "[$heure] Nouvel utilisateur inscrit.\n";
            $log_message .= "[$heure] Matricule: $matricule\n";
            $log_message .= "[$heure] Nom: $nom\n";
            $log_message .= "[$heure] Prénom: $prenom\n";
            $log_message .= "[$heure] Date de naissance: $date_naissance\n";
            $log_message .= "[$heure] Sexe: $sexe\n";
            $log_message .= "[$heure] Grade:".$gradeManager-> getGradeId($grade). "\n";
            $log_message .= "[$heure] Téléphone: $telephone\n";
            $log_message .= "[$heure] Caserne:" . $caserneManager->getCaserneId($caserne) . "\n";

            // Si le type de pompier est volontaire, ajoutez les informations supplémentaires
            if ($type_pompier === 'volontaire') {
                $log_message .= "[$heure] Type de pompier: Volontaire\n";
                $log_message .= "[$heure] Nom de l'employeur: $nomEmployeur\n";
                $log_message .= "[$heure] Prénom de l'employeur: $prenomEmployeur\n";
                $log_message .= "[$heure] Téléphone de l'employeur: $telEmployeur\n";
            } else {
                $log_message .= "[$heure] Type de pompier: Professionnel\n";
            }


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
      header('Location: ../Pages/Formulaire.php');
      exit();
    } catch (PDOException $e) {
        
        $erreurs[] = "Une erreur est survenue lors du traitement de votre demande. Veuillez réessayer plus tard.";
        //var_dump($e->getMessage());
    } catch (Exception $e) {
        // Attrapez toute autre exception non gérée ici
        $erreurs[] = "Une erreur est survenue: " . $e->getMessage();
        //var_dump($e->getMessage());
    }

    //var_dump($erreurs);
}

include ("../Include/PiedDePage.inc.php");
?>