<?php 

require("Pays.php"); 

class CountryController{
    private $db;

    public function __construct()
    {
        $dbName="eval_KGB"; 
        $port= 8889; 
        $username="root"; 
        $password= "root";

    

        try{
            $this->db= new PDO("mysql:host=localhost;dbname=$dbName;port=$port",$username,$password);
        }catch(PDOException $exeption){
            echo $exeption->getMessage();
        }
    }

    

    public function getAll():array
    {
        $countrys= [];
        $req= $this->db->query("SELECT * FROM `Pays` ORDER BY Nationalite");
        $datas=$req->fetchAll();
        foreach($datas as $data){
        $country= new Country($data);
        $countrys[]= $country;
        }

        return $countrys;

        
        
    }

}