<?php 

class Mission 
{
    private $Titre; 
    private $Description;
    private $Nom_de_code ;
    private $Pays;
    private $Agent;
    private $Contact;
    private $Cible;
    private $Type_Mission;
    private $Statut; 
    private $Planque; 
    private $Specialite;
    private $Date_debut; 
    private $Date_fin; 

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
     * Get the value of Titre
     */ 
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * Set the value of Titre
     *
     * @return  self
     */ 
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;

        return $this;
    }

    /**
     * Get the value of Description
     */ 
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set the value of Description
     *
     * @return  self
     */ 
    public function setDescription($Description)
    {
        $this->Description = $Description;

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
     * Get the value of Pays
     */ 
    public function getPays()
    {
        return $this->Pays;
    }

    /**
     * Set the value of Pays
     *
     * @return  self
     */ 
    public function setPays($Pays)
    {
        $this->Pays = $Pays;

        return $this;
    }

    /**
     * Get the value of Agent
     */ 
    public function getAgent()
    {
        return $this->Agent;
    }

    /**
     * Set the value of Agent
     *
     * @return  self
     */ 
    public function setAgent($Agent)
    {
        $this->Agent = $Agent;

        return $this;
    }

    /**
     * Get the value of Contact
     */ 
    public function getContact()
    {
        return $this->Contact;
    }

    /**
     * Set the value of Contact
     *
     * @return  self
     */ 
    public function setContact($Contact)
    {
        $this->Contact = $Contact;

        return $this;
    }

    /**
     * Get the value of Cible
     */ 
    public function getCible()
    {
        return $this->Cible;
    }

    /**
     * Set the value of Cible
     *
     * @return  self
     */ 
    public function setCible($Cible)
    {
        $this->Cible = $Cible;

        return $this;
    }

    /**
     * Get the value of Type_Mission
     */ 
    public function getType_Mission()
    {
        return $this->Type_Mission;
    }

    /**
     * Set the value of Type_Mission
     *
     * @return  self
     */ 
    public function setType_Mission($Type_Mission)
    {
        $this->Type_Mission = $Type_Mission;

        return $this;
    }

    /**
     * Get the value of Statut
     */ 
    public function getStatut()
    {
        return $this->Statut;
    }

    /**
     * Set the value of Statut
     *
     * @return  self
     */ 
    public function setStatut($Statut)
    {
        $this->Statut = $Statut;

        return $this;
    }

    /**
     * Get the value of Planque
     */ 
    public function getPlanque()
    {
        return $this->Planque;
    }

    /**
     * Set the value of Planque
     *
     * @return  self
     */ 
    public function setPlanque($Planque)
    {
        $this->Planque = $Planque;

        return $this;
    }

    /**
     * Get the value of Specialite
     */ 
    public function getSpecialite()
    {
        return $this->Specialite;
    }

    /**
     * Set the value of Specialite
     *
     * @return  self
     */ 
    public function setSpecialite($Specialite)
    {
        $this->Specialite = $Specialite;

        return $this;
    }

    /**
     * Get the value of Date_debut
     */ 
    public function getDate_debut()
    {
        return $this->Date_debut;
    }

    /**
     * Set the value of Date_debut
     *
     * @return  self
     */ 
    public function setDate_debut($Date_debut)
    {
        $this->Date_debut = $Date_debut;

        return $this;
    }

    /**
     * Get the value of Date_fin
     */ 
    public function getDate_fin()
    {
        return $this->Date_fin;
    }

    /**
     * Set the value of Date_fin
     *
     * @return  self
     */ 
    public function setDate_fin($Date_fin)
    {
        $this->Date_fin = $Date_fin;

        return $this;
    }
}