<?php

require_once 'Pompier.class.php';

class PompierManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function add(Pompier $pompier)
    {
        $query = $this->_db->prepare('INSERT INTO pompiers(matricule, nom_pompier, prenom_pompier, datenaissance, telephone, sexe) VALUES(:matricule, :nom_pompier, :prenom_pompier, :datenaissance, :telephone, :sexe)');
        $query->bindValue(':matricule', $pompier->getmatricule());
        $query->bindValue(':nom_pompier', $pompier->getnom_pompier());
        $query->bindValue(':prenom_pompier', $pompier->getprenom_pompier());
        $query->bindValue(':datenaissance', $pompier->getdatenaissance());
        $query->bindValue(':telephone', $pompier->gettelephone());
        $query->bindValue(':sexe', $pompier->getsexe());
        $query->execute();
    }

    public function delete(Pompier $pompier)
    {
        $this->_db->exec('DELETE FROM pompiers WHERE id = '.$pompier->getid());
    }

    public function get($id)
    {
        $id = (int) $id;
        $query = $this->_db->query('SELECT id, matricule, nom_pompier, prenom_pompier, datenaissance, telephone, sexe FROM pompiers WHERE id = '.$id);
        $donnees = $query->fetch(PDO::FETCH_ASSOC);
        return new Pompier($donnees);
    }

    public function getList()
    {
        $pompiers = [];
        $query = $this->_db->query('SELECT id, matricule, nom_pompier, prenom_pompier, datenaissance, telephone, sexe FROM pompiers ORDER BY nom_pompier');
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $pompiers[] = new Pompier($donnees);
        }
        return $pompiers;
    }

    public function update(Pompier $pompier)
    {
        $query = $this->_db->prepare('UPDATE pompiers SET matricule = :matricule, nom_pompier = :nom_pompier, prenom_pompier = :prenom_pompier, datenaissance = :datenaissance, telephone = :telephone, sexe = :sexe WHERE id = :id');
        $query->bindValue(':matricule', $pompier->getmatricule());
        $query->bindValue(':nom_pompier', $pompier->getnom_pompier());
        $query->bindValue(':prenom_pompier', $pompier->getprenom_pompier());
        $query->bindValue(':datenaissance', $pompier->getdatenaissance());
        $query->bindValue(':telephone', $pompier->gettelephone());
        $query->bindValue(':sexe', $pompier->getsexe());
        $query->bindValue(':id', $pompier->getid(), PDO::PARAM_INT);
        $query->execute();
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}

?>