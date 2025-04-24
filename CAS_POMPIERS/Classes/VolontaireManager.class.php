<?php
class VolontaireManager

/**
 * Classe VolontaireManager
 * 
 * Il s'agit du manager de la classe volontairemanager.
 * Elle permet de gérer les methodes relatives à la gestion des pompiers volontaires.
 */
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }
    
    public function inserer(Volontaire $volontaire)
    {
        // Vérifier si tous les attributs requis sont définis
        if (!$volontaire->getMatricule()) {
            throw new Exception("Tous les attributs requis doivent être définis avant d'insérer dans la base de données.");
        }

        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO volontaire (Matricule, id) VALUES (:matricule, :id)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':matricule', $volontaire->getMatricule());
        $requete->bindValue(':id', $volontaire->getId());
 
 

        // Exécution de la requête
        $requete->execute();
    }

    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
