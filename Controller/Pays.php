<?php 

class Country
{
    private $id;
    private $nationalite;

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