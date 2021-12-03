<?php 
require("../Controller/CibleController.php");


$cibleController= new CibleController();

$cibleController->delete($_GET["id"]);


header("Location: ./page_cible.php"); 
?>