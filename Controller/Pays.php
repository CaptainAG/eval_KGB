<?php 

class Pays
{
    private $id;
    private $nationalite;

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