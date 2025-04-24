<?php
class CaserneManager

/**
 * Classe CaserneManager

 * 
 * Il s'agit du manager de la classe caserne.
 * Elle permet de gérer les methodes relatives à la gestion de la caserne.
 */
{
    private $_db;

    public function __construct($db)
    {
        $this->setDB($db);
    }
    


    public function add(Caserne $caserne)
    {
        // Vérifier si tous les attributs requis sont définis
        if (!$caserne->getId() || !$caserne->getNom()) {
            throw new Exception("Tous les attributs requis doivent être définis avant d'insérer dans la base de données.");
          
            
        }
        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO caserne (id, Nom) VALUES (:id, :Nom)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':id', $caserne->getId(), PDO::PARAM_INT);
        $requete->bindValue(':Nom', $caserne->getNom(), PDO::PARAM_STR);
        
        // Exécution de la requête
        $requete->execute();
    }

    public function getCaserne()
    {
        $q = $this->_db->prepare('SELECT * FROM Caserne');
        $q->execute();

        $CaserneInfo = $q->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $CaserneInfo;
    }
    
    public function getCaserneId($id)
    {
        $q = $this->_db->prepare('SELECT Nom FROM caserne WHERE id = :id');
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();
        
        // Récupérer le nom de la caserne à partir du résultat de la requête
        $resultat = $q->fetch(PDO::FETCH_ASSOC);
        
        // Vérifier si le résultat est non vide
        if ($resultat) {
            // Retourner le nom de la caserne
            return $resultat['Nom'];
        } else {
            // Retourner un message d'erreur ou une valeur par défaut si aucun résultat n'est trouvé
            return "Caserne introuvable";
        }
    }

    public function getCaserneVérification($id)
    {
        $q = $this->_db->prepare('SELECT id FROM caserne WHERE id = :id');
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();
        
        $resultat = $q->fetch(PDO::FETCH_ASSOC);
        
        // Vérifier si le résultat est non vide
        if ($resultat) {
            // Retourner le nom de la caserne
            return $resultat['id'];
        } else {
            // Retourner un message d'erreur ou une valeur par défaut si aucun résultat n'est trouvé
            return "id introuvable";
        }
    }
      
    public function getCaserneNom($nom)
    {
        $q = $this->_db->prepare('SELECT Nom FROM caserne WHERE Nom = :nom');
        $q->bindValue(':nom', $nom, PDO::PARAM_STR);
        $q->execute();
        
        // Récupérer le nom de la caserne à partir du résultat de la requête
        $resultat = $q->fetch(PDO::FETCH_ASSOC);
        
        // Vérifier si le résultat est non vide
        if ($resultat) {
            // Retourner le nom de la caserne
            return $resultat['Nom'];
        } else {
            // Retourner un message d'erreur ou une valeur par défaut si aucun résultat n'est trouvé
            return "Caserne introuvable";
        }
    }

    public function suppressionCaserne($id)
    {
        $q = $this->_db->prepare('DELETE FROM caserne WHERE id = :id');
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();

    }


    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
