<?php
class GradeManager

/**
 * Classe GradeManager
 * 
 * Il s'agit du manager de la classe grade.
 * Elle permet de gérer les methodes relatives à la gestion des grades pour les pompiers.
 */
{
    private $_db;

    public function __construct($db)
    {
        $this->setDB($db);
    }
    

    public function getGrade()
    {
        $q = $this->_db->prepare('SELECT id, libellé FROM grade');
        $q->execute();

        $gradeInfo = $q->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $gradeInfo;
    }
    
    public function getGradeId($id)
    {
        $q = $this->_db->prepare('SELECT libellé FROM grade WHERE id = :id');
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();
        
        // Récupérer le libellé du grade à partir du résultat de la requête
        $resultat = $q->fetch(PDO::FETCH_ASSOC);
        
        // Vérifier si le résultat est non vide
        if ($resultat) {
            // Retourner le libellé du grade
            return $resultat['libellé'];
        } else {
            // Retourner un message d'erreur ou une valeur par défaut si aucun résultat n'est trouvé
            return "Grade introuvable";
        }
    }

      
    /**
     * Récupère les informations d'une catégorie avec un identifiant spécifié.
     *
     * @param int $id L'identifiant de la catégorie à récupérer.
     * @return array|false Un tableau associatif représentant les informations de la catégorie récupérée,
     *                     ou false si la catégorie n'est pas trouvée.
     */
    /*
    public function getCategorieById($id)
    {
        $q = $this->_db->prepare('SELECT idCategorie, libelle FROM categorie WHERE idCategorie = :id');
        $q->bindValue(':id', $id, PDO::PARAM_INT);
        $q->execute();

        $categorieInfo = $q->fetch(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $categorieInfo;
    }
    */
    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
