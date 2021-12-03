<?php 
require("../Controller/MissionController.php");


$missionController= new MissionController();

$missionController->delete($_GET["id"]);


header("Location: ./Admin_page.php"); 
?>