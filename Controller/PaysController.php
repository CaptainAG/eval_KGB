<?php 

require("Pays.php"); 

class PaysController{
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

    

    public function getAll(): array
    {
       $pays= [];
       $req= $this->db->query("SELECT * FROM `Pays` ORDER BY Nationalite"); 
       $datas= $req->fetchAll(); 
       foreach($datas as $data){
        $pays = new Pays($data);
        $pays[] = $pays;
       }
       $req->closeCursor();
       return $pays;
    }

}