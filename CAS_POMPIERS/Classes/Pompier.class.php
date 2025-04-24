<?php
class Pompier

/**
 * Classe Pompier
 * 
 * Cette classe représente un pompier.
 * Elle permet de gérer les informations relatives au pompier.
 */
{
    // Attributs
    private $_Matricule;
    private $_Nom;
    private $_Prenom;
    private $_DateNaiss;
    private $_Tel;
    private $_Sexe;
    private $_id;
    private$_idCaserne;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

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

    public function getId()
    {
        return $this->_id;
    }

    public function getNom()
    {
        return $this->_Nom;
    }

    public function getMatricule()
    {
        return $this->_Matricule;
    }

    public function getPrenom()
    {
        return $this->_Prenom;
    }

    public function getDateNaiss()
    {
        return $this->_DateNaiss;
    }

    public function getTel()
    {
        return $this->_Tel;
    }

    public function getSexe()
    {
        return $this->_Sexe;
    }

    public function getIdCaserne()
    {
        return $this->_idCaserne;
    }
    
    // Setters

    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setIdCaserne($idCaserne)
    {
        $idCase = (int) $idCaserne;
        if ($idCase > 0) {
            $this->_idCaserne = $idCase;
        }
    }


    public function setNom($nom)
    {
        // Vérifie si la valeur contient au moins une lettre et au plus 25 lettres
        if (preg_match('/^[A-Za-z]{1,25}$/', $nom)) {
            $this->_Nom = $nom;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("Le nom doit contenir au moins une lettre et au maximum 25 lettres.");
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


    public function setPrenom($prenom)
    {
        // Vérifie si la valeur contient au moins une lettre et au plus 25 lettres
        if (preg_match('/^[A-Za-z_-]{1,25}$/', $prenom)) {
            $this->_Prenom = $prenom;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("Le prénom doit contenir au moins une lettre et au maximum 25 lettres.");
        }
    }

    public function setDateNaiss($dateNaiss)
    {
        // Vérifier si la date de naissance est valide (supérieure à 1900)
        if (strtotime($dateNaiss) < strtotime('1900-01-01')) {
            throw new InvalidArgumentException("La date de naissance ne peut pas être inférieure à 1900.");
        }

        // Vérifier si le pompier a au moins 18 ans
        $date18AnsAuparavant = date('Y-m-d', strtotime('-18 years'));
        if (strtotime($dateNaiss) > strtotime($date18AnsAuparavant)) {
            throw new InvalidArgumentException("Le pompier doit avoir au moins 18 ans.");
        }

        // Si toutes les validations sont réussies, attribuer la date de naissance
        $this->_DateNaiss = $dateNaiss;
    }


    public function setTel($tel)
    {
        // Vérifie si la valeur contient exactement 10 chiffres
        if (preg_match('/^\d{10}$/', $tel)) {
            $this->_Tel = $tel;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("Le numéro de téléphone doit contenir exactement 10 chiffres.");
        }
    }


    public function setSexe($sexe)
    {
        
        if ($sexe === "féminin" || $sexe === "masculin") {
            $this->_Sexe = $sexe;
        } else {
            // Gérer l'erreur, par exemple, lancer une exception ou définir une valeur par défaut
            throw new InvalidArgumentException("La valeur du sexe doit être 'féminin' ou 'masculin'.");
        }
    }
}
?>
