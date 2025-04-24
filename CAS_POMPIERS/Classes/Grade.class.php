<?php
class Grade
/**
 * Classe Grade
 * 
 * Cette classe représente un grade de pompier.
 * Elle permet de gérer les informations relatives au grade pouvant être attribuer au pompier.
 */
{
	// Attributs
	private $_id;
	private $_libellé;
	
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

	public function getlibelle()
	{
		return $this->_libellé;
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

	
	public function setlibelle($libelle)
	{
		if (is_string($libelle))
		{
			$this->_libellé = $libelle;
		}	
	}


}
?>