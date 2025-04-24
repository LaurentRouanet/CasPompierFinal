<?php
class TypeEnginManager

/**
 * Classe TypeEnginManager
 * 
 * Il s'agit du manager de la classe typeEngin.
 * Elle permet de gérer les methodes relatives à la gestion des différents types d'engin.
 */
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }
    

    public function insererTypeEngin(TypeEngin $engin)
    {
        //var_dump($engin->getId());
        //var_dump($engin->getlibelle());
        //var_dump($engin->getUrlImage());
        // Vérifier si tous les attributs requis sont définis et non vides
        if ($engin->getId() === null || $engin->getlibelle() === null || $engin->getUrl_Image() === null) {
            throw new Exception("Tous les attributs requis doivent être définis et non vides avant d'insérer dans la base de données.");
        }

        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO type_engin (id, Libellé, Url_Image) VALUES (:id, :libelle, :url_image)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':id', $engin->getId());
        $requete->bindValue(':libelle', $engin->getlibelle());
        $requete->bindValue(':url_image', $engin->getUrl_Image());

        try {
            // Exécution de la requête
            $requete->execute();
        } catch (PDOException $e) {
            // Gérer les erreurs de requête ici
            throw new Exception("Erreur lors de l'insertion du type d'engin : " . $e->getMessage());
        }
    }

    
    public function affichageTypeEngin()
    {
        $q = $this->_db->prepare('SELECT * FROM type_engin');
        $q->execute();

        $typeEngin = $q->fetchALL(PDO::FETCH_ASSOC);
        // Fermeture du curseur
        $q->closeCursor();
        //var_dump($typeEngin);
        return  $typeEngin;
    }

    public function affichageTypeEnginId($idVehicule)
    {
        $q = $this->_db->prepare('SELECT * FROM type_engin WHERE id = :id' );
        $q->bindValue(':id', $idVehicule, PDO::PARAM_STR);
        $q->execute();

        $typeEngin = $q->fetch(PDO::FETCH_ASSOC);
        // Fermeture du curseur
        $q->closeCursor();
        //var_dump($typeEngin);
        return  $typeEngin;
    }

    public function updateTypeEnginId(TypeEngin $engin)
    {
        try {
            $q = $this->_db->prepare('UPDATE type_engin SET Libellé = :libelle, Url_Image = :urlImage WHERE id = :id');
            $q->bindValue(':id', $engin->getId(), PDO::PARAM_STR);
            $q->bindValue(':libelle', $engin->getlibelle(), PDO::PARAM_STR);
            $q->bindValue(':urlImage',$engin->getUrl_Image(), PDO::PARAM_STR);
            $q->execute();
            // Fermeture du curseur
            $q->closeCursor();
        } catch (PDOException $e) {
            // Gestion des erreurs PDO
            $_SESSION['error_message'] = "Erreur lors de la mise à jour de l'engin : " . $e->getMessage();
        }
    }


    public function supprimerTypeEnginId($idVehicule)
    {
        // Préparation de la requête de suppression
        $q = $this->_db->prepare('DELETE FROM type_engin WHERE id = :id');
        $q->bindValue(':id', $idVehicule, PDO::PARAM_STR);
        
        // Exécution de la requête
        $q->execute();
        
        // Fermeture du curseur
        $q->closeCursor();
        
       
    }

    public function recuperationId()
    {
        // Préparation de la requête de sélection des IDs
        $q = $this->_db->prepare('SELECT id FROM type_engin');
        
        // Exécution de la requête
        $q->execute();
        
        // Récupération de tous les résultats sous forme de tableau associatif
        $typeEngin = $q->fetchAll(PDO::FETCH_ASSOC);
        
        // Fermeture du curseur
        $q->closeCursor();
        
        //var_dump( $typeEngin);
        // Retourner le tableau des IDs
        return $typeEngin;
    }


    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
