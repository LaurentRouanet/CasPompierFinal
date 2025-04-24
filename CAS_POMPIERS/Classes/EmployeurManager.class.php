<?php
class EmployeurManager
/**
 * Classe EmployeurManager
 * 
 * Il s'agit du manager de la classe employeur.
 * Elle permet de gérer les methodes relatives à la gestion d'un employeur.
 */
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }
    
    public function insererEmployeur(Employeur $employeur)
    {
        // Vérifier si tous les attributs requis sont définis
        if (!$employeur->getNom() || !$employeur->getPrenom() || !$employeur->getTel()) {
            throw new Exception("Tous les attributs requis doivent être définis avant d'insérer dans la base de données.");
        }

    
        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO employeur (Nom, Prenom, Tel) VALUES (:nom, :prenom, :tel)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':nom', $employeur->getNom());
        $requete->bindValue(':prenom', $employeur->getPrenom());
        $requete->bindValue(':tel', $employeur->getTel());
        // Exécution de la requête
        $requete->execute();
    }


    public function affichageEmployeur()
    {
        $q = $this->_db->prepare('SELECT * FROM employeur');
        $q->execute();

        $EmployeurInfo = $q->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $EmployeurInfo;
    }

    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
