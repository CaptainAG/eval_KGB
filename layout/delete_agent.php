<?php 
require("../Controller/AgentController.php");


$agentController= new AgentController();

$agentController->delete($_GET["id"]);


header("Location: ./page_agent.php"); 
?>