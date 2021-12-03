<?php 

require("Mission.php");

class MissionController{
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
        $req=$this->db->prepare("INSERT INTO `Mission`(titre,description,nom_de_code,pays,agent,contact,cible,type_mission,statut,planque,specialite,date_debut,date_fin) VALUE (:titre,:description, :nom_de_code, :pays, :agent, :contact,:cible, :type_mission, :statut, :planque, :specialite, :date_debut, :date_fin)");

        $req->bindValue(":titre",$mission->getTitre(), PDO::PARAM_STR);
        $req->bindValue(":description",$mission->getDescription(), PDO::PARAM_STR);
        $req->bindValue(":nom_de_code",$mission->getNom_de_code(), PDO::PARAM_STR);
        $req->bindValue(":pays",$mission->getPays(), PDO::PARAM_STR);
        $req->bindValue(":agent",$mission->getAgent(), PDO::PARAM_STR);
        $req->bindValue(":contact",$mission->getContact(), PDO::PARAM_STR);
        $req->bindValue(":cible",$mission->getCible(), PDO::PARAM_STR);
        $req->bindValue(":type_mission",$mission->getType_Mission(), PDO::PARAM_STR);
        $req->bindValue(":statut",$mission->getStatut(), PDO::PARAM_STR);
        $req->bindValue(":planque",$mission->getPlanque(), PDO::PARAM_STR);
        $req->bindValue(":specialite",$mission->getSpecialite(), PDO::PARAM_STR);
        $req->bindValue(":date_debut",$mission->getDate_debut(), PDO::PARAM_STR);
        $req->bindValue(":date_fin",$mission->getDate_fin(), PDO::PARAM_STR);
        $req->execute();

        return $mission;
    }

    public function get(int $id)
    {
        $req= $this->db->prepare("SELECT * FROM `Mission` WHERE id= :id");
        $req->execute([":id" => $id]);
        $data= $req->fetch();
        $mission = new Mission($data);
        return $mission;
    }

    public function getAll():array
    {
        $missions= [];
        $req= $this->db->query("SELECT * FROM `Mission` ORDER BY Titre");
        $datas=$req->fetchAll();
        foreach($datas as $data){
        $mission= new Mission($data);
        $missions[]= $mission;
        }

        return $missions;

        
        
    }


    public function update(Mission $mission)
    {
        $req=$this->db->prepare("UPDATE `Mission` SET titre= :titre,description=:description, nom_de_code=:nom_de_code, pays=:pays, agent=:agent, contact=:contact,cible=:cible, type_mission=:type_mission, statut=:statut, planque=:planque, specialite=:specialite, date_debut=:date_debut, date_fin=:date_fin WHERE id=$_GET[id]");

        $req->bindValue(":titre",$mission->getTitre(), PDO::PARAM_STR);
        $req->bindValue(":description",$mission->getDescription(), PDO::PARAM_STR);
        $req->bindValue(":nom_de_code",$mission->getNom_de_code(), PDO::PARAM_STR);
        $req->bindValue(":pays",$mission->getPays(), PDO::PARAM_STR);
        $req->bindValue(":agent",$mission->getAgent(), PDO::PARAM_STR);
        $req->bindValue(":contact",$mission->getContact(), PDO::PARAM_STR);
        $req->bindValue(":cible",$mission->getCible(), PDO::PARAM_STR);
        $req->bindValue(":type_Mission",$mission->getType_Mission(), PDO::PARAM_STR);
        $req->bindValue(":statut",$mission->getStatut(), PDO::PARAM_STR);
        $req->bindValue(":planque",$mission->getPlanque(), PDO::PARAM_STR);
        $req->bindValue(":specialite",$mission->getSpecialite(), PDO::PARAM_STR);
        $req->bindValue(":date_debut",$mission->getDate_debut(), PDO::PARAM_STR);
        $req->bindValue(":date_fin",$mission->getDate_fin(), PDO::PARAM_STR);
        $req->execute();      
        
    
    }

    public function delete(int $id)
    {
        $req=$this->db->prepare("DELETE FROM `Mission` WHERE id= :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}