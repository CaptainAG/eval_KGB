<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/PlanqueController.php");
require("../Controller/PaysController.php");


$planqueController= new PlanqueController();
$countryController= new CountryController();

$planque=$planqueController->get($_GET["id"]);
$countrys= $countryController-> getAll();
$error= null;

if($_POST){
    $code= $_POST["code"];
    $adresse= $_POST["adresse"];
    $type=$_POST["type"];
    $pays=$_POST["pays"];
   

    $newPlanque= new Planque([
        "code"=>$code,
        "adresse"=>$adresse,
        "type"=>$type,
        "pays"=>$pays,
        
    ]);
    $planqueController->update($newPlanque);
    header("Location: ./page_planque.php");

}

?>

<?php 
  if($error){
    echo "<p class='alert-danger'>$error </p>";
  } ?>

<div class="container-xxl">
<form method="post" enctype="multipart/form-data" >
        <label for="code" class="form-lable"> Code</label>
        <input type="text" name="code" value="<?= $planque->getCode() ?>" placeholder="Le code de la planque" id="code" class="form-control" minlength="3" maxlength="40">
        <label for="adresse" class="form-lable"> Adresse</label>
        <input type="text" name="adresse" value="<?= $planque->getAdresse() ?>" placeholder="L'adresse de la planque" id="adresse" class="form-control" minlength="3" maxlength="40">
        <label for="type" class="form-lable"> Type </label>
        <input type="text" name="type" value="<?= $planque->getType() ?>" placeholder="Le type de la planque" id="type" class="form-control" minlength="3" maxlength="40">


        <label for="pays" class="form-lable"> Pays</label>
       <select name="pays" id="pays" class="form-select">
       <option value=""> --</option>
          <?php foreach($countrys as $country): ?>
            <option <?=$country->getNationalite() === $planque->getPays()?"selected": "" ?> value="<?= $country->getNationalite()?>"> <?= $country->getNationalite()?> </option>
          <?php endforeach ?>
        </select>
        <input type="submit" class="btn btn-warning mt-3" value="Modifier"> 
        </form>


</form>

</div>
