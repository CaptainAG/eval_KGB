<?php 

require("Contact.php");

class ContactController{
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

    public function create(Contact $contact){
        $req= $this->db->prepare("INSERT INTO `Contact`(Nom, Prenom,Date_de_naissance,Nom_de_code,Nationalite) VALUE (:Nom, :Prenom,:Date_de_naissance,:Nom_de_code,:Nationalite) ");

        $req->bindValue(":Nom",$contact->getNom(), PDO::PARAM_STR);
        $req->bindValue(":Prenom",$contact->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":Date_de_naissance",$contact->getDate_de_naissance(), PDO::PARAM_STR);
        $req->bindValue(":Nom_de_code",$contact->getnom_de_code(), PDO::PARAM_STR);
        $req->bindValue(":Nationalite",$contact->getNationalite(), PDO::PARAM_STR);
        $req->execute();
    }

    public function get(string $nom_de_code)
    {
        $req= $this->db->prepare("SELECT * FROM `Agent` WHERE nom_de_code=:nom_de_code ");
        $req->execute([":nom_de_code" => $nom_de_code]);
        $data= $req->fetch();
        $contact = new Contact($data);
        return $contact;

    }

    public function update(Contact $contact){
        $req= $this->db->prepare("UPDATE `Contact` SET Nom=:Nom, Prenom=:Prenom,Date_de_naissance=:Date_de_naissance,Nom_de_code=:Nom_de_code, Nationalite= :Nationalite");

        $req->bindValue(":Nom",$contact->getNom(), PDO::PARAM_STR);
        $req->bindValue(":Prenom",$contact->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":Date_de_naissance",$contact->getDate_de_naissance(), PDO::PARAM_STR);
        $req->bindValue(":Nom_de_code",$contact->getnom_de_code(), PDO::PARAM_STR);
        $req->bindValue(":Nationalite",$contact->getNationalite(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(int $id){
        $req=$this->db->prepare("DELETE FROM `Contact` WHERE id= : id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}