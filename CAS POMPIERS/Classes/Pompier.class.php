<?php 
Class Pompier{
    //attributs
    private $_matricule;
    private $_nom_pompier;
    private $_prenom_pompier;
    private $_datenaissance;
    private $_telephone;
    private $_sexe;
    private $_id;
    public function __construct(array $donnees)
    {
        // Le constructeur appelle la méthode hydrate
        // Celle ci sera utile pour la construction des objets 
        $this->hydrate($donnees);
    }


    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.$key;
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
            else
            {
                trigger_error('Je trouve pas la méthode !', E_USER_WARNING);
            }
        }
    }
    //getters
    public function getmatricule() {
        return $this -> $_matricule ;
    }
    public function getnom_pompier() {
        return $this -> $_nom_pompier ;
    }
    public function getprenom_pompier() {
        return $this -> $_prenom_pompier ;
    }
    public function getdatenaissance() {
        return $this -> $_daitenaissance ;
    }
    public function gettelephone() {
        return $this -> $_telephone ;
    }
    public function getsexe() {
        return $this -> $_sexe ;
    }
    public function getid() {
        return $this -> $_id ;
    }

    /* exemple stter 
        public function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new InvalidArgumentException("Adresse email invalide");
        }
        return $this;
    } */
   // setters 
   public function setmatricule($matricule){
    $matricule = (int) $matricule;
    // Vérifier si le matricule est un entier à 6 chiffres
    if ($matricule > 0 && $matricule <= 999999){
        $this -> _matricule = str_pad($matricule, 6);
    }
    }
    public function setnom_pompier($nom_pompier) {
    if (is_string($nom_pompier)){
        $this -> $_nom_pompier ;
    }
    }
    public function setprenom_pompier($prenom_pompier) {
    if (is_string($prenom_pompier)){
        $this -> $_prenom_pompier ;
    }
    }
    public function setdatenaissance() {
        $this -> $_daitenaissance ;
    }
    public function settelephone() {
        $this -> $_telephone ;
    }
    public function setsexe() {
        $this -> $_sexe ;
    }
    public function setid() {
        $this -> $_id ;
    }
}
?>
