<?php 

require("Planque.php");

class PlanqueController{
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

    public function create(Planque $planque)
    {
        $req= $this->db->prepare("INSERT INTO `Planque`(code,adresse,type,pays) VALUE (:code,:adresse,:type,:pays) ");

        $req->bindValue(":code",$planque->getCode(), PDO::PARAM_STR);
        $req->bindValue(":adresse",$planque->getAdresse(), PDO::PARAM_STR);
        $req->bindValue(":type",$planque->getType(), PDO::PARAM_STR);
        $req->bindValue(":pays",$planque->getPays(), PDO::PARAM_STR);
        $req->execute();
    }

    public function get(int $id)
    {
        $req= $this->db->prepare("SELECT * FROM `Planque` WHERE id= :id");
        $req->execute([":id" => $id]);
        $data= $req->fetch();
        $planque = new Planque($data);
        return $planque;
    }

    public function getAll():array
    {
        $planques= [];
        $req= $this->db->query("SELECT * FROM `Planque` ORDER BY Code");
        $datas=$req->fetchAll();
        foreach($datas as $data){
        $planque= new Planque($data);
        $planques[]= $planque;
        }

        return $planques;

        
        
    }

    public function update(Planque $planque)
    {
        $req=$this->db->prepare("UPDATE `Planque` SET Code=:code,adresse=:adresse,type=:type,pays=:pays WHERE id=$_GET[id]");
        
        $req->bindValue(":code",$planque->getCode(), PDO::PARAM_STR);
        $req->bindValue(":adresse",$planque->getAdresse(), PDO::PARAM_STR);
        $req->bindValue(":type",$planque->getType(), PDO::PARAM_STR);
        $req->bindValue(":pays",$planque->getPays(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(int $id)
    {
        $req=$this->db->prepare("DELETE FROM `Planque` WHERE id= :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}