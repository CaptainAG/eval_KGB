<?php 

require("Cible.php");

class CibleController{
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

    public function create(Cible $cible){
        $req= $this->db->prepare("INSERT INTO `Cible`(nom, prenom,date_de_naissance,nom_de_code,nationalite) VALUE (:nom, :prenom,:date_de_naissance,:nom_de_code,:nationalite) ");

        $req->bindValue(":nom",$cible->getNom(), PDO::PARAM_STR);
        $req->bindValue(":prenom",$cible->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":date_de_naissance",$cible->getDate_de_naissance(), PDO::PARAM_STR);
        $req->bindValue(":nom_de_code",$cible->getnom_de_code(), PDO::PARAM_STR);
        $req->bindValue(":nationalite",$cible->getNationalite(), PDO::PARAM_STR);
        $req->execute();
    }

    public function get(int $id)
    {
        $req= $this->db->prepare("SELECT * FROM `Cible` WHERE id =:id ");
        $req->execute([":id" => $id]);
        $data= $req->fetch();
        $cible = new Cible($data);
        return $cible;

    }

    public function getAll():array
    {
        $cibles= [];
        $req= $this->db->query("SELECT * FROM `Cible` ORDER BY Nom_de_code");
        $datas=$req->fetchAll();
        foreach($datas as $data){
        $cible= new Cible($data);
        $cibles[]= $cible;
        }

        return $cibles;

        
        
    }

    public function update(Cible $cible){
        $req= $this->db->prepare("UPDATE `Cible` SET nom=:nom, prenom=:prenom,date_de_naissance=:date_de_naissance,dom_de_code=:dom_de_code, dationalite= :dationalite");

        $req->bindValue(":dom",$cible->getNom(), PDO::PARAM_STR);
        $req->bindValue(":prenom",$cible->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":date_de_naissance",$cible->getDate_de_naissance(), PDO::PARAM_STR);
        $req->bindValue(":nom_de_code",$cible->getnom_de_code(), PDO::PARAM_STR);
        $req->bindValue(":nationalite",$cible->getNationalite(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(int $id){
        $req=$this->db->prepare("DELETE FROM `Cible` WHERE id= :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}