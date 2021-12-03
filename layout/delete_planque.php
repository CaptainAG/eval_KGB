<?php 
require("../Controller/PlanqueController.php");


$planqueController= new PlanqueController();

$planqueController->delete($_GET["id"]);


header("Location: ./page_planque.php"); 
?>