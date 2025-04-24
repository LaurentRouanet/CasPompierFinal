<?php
class EnginManager
/**
 * Classe EnginManager
 * 
 * Il s'agit du manager de la classe engin.
 * Elle permet de gérer les methodes relatives à la gestion d'un engin.
 */
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }
    
    public function insererEngin(Engin $engin)
    {
        // Vérifier si tous les attributs requis sont définis
        if (!$engin->getNuméro() || !$engin->getCaserne_Id() || !$engin->getType_Engin_Id()) {
            throw new Exception("Tous les attributs requis doivent être définis avant d'insérer dans la base de données.");
            
        }
        // Préparation de la requête d'insertion
        $requete = $this->_db->prepare("INSERT INTO engin (Numéro, Caserne_id, Type_Engin_id) VALUES (:numero, :caserne_id, :type_engin_id)");

        // Liaison des valeurs avec les paramètres de la requête
        $requete->bindValue(':numero', $engin->getNuméro());
        $requete->bindValue(':caserne_id', $engin->getCaserne_Id());
        $requete->bindValue(':type_engin_id', $engin->getType_Engin_Id());
        
        // Exécution de la requête
        $requete->execute();
    }


    public function affichageEngin()
    {
        $q = $this->_db->prepare('SELECT * FROM engin');
        $q->execute();

        $EmployeurInfo = $q->fetchAll(PDO::FETCH_ASSOC);

        // Fermeture du curseur
        $q->closeCursor();

        return $EmployeurInfo;
    }



    public function affectionId($vehiculeId, $caserneId, $numeroEngin)
    {
        $q = $this->_db->prepare('SELECT COUNT(*) FROM engin WHERE Type_Engin_id = :vehicule_id AND Caserne_id = :caserne_id AND Numéro = :numero_engin');
        $q->bindValue(':vehicule_id', $vehiculeId, PDO::PARAM_STR);
        $q->bindValue(':caserne_id', $caserneId, PDO::PARAM_INT);
        $q->bindValue(':numero_engin', $numeroEngin, PDO::PARAM_INT);
        $q->execute();

        $rowCount = $q->fetchColumn();

        // Fermeture du curseur
        $q->closeCursor();

        return $rowCount > 0;
    }

    public function suppressionId($vehiculeId, $caserneId, $numeroEngin)
    {
        $q = $this->_db->prepare('DELETE FROM engin WHERE Type_Engin_id = :vehicule_id AND Caserne_id = :caserne_id AND Numéro = :numero_engin');
        $q->bindValue(':vehicule_id', $vehiculeId, PDO::PARAM_STR);
        $q->bindValue(':caserne_id', $caserneId, PDO::PARAM_INT);
        $q->bindValue(':numero_engin', $numeroEngin, PDO::PARAM_INT);
        $q->execute();
        // Fermeture du curseur
        $q->closeCursor();    
    }


    public function setDB(PDO $db)
    {
        $this->_db = $db;
    }
}
?>
