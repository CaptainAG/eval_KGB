<?php 

class Planque 
{
    private $id;
    private $Code;
    private $Adresse;
    private $Type;
    private $Pays;

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
     * Get the value of Code
     */ 
    public function getCode()
    {
        return $this->Code;
    }

    /**
     * Set the value of Code
     *
     * @return  self
     */ 
    public function setCode($Code)
    {
        $this->Code = $Code;

        return $this;
    }

    /**
     * Get the value of Adresse
     */ 
    public function getAdresse()
    {
        return $this->Adresse;
    }

    /**
     * Set the value of Adresse
     *
     * @return  self
     */ 
    public function setAdresse($Adresse)
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    /**
     * Get the value of Types
     */ 
    public function getType()
    {
        return $this->Type;
    }

    /**
     * Set the value of Types
     *
     * @return  self
     */ 
    public function setType($Type)
    {
        $this->Type = $Type;

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


}