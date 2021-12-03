<?php 

class Type
{
    private $id;
    private $type;
    
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
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}