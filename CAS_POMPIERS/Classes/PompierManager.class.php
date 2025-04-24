<?php
class PompierManager

/**
 * Classe PompierManager
 * 
 * Il s'agit du manager de la classe pompier.
 * Elle permet de gérer les methodes relatives à la gestion des pompiers.
 */
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }
    
    public function inserer(Pompier $pompier)
    {
        // Vérifier si tous les attributs requis sont définis
        if (!$pompier->getMatricule() || !$pompier->getNom() || !$pompier->getPrenom() || !$pompier->getDateNaiss() || !$pompier->getTel() || !$pompier->getSexe() || !$pompier->getId()) {
            throw new Exception("Tous les attributs requis doivent être définis avant d'insérer dans la base de données.");
        }
    
        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO pompier (Matricule, Nom, Prénom, DateNaiss, Tel, Sexe, id) VALUES (:matricule, :nom, :prenom, :dateNaiss, :tel, :sexe, :id)");
    
        // Liaison des valeurs avec les paramètres de la requête
        $valeurs = array(
            ':matricule' => $pompier->getMatricule(),
            ':nom' => $pompier->getNom(),
            ':prenom' => $pompier->getPrenom(),
            ':dateNaiss' => $pompier->getDateNaiss(),
            ':tel' => $pompier->getTel(),
            ':sexe' => $pompier->getSexe(),
            ':id' => $pompier->getId()
        );
    
        // Exécution de la requête
        $requete->execute($valeurs);
    }
    
    public function getPompier(){
        
        $requete = $this->_db->prepare("SELECT * FROM pompier");
        $requete->execute();
        //var_dump($requete);
        $PompierInfo = $requete->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $requete->closeCursor();

        return $PompierInfo;
    }

    public function chercherMatricule($id){
        
        $requete = $this->_db->prepare("SELECT Matricule FROM pompier WHERE Matricule = :id");
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        //var_dump($requete);
        if($requete->rowCount() > 0){
           
            return true;
        } else {
            
            return false;
        }
    }

    public function supprimerPompier($matricule) {
        $requete = $this->_db->prepare("DELETE FROM pompier WHERE Matricule = :matricule");
        $requete->bindValue(':matricule', $matricule, PDO::PARAM_STR);
        $requete->execute();
    }

    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>