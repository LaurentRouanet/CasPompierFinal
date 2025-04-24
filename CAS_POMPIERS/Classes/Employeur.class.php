<?php
class Employeur
/**
 * Classe Employeur
 * 
 * Cette classe représente un employeur.
 * Elle permet de gérer les informations relatives à un employeur.
 */
{
	// Attributs
	private $_id;
	private $_Nom;
    private $_Prenom;
    private $_Tel;
	
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

	public function getNom()
	{
		return $this->_Nom;
	}

    public function getPrenom()
    {
        return $this->_Prenom;
    }
	
    public function getTel()
    {
        return $this->_Tel;
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

	
	public function setNom($nom)
    {
        // Vérifie si la valeur contient au moins une lettre et au plus 25 lettres
        if (preg_match('/^[A-Za-z]{1,25}$/', $nom)) {
            $this->_Nom = $nom;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("Le nom de l'employeur doit contenir au moins une lettre et au maximum 25 lettres.");
        }
    }


    public function setPrenom($prenom)
    {
        // Vérifie si la valeur contient au moins une lettre et au plus 25 lettres
        if (preg_match('/^[A-Za-z_-]{1,25}$/', $prenom)) {
            $this->_Prenom = $prenom;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("Le prénom de l'employeur doit contenir au moins une lettre et au maximum 25 lettres.");
        }
    }

    public function setTel($tel)
    {
        // Vérifie si la valeur contient exactement 10 chiffres
        if (preg_match('/^\d{10}$/', $tel)) {
            $this->_Tel = $tel;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("Le numéro de téléphone de l'employeur doit contenir exactement 10 chiffres.");
        }
    }

}
?>