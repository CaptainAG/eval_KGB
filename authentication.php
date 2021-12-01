<?php      
    
    if(!empty($_POST)){
        if(isset($_POST["email"],$_POST["password"]) && !empty($_POST["email"])&&!empty($_POST["password"])
        ){
            include_once('config.php');

            $sql= "SELECT * FROM `Admin` WHERE `Email`=:email";

            $query= $db->prepare($sql);

            $query->bindValue(":email", $_POST["email"],PDO::PARAM_STR);

            $query->execute();

            $user = $query->fetch();
            var_dump($user);
            

            if(!$user){
                die("L'utilisateur et/ou le mot de passe est incorrect ");
            }
            if(!password_verify($_POST["password"],$user["Password"])){
                die("L'utilisateur et/ou le mot de passe est incorrect ");
            }

            session_start();

            $_SESSION["Admin"]= [
                "Nom"=> $user["Nom"],
                "Prenom"=> $user["Prenom"]
            ];

            header("location: ./layout/Admin.php");








        }
    }
?>  