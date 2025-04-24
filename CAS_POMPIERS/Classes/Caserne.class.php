<?php
class Caserne
/**
 * Classe Caserne
 * 
 * Cette classe représente une caserne.
 * Elle permet de gérer les informations relatives à une caserne.
 */
{
	// Attributs
	private $_id;
	private $_Nom;
	
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
		if (is_string($nom))
		{
			$this->_Nom = $nom;
		}	
	}


}
?>