<?php 
require("../Controller/ContactController.php");


$contactController= new ContactController();

$contactController->delete($_GET["id"]);


header("Location: ./page_contact.php"); 
?>