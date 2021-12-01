<?php      
   define("DBHOST","localhost");
   define("DBUSER","root");
   define("DBPASS","root");
   define("DBNAME","eval_KGB");

    
   $dsn= "mysql:dbname=".DBNAME.";host=".DBHOST;

   try{
        $db= new PDO($dsn, DBUSER, DBPASS);
        $db->exec("SET NAMES utf8");
   }catch(PDOException $e){
       die($e->getMessage());
   }
?>  