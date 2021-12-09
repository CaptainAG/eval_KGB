<?php 

require("Admin.php");


class AdminController{

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

    public function create(Admin $admin)
    {
        $req= $this->db->prepare("INSERT INTO `Admin`(nom, prenom, email, password,date_creation) VALUE (:nom, :prenom, :email, :password, :date_creation) ");

        $req->bindValue(":nom",$admin->getNom(), PDO::PARAM_STR);
        $req->bindValue(":prenom",$admin->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":email",$admin->getEmail(), PDO::PARAM_STR);
        $req->bindValue(":password",$admin->getPassword(), PDO::PARAM_STR);
        $req->bindValue(":date_creation",$admin->getDate_creation(), PDO::PARAM_STR);

        $req->execute();
    }

    public function get(int $id)
    {
        $req= $this->db->prepare("SELECT * FROM `Admin` WHERE id= :id");
        $req->execute([":id" => $id]);
        $data= $req->fetch();
        $admin = new Admin($data);
        return $admin;
    }

    public function getAll():array
    {
        $admins= [];
        $req= $this->db->query("SELECT * FROM `Admin` ORDER BY nom");
        $datas=$req->fetchAll();
        foreach($datas as $data){
        $admin= new Planque($data);
        $admins[]= $admin;
        }

        return $admins;

        
        
    }

    public function update(Admin $admin)
    {
        $req=$this->db->prepare("UPDATE `Admin` SET nom=:nom, prenom=:prenom, email=:email, password=:password, date_creation=:date_creation WHERE id=$_GET[id]");
        
        $req->bindValue(":nom",$admin->getNom(), PDO::PARAM_STR);
        $req->bindValue(":prenom",$admin->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":email",$admin->getEmail(), PDO::PARAM_STR);
        $req->bindValue(":password",$admin->getPassword(), PDO::PARAM_STR);
        $req->bindValue(":date_creation",$admin->getDate_creation(), PDO::PARAM_STR);

        $req->execute();
    }

    public function delete(int $id)
    {
        $req=$this->db->prepare("DELETE FROM `Admin` WHERE id= :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}