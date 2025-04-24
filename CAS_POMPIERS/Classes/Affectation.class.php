<?php

/**
 * Classe Affectation
 * 
 * Cette classe représente une affectation d'un pompier à une caserne.
 * Elle permet de gérer les informations relatives à une affectation.
 */
class Affectation
{
    // Attributs
    private $_Date; 
    private $_Matricule; 
    private $_id; 
   
	// Constructeur
    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    // Méthode d'hydratation
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Getters

    public function getDate()
    {
        return $this->_Date;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getMatricule()
    {
        return $this->_Matricule;
    }

    // Setters

    public function setDate($date)
    {
        // Méthode pour définir la date de l'affectation
        $this->_Date = $date;
    }

    public function setId($id)
    {
        // Méthode pour définir l'identifiant de l'affectation
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setMatricule($Matricule)
    {
        // Méthode pour définir le matricule de l'employé affecté
        $Matricule = (int) $Matricule;
        if ($Matricule > 0) {
            $this->_Matricule = $Matricule;
        }
    }
}
?>
