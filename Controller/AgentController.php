<?php 

require("Agent.php"); 

class AgentController{
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

    public function create(Agent $agent){
        $req= $this->db->prepare("INSERT INTO `Agent`(nom, prenom,date_de_naissance,nom_identification,nationalite,specialite) VALUE (:nom, :prenom,:date_de_naissance,:nom_identification,:nationalite,:specialite) ");

        $req->bindValue(":nom",$agent->getNom(), PDO::PARAM_STR);
        $req->bindValue(":prenom",$agent->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":date_de_naissance",$agent->getDate_de_naissance(), PDO::PARAM_STR);
        $req->bindValue(":nom_identification",$agent->getNom_identification(), PDO::PARAM_STR);
        $req->bindValue(":nationalite",$agent->getNationalite(), PDO::PARAM_STR);
        $req->bindValue(":specialite",$agent->getSpecialite(), PDO::PARAM_STR);
        $req->execute();
    }

    public function get(int $id)
    {
        $req= $this->db->prepare("SELECT * FROM `Agent` WHERE id =:id ");
        $req->execute([":id" => $id]);
        $data= $req->fetch();
        $agent = new Agent($data);
        return $agent;

    }

    
    public function getAll():array
    {
        $agents= [];
        $req= $this->db->query("SELECT * FROM `Agent` ORDER BY nom_identification");
        $datas=$req->fetchAll();
        foreach($datas as $data){
        $agent= new Agent($data);
        $agents[]= $agent;
        }

        return $agents;

        
        
    }

    

    public function update(Agent $agent)
    {
        $req= $this->db->prepare("UPDATE `Agent` SET nom=:nom, prenom=:prenom,date_de_naissance=:date_de_naissance,nom_identification=:nom_identification,nationalite=:nationalite,specialite=:specialite WHERE id=$_GET[id]");

        $req->bindValue(":nom",$agent->getNom(), PDO::PARAM_STR);
        $req->bindValue(":prenom",$agent->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":date_de_naissance",$agent->getDate_de_naissance(), PDO::PARAM_STR);
        $req->bindValue(":nom_identification",$agent->getNom_identification(), PDO::PARAM_STR);
        $req->bindValue(":nationalite",$agent->getNationalite(), PDO::PARAM_STR);
        $req->bindValue(":specialite",$agent->getSpecialite(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(int $id )
    {
        $req=$this->db->prepare("DELETE FROM `Agent` WHERE id= :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}