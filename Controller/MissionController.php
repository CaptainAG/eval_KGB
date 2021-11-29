<?php 

require("../Model/Mission.php");

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

    public function create(Mission $mission)
    {
        $req=$this->db->prepare("INSERT INTO `Mission`(Titre,Description,Nom_de_code,Pays,Agent,Contact,Cible,Type_Mission,Statut,Planque,Specialite,Date_debut,Date_fin) VALUE (:Titre,:Description, :Nom_de_code, :Pays, :Agent, :Contact,:Cible, :Type_Mission, :Statut, :Planque, :Specialite, :Date_debut, :Date_fin)");

        $req->bindValue(":Titre",$mission->getTitre(), PDO::PARAM_STR);
        $req->bindValue(":Description",$mission->getDescription(), PDO::PARAM_STR);
        $req->bindValue(":Nom_de_code",$mission->getNom_de_code(), PDO::PARAM_STR);
        $req->bindValue(":Pays",$mission->getPays(), PDO::PARAM_STR);
        $req->bindValue(":Agent",$mission->getAgent(), PDO::PARAM_STR);
        $req->bindValue(":Contact",$mission->getContact(), PDO::PARAM_STR);
        $req->bindValue(":Cible",$mission->getCible(), PDO::PARAM_STR);
        $req->bindValue(":Type_Mission",$mission->getType_Mission(), PDO::PARAM_STR);
        $req->bindValue(":Statut",$mission->getStatut(), PDO::PARAM_STR);
        $req->bindValue(":Planque",$mission->getPlanque(), PDO::PARAM_STR);
        $req->bindValue(":Specialite",$mission->getSpecialite(), PDO::PARAM_STR);
        $req->bindValue(":Date_debut",$mission->getDate_debut(), PDO::PARAM_STR);
        $req->bindValue(":Date_fin",$mission->getDate_fin(), PDO::PARAM_STR);
        $req->execute();
    }

    public function update(Mission $mission)
    {
        $req=$this->db->prepare("UPDATE `Mission` SET Titre= :Titre,Description=:Description, Nom_de_code=:Nom_de_code, Pays=:Pays, Agent=:Agent, Contact=:Contact,Cible=:Cible, Type_mission=:Type_Mission, Statut=:Statut, Planque=:Planque, Specialite=:Specialite, Date_debut=:Date_debut, Date_fin=:Date_fin WHERE id=$_GET[id]");

        $req->bindValue(":Titre",$mission->getTitre(), PDO::PARAM_STR);
        $req->bindValue(":Description",$mission->getDescription(), PDO::PARAM_STR);
        $req->bindValue(":Nom_de_code",$mission->getNom_de_code(), PDO::PARAM_STR);
        $req->bindValue(":Pays",$mission->getPays(), PDO::PARAM_STR);
        $req->bindValue(":Agent",$mission->getAgent(), PDO::PARAM_STR);
        $req->bindValue(":Contact",$mission->getContact(), PDO::PARAM_STR);
        $req->bindValue(":Cible",$mission->getCible(), PDO::PARAM_STR);
        $req->bindValue(":Type_Mission",$mission->getType_Mission(), PDO::PARAM_STR);
        $req->bindValue(":Statut",$mission->getStatut(), PDO::PARAM_STR);
        $req->bindValue(":Planque",$mission->getPlanque(), PDO::PARAM_STR);
        $req->bindValue(":Specialite",$mission->getSpecialite(), PDO::PARAM_STR);
        $req->bindValue(":Date_debut",$mission->getDate_debut(), PDO::PARAM_STR);
        $req->bindValue(":Date_fin",$mission->getDate_fin(), PDO::PARAM_STR);
        $req->execute();        
    }

    public function delete(int $id)
    {
        $req=$this->db->prepare("DELETE FROM `Mission` WHERE id= :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}