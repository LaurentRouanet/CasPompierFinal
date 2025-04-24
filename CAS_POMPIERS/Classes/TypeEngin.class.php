<?php
class TypeEngin

/**
 * Classe TypeEngin
 * 
 * Cette classe représente un typeengin.
 * Elle permet de gérer les informations relatives au différent typeengin.
 */
{
	// Attributs
	private $_id;
	private $_Libellé;
	private $_Url_Image;
	
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

	public function getid()
	{
		return $this->_id;
	}

	public function getLibelle()
	{
		return $this->_Libellé;
	}

	public function getUrl_Image()
    {
        return $this->_Url_Image;
    }
	
	// Setters

	public function setid($id)
	{
		if (is_string($id))
		{
			$this->_id = $id;
		}	
	}

	
	public function setLibelle($libelle)
	{
		if (is_string($libelle))
		{
			$this->_Libellé = $libelle;
		}	
	}

	public function setUrl_Image($Url_Image)
	{
		if (is_string($Url_Image))
		{
			$this->_Url_Image = $Url_Image;
		}
		else
		{
			// Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
			throw new InvalidArgumentException("L'URL de l'engin doit être une chaîne de caractères.");
		}   
	}


}
?>