<?php
  // Initialiser la session
  session_start();
  
  // Supprime une variable 
  unset($_SESSION["Admin"]);
  
  {
    // Redirection vers la page de connexion
    header("Location: ../index.php");
  }
?>