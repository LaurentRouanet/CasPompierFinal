<?php
class Volontaire

/**
 * Classe Volontaire
 * 
 * Cette classe représente un volontaire.
 * Elle permet de gérer les informations relatives au pompier volontaire.
 */
{
	// Attributs
	private $_Matricule;
	private $_id;
	
	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}

	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value) {
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	// Getters

	public function getId()
	{
		return $this->_id;
	}

	public function getMatricule()
	{
		return $this->_Matricule;
	}

	
	// Setters

	public function setId($id)
	{
		$id = (int) $id;
		if ($id > 0)
		{
			$this->_id = $id;
		}	
	}

	
	public function setMatricule($matricule)
    {
        // Vérifie si la valeur contient exactement 6 chiffres
        if (preg_match('/^\d{6}$/', $matricule)) {
            $this->_Matricule = $matricule;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("Le matricule doit contenir exactement 6 chiffres.");
        }
    }


}
?>