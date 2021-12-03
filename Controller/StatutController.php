<?php 

require("Statut.php"); 

class StatutController{
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
        $statuts= [];
        $req= $this->db->query("SELECT * FROM `Statut` ORDER BY statut");
        $datas=$req->fetchAll();
        foreach($datas as $data){
        $statut= new Statut($data);
        $statuts[]= $statut;
        }

        return $statuts;

        
        
    }

}