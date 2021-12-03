<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/AdminController.php");

$adminController= new AdminController();
$error= null;

if($_POST){
    $nom= $_POST["nom"];
    $prenom= $_POST["prenom"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $date_creation=$_POST["date_creation"];

    $newAdmin= new Admin([
        "nom" =>$nom,
        "prenom"=>$prenom,
        "email"=>$email,
        "password"=>$password,
        "date_creation"=>  $date_creation,
    ]);

    $adminController->create($newAdmin);
    header("Location: ./Admin_page.php");
}


?>

<?php 
  if($error){
    echo "<p class='alert-danger'>$error </p>";
  } ?>

<div class="container-xxl">
<form method="post" enctype="multipart/form-data" >
        <label for="nom" class="form-lable"> Nom</label>
        <input type="text" name="nom" placeholder="Le Nom de l'admmin" id="nom" class="form-control" minlength="3" maxlength="40">
        <label for="prenom" class="form-lable"> Prénom</label>
        <input type="text" name="prenom" placeholder="Le Prénom de l'admin" id="prenom" class="form-control" minlength="3" maxlength="40">
        <label for="email" class="form-lable"> Email </label>
        <input type="email" name="email" placeholder="Email" id="email" class="form-control" minlength="3" maxlength="40">
        <label for="password" class="form-lable"> Mot de passe </label>
        <input type="password" name="password" placeholder="mot de passe" id="password" class="form-control" minlength="3" maxlength="40">
        <label for="date_creation" class="form-lable"> Date de création </label>
        <input type="date" name="date_creation" placeholder="date de création" id="date_creation" class="form-control" minlength="3" maxlength="40">

        <input type="submit" class="btn btn-success mt-3" value="Créer"> 
        </form>
</div>
