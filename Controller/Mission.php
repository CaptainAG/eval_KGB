<?php 



class Mission 
{
    private $id;
    private $titre; 
    private $description;
    private $nom_de_code ;
    private $pays;
    private $agent;
    private $contact;
    private $cible;
    private $type_mission;
    private $statut; 
    private $planque; 
    private $specialite;
    private $date_debut; 
    private $date_fin; 

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
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Get the value of pays
     */ 
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set the value of pays
     *
     * @return  self
     */ 
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get the value of agent
     */ 
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Set the value of agent
     *
     * @return  self
     */ 
    public function setAgent($agent)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Get the value of contact
     */ 
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set the value of contact
     *
     * @return  self
     */ 
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get the value of cible
     */ 
    public function getCible()
    {
        return $this->cible;
    }

    /**
     * Set the value of cible
     *
     * @return  self
     */ 
    public function setCible($cible)
    {
        $this->cible = $cible;

        return $this;
    }

   /**
     * Get the value of type_mission
     */ 
    public function getType_mission()
    {
        return $this->type_mission;
    }

    /**
     * Set the value of type_mission
     *
     * @return  self
     */ 
    public function setType_mission($type_mission)
    {
        $this->type_mission = $type_mission;

        return $this;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of planque
     */ 
    public function getPlanque()
    {
        return $this->planque;
    }

    /**
     * Set the value of planque
     *
     * @return  self
     */ 
    public function setPlanque($planque)
    {
        $this->planque = $planque;

        return $this;
    }

    /**
     * Get the value of specialite
     */ 
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set the value of specialite
     *
     * @return  self
     */ 
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get the value of date_debut
     */ 
    public function getDate_debut()
    {
        return $this->date_debut;
    }

    /**
     * Set the value of date_debut
     *
     * @return  self
     */ 
    public function setDate_debut($date_debut)
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    /**
     * Get the value of date_fin
     */ 
    public function getDate_fin()
    {
        return $this->date_fin;
    }

    /**
     * Set the value of date_fin
     *
     * @return  self
     */ 
    public function setDate_fin($date_fin)
    {
        $this->date_fin = $date_fin;

        return $this;
    }

   
   
}