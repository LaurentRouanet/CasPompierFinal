<?php
class ProfessionnelManager

/**
 * Classe ProfessionnelManager
 * 
 * Il s'agit du manager de la classe professionnel.
 * Elle permet de gérer les methodes relatives à la gestion des pompiers professionnel.
 */
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }
    
    public function inserer(Professionnel $professionnel)
    {
        // Vérifier si tous les attributs requis sont définis
        if (!$professionnel->getMatricule()) {
            throw new Exception("Tous les attributs requis doivent être définis avant d'insérer dans la base de données.");
        }

        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO professionnel (Matricule) VALUES (:matricule)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':matricule', $professionnel->getMatricule());
 

        // Exécution de la requête
        $requete->execute();
    }

    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
