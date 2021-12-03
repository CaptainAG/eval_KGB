<?php 

class Statut
{
    private $id;
    private $statut; 

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach($data as $key=>$value){
            $method = "set" .ucfirst($key);
            if(method_exists($this, $method )){
                $this -> $method($value);
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
}