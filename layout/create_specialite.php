<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/SpecialiteController.php");

$specialiteController= new SpecialiteController();
$error= null;

if($_POST){
    $specialite=$_POST["specialite"];

    $newSpecialite= new Specialite([
        "specialite" => $specialite,
    ]);

    $specialiteController->create($newSpecialite);
    header("Location: ./Admin_page.php");
}

?>

<?php 
  if($error){
    echo "<p class='alert-danger'>$error </p>";
  } ?>

<div class="container-xxl">
<form method="post" enctype="multipart/form-data" >
        <label for="specialite" class="form-lable"> Spécialité</label>
        <input type="text" name="specialite" placeholder="La spécialité" id="specialite" class="form-control" minlength="3" maxlength="40">

        <input type="submit" class="btn btn-success mt-3" value="Créer"> 
        </form>
</div>

