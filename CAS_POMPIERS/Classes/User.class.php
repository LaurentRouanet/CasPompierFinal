<?php
class User

/**
 * Classe User
 * 
 * Cette classe représente un utilisateur de l'application.
 * Elle permet de gérer les informations relatives au utilisateur de l'application.
 */
{
	// Attributs
	private $_id;
	private $_nom;
	private $_prenom;
	private $_mail;
	private $_mdp;
	private $_type;
	

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
		return $this->_nom;
	}

	public function getPrenom()
	{
		return $this->_prenom;
	}

	public function getMail()
	{
		return $this->_mail;
	}

	public function getMdp()
	{
		return $this->_mdp;
	}

	public function getType()
	{
		return $this->_type;
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
            $this->_nom = $nom;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("Le nom doit contenir au moins une lettre et au maximum 25 lettres.");
        }
    }

	public function setPrenom($prenom)
    {
        // Vérifie si la valeur contient au moins une lettre et au plus 25 lettres
        if (preg_match('/^[A-Za-z_-]{1,25}$/', $prenom)) {
            $this->_prenom = $prenom;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("Le prénom doit contenir au moins une lettre et au maximum 25 lettres.");
        }
    }

	public function setMail($mail)
	{
		if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
			$this->_mail = $mail;
		} else {
			throw new InvalidArgumentException("L'adresse e-mail n'est pas valide.");
		}
	}

	public function setMdp($mdp)
	{
		// Vérifier si le mot de passe contient au moins 8 caractères, au moins une lettre majuscule, au moins une lettre minuscule, au moins un chiffre et au moins un caractère spécial
		if (preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/', $mdp)) {
			$this->_mdp = $mdp;
		} else {
			throw new InvalidArgumentException("Le mot de passe doit contenir au moins 8 caractères, au moins une lettre majuscule, au moins une lettre minuscule, au moins un chiffre et au moins un caractère spécial.");
		}
	}

	public function setType($type)
	{
		if (is_string($type))
		{
			$this->_type = $type;
		}
	}

}
?>