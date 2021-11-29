<?php 

class Cible 
{
    private $Nom;
    private $Prenom;
    private $Date_de_naissance;
    private $Nom_de_code;
    private $Nationalite;

    public function __construct (array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach($data as $key =>$value){
            $method = "set".ucfirst($key);
            if(method_exists($this, $method)){
                $this-> $method($value);
            }
        }
    }

    


    /**
     * Get the value of Nom
     */ 
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * Set the value of Nom
     *
     * @return  self
     */ 
    public function setNom($Nom)
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * Get the value of Prenom
     */ 
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * Set the value of Prenom
     *
     * @return  self
     */ 
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    /**
     * Get the value of Date_de_naissance
     */ 
    public function getDate_de_naissance()
    {
        return $this->Date_de_naissance;
    }

    /**
     * Set the value of Date_de_naissance
     *
     * @return  self
     */ 
    public function setDate_de_naissance($Date_de_naissance)
    {
        $this->Date_de_naissance = $Date_de_naissance;

        return $this;
    }

    /**
     * Get the value of Nom_de_code
     */ 
    public function getNom_de_code()
    {
        return $this->Nom_de_code;
    }

    /**
     * Set the value of Nom_de_code
     *
     * @return  self
     */ 
    public function setNom_de_code($Nom_de_code)
    {
        $this->Nom_de_code = $Nom_de_code;

        return $this;
    }

    /**
     * Get the value of Nationalite
     */ 
    public function getNationalite()
    {
        return $this->Nationalite;
    }

    /**
     * Set the value of Nationalite
     *
     * @return  self
     */ 
    public function setNationalite($Nationalite)
    {
        $this->Nationalite = $Nationalite;

        return $this;
    }
}