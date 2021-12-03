<?php 

class Contact
{
    private $id;
    private $nom;
    private $prenom;
    private $date_de_naissance;
    private $nom_de_code;
    private $nationalite;

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
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of date_de_naissance
     */ 
    public function getDate_de_naissance()
    {
        return $this->date_de_naissance;
    }

    /**
     * Set the value of date_de_naissance
     *
     * @return  self
     */ 
    public function setDate_de_naissance($date_de_naissance)
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    /**
     * Get the value of nom_de_code
     */ 
    public function getNom_de_code()
    {
        return $this->nom_de_code;
    }

    /**
     * Set the value of nom_de_code
     *
     * @return  self
     */ 
    public function setNom_de_code($nom_de_code)
    {
        $this->nom_de_code = $nom_de_code;

        return $this;
    }

    /**
     * Get the value of nationalite
     */ 
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set the value of nationalite
     *
     * @return  self
     */ 
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }  

    
}