<?php 

require("Type.php"); 

class TypeController{
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

    public function create (Type $type)
    {
        $req= $this->db->prepare("INSERT INTO `Type_Mission`(type) VALUE (:type) ");

        $req->bindValue(":type",$type->getType(), PDO::PARAM_STR);
        $req->execute();
    }

    

    public function getAll():array
    {
        $types= [];
        $req= $this->db->query("SELECT * FROM `Type_Mission` ORDER BY type");
        $datas=$req->fetchAll();
        foreach($datas as $data){
        $type= new Type($data);
        $types[]= $type;
        }

        return $types;

        
        
    }

}