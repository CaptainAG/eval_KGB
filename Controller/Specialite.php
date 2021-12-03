<?php 

class Specialite
{
    private $id;
    private $specialite;

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
}
