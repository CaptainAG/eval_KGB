<?php 

require("Specialite.php"); 

class SpecialiteController{
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

    public function create(Specialite $specialite){
        $req= $this->db->prepare("INSERT INTO `Specialite`(Specialite) VALUE (:Specialite)");

        $req->bindValue(":Specialite",$specialite->getSpecialite(), PDO::PARAM_STR);
        $req->execute();        
    }

    public function getAll() :array
    {
       $specialite= [];
       $req= $this->db->query("SELECT * FROM `Specialite` ORDER BY Specialite"); 
       $datas= $req->fetchAll(); 
       foreach($datas as $data){
        $specialite = new Specialite($data);
        $specialite[] = $specialite;
       }
       $req->closeCursor();
       return $specialite;
    }

    public function update(Specialite $specialite)
    {
        $req= $this->db->prepare("UPDATE `Specialite` SET Specialite=:Specialite WHERE id=$_GET[id]");

        $req->bindValue(":Specialite",$specialite->getSpecialite(), PDO::PARAM_STR);
        $req->execute();

    }

    public function delete(int $id )
    {
        $req=$this->db->prepare("DELETE FROM `Specialite` WHERE id= :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

}