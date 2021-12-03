<?php      
    
    if(!empty($_POST)){
        if(isset($_POST["email"],$_POST["password"]) && !empty($_POST["email"])&&!empty($_POST["password"])
        ){
            include_once('config.php');

            $sql= "SELECT * FROM `Admin` WHERE `email`=:email";

            $query= $db->prepare($sql);

            $query->bindValue(":email", $_POST["email"],PDO::PARAM_STR);

            $query->execute();

            $user = $query->fetch();
            
            

            if(!$user){
                die("L'utilisateur et/ou le mot de passe est incorrect ");
            }
            if(!password_verify($_POST["password"],$user["password"])){
                die("L'utilisateur et/ou le mot de passe est incorrect ");
            }

            session_start();

            $_SESSION["Admin"]= [
                "nom"=> $user["nom"],
                "prenom"=> $user["prenom"]
            ];

            header("location: ./layout/Admin_page.php");








        }
    }
?>  