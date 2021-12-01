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
        $req= $this->db->prepare("INSERT INTO `Cible`(Nom, Prenom,Date_de_naissance,Nom_de_code,Nationalite) VALUE (:Nom, :Prenom,:Date_de_naissance,:Nom_de_code,:Nationalite) ");

        $req->bindValue(":Nom",$cible->getNom(), PDO::PARAM_STR);
        $req->bindValue(":Prenom",$cible->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":Date_de_naissance",$cible->getDate_de_naissance(), PDO::PARAM_STR);
        $req->bindValue(":Nom_de_code",$cible->getnom_de_code(), PDO::PARAM_STR);
        $req->bindValue(":Nationalite",$cible->getNationalite(), PDO::PARAM_STR);
        $req->execute();
    }

    public function get(string $nom_de_code)
    {
        $req= $this->db->prepare("SELECT * FROM `Agent` WHERE nom_de_code=:nom_de_code ");
        $req->execute([":nom_de_code" => $nom_de_code]);
        $data= $req->fetch();
        $cible = new Cible($data);
        return $cible;

    }

    public function update(Cible $cible){
        $req= $this->db->prepare("UPDATE `Cible` SET Nom=:Nom, Prenom=:Prenom,Date_de_naissance=:Date_de_naissance,Nom_de_code=:Nom_de_code, Nationalite= :Nationalite");

        $req->bindValue(":Nom",$cible->getNom(), PDO::PARAM_STR);
        $req->bindValue(":Prenom",$cible->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":Date_de_naissance",$cible->getDate_de_naissance(), PDO::PARAM_STR);
        $req->bindValue(":Nom_de_code",$cible->getnom_de_code(), PDO::PARAM_STR);
        $req->bindValue(":Nationalite",$cible->getNationalite(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(int $id){
        $req=$this->db->prepare("DELETE FROM `Cible` WHERE id= : id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}