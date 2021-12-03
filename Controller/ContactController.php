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
        $req= $this->db->prepare("INSERT INTO `Contact`(nom, prenom,date_de_naissance,nom_de_code,nationalite) VALUE (:nom, :prenom,:date_de_naissance,:nom_de_code,:nationalite) ");

        $req->bindValue(":nom",$contact->getNom(), PDO::PARAM_STR);
        $req->bindValue(":prenom",$contact->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":date_de_naissance",$contact->getDate_de_naissance(), PDO::PARAM_STR);
        $req->bindValue(":nom_de_code",$contact->getnom_de_code(), PDO::PARAM_STR);
        $req->bindValue(":nationalite",$contact->getNationalite(), PDO::PARAM_STR);
        $req->execute();
    }

    public function get(int $id)
    {
        $req= $this->db->prepare("SELECT * FROM `Contact` WHERE id =:id ");
        $req->execute([":id" => $id]);
        $data= $req->fetch();
        $contact = new Contact($data);
        return $contact;

    }

    public function getAll():array
    {
        $contacts= [];
        $req= $this->db->query("SELECT * FROM `Contact` ORDER BY nom_de_code");
        $datas=$req->fetchAll();
        foreach($datas as $data){
        $contact= new Contact($data);
        $contacts[]= $contact;
        }

        return $contacts;

        
        
    }

    public function update(Contact $contact){
        $req= $this->db->prepare("UPDATE `Contact` SET nom=:nom, prenom=:prenom,date_de_naissance=:date_de_naissance,nom_de_code=:nom_de_code, nationalite= :nationalite");

        $req->bindValue(":nom",$contact->getNom(), PDO::PARAM_STR);
        $req->bindValue(":prenom",$contact->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":date_de_naissance",$contact->getDate_de_naissance(), PDO::PARAM_STR);
        $req->bindValue(":nom_de_code",$contact->getnom_de_code(), PDO::PARAM_STR);
        $req->bindValue(":nationalite",$contact->getNationalite(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(int $id){
        $req=$this->db->prepare("DELETE FROM `Contact` WHERE id= :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}