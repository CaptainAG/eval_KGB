<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/TypeController.php");

$typeController= new TypeController();
$error=null;

if($_POST){
    $type=$_POST["type"];

    $newType= new Type([
        "type"=>$type,
    ]);

    $typeController->create($newType);
    header("Location: ./Admin_page.php");
}

?>

<?php 
  if($error){
    echo "<p class='alert-danger'>$error </p>";
  } ?>

<div class="container-xxl">
<form method="post" enctype="multipart/form-data" >
        <label for="type" class="form-lable"> Type</label>
        <input type="text" name="type" placeholder="Le type de mission" id="type" class="form-control" minlength="3" maxlength="40">

        <input type="submit" class="btn btn-success mt-3" value="Créer">
</form>
</div>