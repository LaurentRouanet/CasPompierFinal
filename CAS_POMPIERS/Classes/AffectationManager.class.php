<?php

/**
 * Classe AffectationManager
 * 
 * Il s'agit du manager de la classe affectation.
 * Elle permet de gérer les methodes relatives à la classe affectation.
 */
class AffectationManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDB($db);
    }
    


    public function add(Affectation $affectation)
    {
        // Vérifier si tous les attributs requis sont définis
        if (!$affectation->getDate() ||!$affectation->getMatricule() || !$affectation->getId() ) {
            throw new Exception("Tous les attributs requis doivent être définis avant d'insérer dans la base de données.");
          
            
        }
        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO affectation (Date, Matricule, id) VALUES (:date, :matricule, :id)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':date', $affectation->getDate());
        $requete->bindValue(':matricule', $affectation->getMatricule(), PDO::PARAM_INT);
        $requete->bindValue(':id', $affectation->getId(), PDO::PARAM_INT);
        
        // Exécution de la requête
        $requete->execute();
    }


    public function getAffectation()
    {
        $q = $this->_db->prepare('SELECT * FROM affectation');
        $q->execute();

        $AffectationInfo = $q->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $AffectationInfo;
    }


    public function getAffectationRecente($Matricule)
    {
        $q = $this->_db->prepare('SELECT id FROM affectation WHERE Matricule = :matricule ORDER BY date DESC LIMIT 1');
        $q->bindValue(':matricule', $Matricule, PDO::PARAM_INT);
        $q->execute();

        $AffectationInfo = $q->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $AffectationInfo;
    }

    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
