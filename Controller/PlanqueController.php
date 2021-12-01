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
        $req= $this->db->prepare("INSERT INTO `Planque`(Code,Adresse,Types,Pays) VALUE (:Code,:Adresse,:Types,:Pays) ");

        $req->bindValue(":Code",$planque->getCode(), PDO::PARAM_STR);
        $req->bindValue(":Adresse",$planque->getAdresse(), PDO::PARAM_STR);
        $req->bindValue(":Types",$planque->getTypes(), PDO::PARAM_STR);
        $req->bindValue(":Pays",$planque->getPays(), PDO::PARAM_STR);
        $req->execute();
    }

    public function get(string $code)
    {
        $req= $this->db->prepare("SELECT * FROM `Planque` WHERE Code=:Code");
        $req->execute([":Code" => $code]);
        $data= $req->fetch();
        $planque = new Planque($data);
        return $planque;
    }

    public function update(Planque $planque)
    {
        $req=$this->db->prepare("UPDATE `Planque` SET Code=:Code,Adresse=:Adresse,Types=:Types,Pays=:Pays WHERE id=$_GET[id]");
        
        $req->bindValue(":Code",$planque->getCode(), PDO::PARAM_STR);
        $req->bindValue(":Adresse",$planque->getAdresse(), PDO::PARAM_STR);
        $req->bindValue(":Types",$planque->getTypes(), PDO::PARAM_STR);
        $req->bindValue(":Pays",$planque->getPays(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(int $id)
    {
        $req=$this->db->prepare("DELETE FROM `Planque` WHERE id= :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}