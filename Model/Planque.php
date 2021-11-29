<?php 

class Planque 
{
    private $Code;
    private $Adresse;
    private $Types;
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
    public function getTypes()
    {
        return $this->Types;
    }

    /**
     * Set the value of Types
     *
     * @return  self
     */ 
    public function setTypes($Types)
    {
        $this->Types = $Types;

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