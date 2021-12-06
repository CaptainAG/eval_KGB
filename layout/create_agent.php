<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/AgentController.php");
require("../Controller/PaysController.php");
require("../Controller/SpecialiteController.php");

$agentController= new AgentController();
$countryController= new CountryController();
$specialiteController= new SpecialiteController();
  
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

    $toutSpecialite= implode("--",$specialite);

    $newAgent= new Agent([
        "nom"=>$nom,
        "prenom"=>$prenom,
        "date_de_naissance"=>$date_de_naissance,
        "nom_identification"=>$nom_identification,
        "nationalite"=>$nationalite,
        "specialite"=>$toutSpecialite,
    ]);
    $agentController->create($newAgent);
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
        <input type="text" name="nom" placeholder="Le Nom de l'agent" id="nom" class="form-control" minlength="3" maxlength="40">
        <label for="prenom" class="form-lable"> Prénom</label>
        <input type="text" name="prenom" placeholder="Le Prénom de l'agent" id="prenom" class="form-control" minlength="3" maxlength="40">
        <label for="date_de_naissance" class="form-lable"> Date de naissance </label>
        <input type="date" name="date_de_naissance" placeholder="La Date de naissance" id="date_de_naissance" class="form-control" minlength="3" maxlength="40">
        <label for="nom_identification" class="form-lable"> Nom d'identification</label>
        <input type="text" name="nom_identification" placeholder="Le nom d'identification de l'agent" id="nom_identification" class="form-control" minlength="3" maxlength="40">

        <label for="nationalite" class="form-lable"> Nationnalité</label>
       <select name="nationalite" id="nationalite" class="form-select">
       <option value=""> --</option>
          <?php foreach($countrys as $country): ?>
            <option value="<?= $country->getNationalite()?>"> <?= $country->getNationalite()?> </option>
          <?php endforeach ?>
        </select>
        
        <label for="specialite" class="form-lable"> Spécialité </label> <br>
        <?php foreach($specialites as $specialite): ?>
            <input type="checkbox" name="specialite[]" value="<?= $specialite->getSpecialite()?>"> <?= $specialite->getSpecialite()?> </input> <br>
        <?php endforeach ?> <br>
        

        <input type="submit" name="valider" class="btn btn-success mt-3" value="Créer"> 
        

</form>

</div>
