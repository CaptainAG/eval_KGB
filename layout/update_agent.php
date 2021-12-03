<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/AgentController.php");
require("../Controller/PaysController.php");
require("../Controller/SpecialiteController.php");

$agentController= new AgentController();
$countryController= new CountryController();
$specialiteController= new SpecialiteController();

$agent= $agentController->get($_GET["id"]);
$countrys= $countryController-> getAll();
$specialites= $specialiteController->getAll();
$error= null;

if($_POST){
    $nom= $_POST["nom"];
    $prenom= $_POST["prenom"];
    $date_de_naissance=$_POST["date_de_naissance"];
    $nom_identification=$_POST["nom_identification"];
    $nationalite=$_POST["nationalite"];
    $specialite=$_POST["specialite"];

    $newAgent= new Agent([
        "nom"=>$nom,
        "prenom"=>$prenom,
        "date_de_naissance"=>$date_de_naissance,
        "nom_identification"=>$nom_identification,
        "nationalite"=>$nationalite,
        "specialite"=>$specialite,
    ]);
    $agentController->update($newAgent);
    header("Location: ./page_agent.php");

}

?>

<?php 
  if($error){
    echo "<p class='alert-danger'>$error </p>";
  } ?>

<div class="container-xxl">
<form method="post" enctype="multipart/form-data" >
        <label for="nom" class="form-lable"> Nom</label>
        <input type="text" name="nom" value="<?= $agent->getNom() ?>" id="nom" class="form-control" placeholder="Le nom de l'agent" minlength="3" maxlength="40">
        <label for="prenom" class="form-lable"> Prénom</label>
        <input type="text" name="prenom" value="<?= $agent->getPrenom() ?>" id="prenom" class="form-control" minlength="3" maxlength="40">
        <label for="date_de_naissance" class="form-lable"> Date de naissance </label>
        <input type="text" name="date_de_naissance" value="<?= $agent->getDate_de_naissance() ?>" id="date_de_naissance" class="form-control" minlength="3" maxlength="40">
        <label for="nom_identification" class="form-lable"> Nom d'identification</label>
        <input type="text" name="nom_identification" value="<?= $agent->getNom_identification() ?>" id="nom_identification" class="form-control" minlength="3" maxlength="40">

        <label for="nationalite" class="form-lable"> Nationnalité</label>
       <select name="nationalite" id="nationalite" class="form-select">
       <option value=""> --</option>
          <?php foreach($countrys as $country): ?>
            <option <?=$country->getNationalite() === $agent->getNationalite()?"selected": "" ?> value="<?= $country->getNationalite()?>"> <?= $country->getNationalite()?> </option>
          <?php endforeach ?>
        </select>
        
        <label for="specialite" class="form-lable"> Spécialité </label>
       <select name="specialite" id="specialite" class="form-select">
        <option value=""> --</option>
          <?php foreach($specialites as $specialite): ?>
            <option <?=$specialite->getSpecialite() === $agent->getSpecialite()?"selected": "" ?> value="<?= $specialite->getSpecialite()?>"> <?= $specialite->getSpecialite()?> </option>
          <?php endforeach ?>
        </select>

        <input type="submit" class="btn btn-success mt-3" value="Créer"> 
        </form>


</form>

</div>
