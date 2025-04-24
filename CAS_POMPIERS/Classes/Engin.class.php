<?php
class Engin

/**
 * Classe Engin
 * 
 * Cette classe représente un engin.
 * Elle permet de gérer les informations relatives d'un engin.
 */
{
	// Attributs
	private $_Numéro;
	private $_Caserne_id;
    private $_Type_Engin_id;
    
	
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

	public function getNuméro()
	{
		return $this->_Numéro;
	}

	public function getCaserne_Id()
	{
		return $this->_Caserne_id;
	}

    public function getType_Engin_Id()
    {
        return $this->_Type_Engin_id;
    }
	
   

	// Setters

	public function setNuméro($Numéro)
	{
		$Numéro = (int) $Numéro;
		if ($Numéro > 0)
		{
			$this->_Numéro = $Numéro;
		}	
	}

	
	public function setCaserne_Id($Caserne_id)
	{
		$Caserne_id = (int) $Caserne_id;
		if ($Caserne_id > 0)
		{
			$this->_Caserne_id = $Caserne_id;
		}	
	}

    public function setType_Engin_Id($Type_Engin_id)
    {

        if (preg_match('/^[A-Za-z]{1,5}$/', $Type_Engin_id)) {
            $this->_Type_Engin_id = $Type_Engin_id;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("Le numéro de l'engin doit contenir au moins une lettre et au maximum 5 lettres.");
        }
    }

   
}
?>