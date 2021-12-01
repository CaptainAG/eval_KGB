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
        $req= $this->db->prepare("INSERT INTO `Agent`(Nom, Prenom,Date_de_naissance,nom_identification,Nationalite,Specialite) VALUE (:Nom, :Prenom,:Date_de_naissance,:nom_dentification,:Nationalite,:Specialite) ");

        $req->bindValue(":nom",$agent->getNom(), PDO::PARAM_STR);
        $req->bindValue(":prenom",$agent->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":Date_de_naissance",$agent->getDate_de_naissance(), PDO::PARAM_STR);
        $req->bindValue(":nom_Identification",$agent->getNom_identification(), PDO::PARAM_STR);
        $req->bindValue(":Nationalite",$agent->getNationalite(), PDO::PARAM_STR);
        $req->bindValue(":Specialite",$agent->getSpecialite(), PDO::PARAM_STR);
        $req->execute();
    }

    public function get(string $nom_identification)
    {
        $req= $this->db->prepare("SELECT * FROM `Agent` WHERE nom_identification=:nom_identification ");
        $req->execute([":nom_identification" => $nom_identification]);
        $data= $req->fetch();
        $agent = new Agent($data);
        return $agent;

    }

    
    public function getAll()
    {
        $agent=[];
        $req= $this->db->prepare("SELECT * FROM `Agent` ORDER BY nom_identification");
        $req->execute();
        $datas= $req->fetchAll();
        foreach($datas as $data){
            $agent= new Agent($data);
           // $agent[]= $agent;
        }
        $req->closeCursor();
        return $agent;
    }

   

    public function update(Agent $agent)
    {
        $req= $this->db->prepare("UPDATE `Agent` SET Nom=:Nom, Prenom=:Prenom,Date_de_naissance=:Date_de_naissance,nom_identification=:nom_dentification,Nationalite=:Nationalite,Specialite=:Specialite WHERE id=$_GET[id]");

        $req->bindValue(":nom",$agent->getNom(), PDO::PARAM_STR);
        $req->bindValue(":prenom",$agent->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(":Date_de_naissance",$agent->getDate_de_naissance(), PDO::PARAM_STR);
        $req->bindValue(":nom_Identification",$agent->getNom_identification(), PDO::PARAM_STR);
        $req->bindValue(":Nationalite",$agent->getNationalite(), PDO::PARAM_STR);
        $req->bindValue(":Specialite",$agent->getSpecialite(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(int $id )
    {
        $req=$this->db->prepare("DELETE FROM `Agent` WHERE id= :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }
}