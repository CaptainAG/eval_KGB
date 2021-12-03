<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/AgentController.php");
require("../Controller/PaysController.php");
require("../Controller/SpecialiteController.php");
require("../Controller/CibleController.php");
require("../Controller/ContactController.php");
require("../Controller/PlanqueController.php");
require("../Controller/MissionController.php");
require("../Controller/TypeController.php");
require("../Controller/StatutController.php");


$agentController= new AgentController();
$countryController= new CountryController();
$specialiteController= new SpecialiteController();
$cibleController= new CibleController();
$contactController= new ContactController();
$planqueController= new PlanqueController();
$missionController= new MissionController();
$typeController= new TypeController();
$statutController= new StatutController();
  
$countrys= $countryController-> getAll();
$specialites= $specialiteController->getAll();
$agents=$agentController->getAll();
$cibles=$cibleController->getAll();
$contacts=$contactController->getAll();
$planques=$planqueController->getAll();
$types=$typeController->getAll();
$statuts=$statutController->getAll();

$mission=$missionController->get($_GET["id"]);
  
$error= null;



if($_POST){
    $titre= $_POST["titre"];
    $description= $_POST["description"];
    $nom_de_code=$_POST["nom_de_code"];
    $pays=$_POST["pays"];
    $agent=$_POST["agent"];
    $contact=$_POST["contact"];
    $cible=$_POST["cible"];
    $type_mission=$_POST["type_mission"];
    $statut=$_POST["statut"];
    $planque=$_POST["planque"];
    $specialite=$_POST["specialite"];
    $date_debut=$_POST["date_debut"];
    $date_fin=$_POST["date_fin"];

    $newMission= new Mission([
        "titre"=>$titre,
        "description"=>$description,
        "nom_de_code"=> $nom_de_code,
        "pays"=>$pays,
        "agent"=>$agent,
        "contact"=>$contact,
        "cible"=>$cible ,
        "type_mission"=>$type_mission ,
        "statut"=> $statut ,
        "planque"=>$planque ,
        "specialite"=> $specialite,
        "date_debut"=> $date_debut,
        "date_fin"=>$date_fin,
    ]);
    $missionController->create($newMission);
    header("Location: ./Admin_page.php");

}

?>

<?php 
  if($error){
    echo "<p class='alert-danger'>$error </p>";
  } ?>

<div class="container-xxl">
<form method="post" enctype="multipart/form-data" >
        <label for="titre" class="form-lable"> Titre</label>
        <input type="text" name="titre" value="<?=$mission->getTitre() ?>" placeholder="Titre de la mission" id="titre" class="form-control" minlength="3" maxlength="40">

        <label for="description" class="form-lable"> Description</label>
        <input type="text" name="description" value="<?=$mission->getDescription() ?>" placeholder="Description de la mission" id="description" class="form-control" minlength="3" maxlength="40">

        <label for="nom_de_code" class="form-lable"> Nom de code  </label>
        <input type="text" name="nom_de_code" value="<?=$mission->getNom_de_code() ?>" placeholder="Nom de code de la mission" id="nom_de_code" class="form-control" minlength="3" maxlength="40">

        <label for="pays" class="form-lable"> Pays</label>
       <select name="pays" id="pays" class="form-select">
       <option value=""> --</option>
          <?php foreach($countrys as $country): ?>
            <option <?=$country->getNationalite() === $mission->getPays()?"selected": "" ?> value="<?= $country->getNationalite()?>"> <?= $country->getNationalite()?> </option>
          <?php endforeach ?>
        </select>

        <label for="agent" class="form-lable"> Agent</label>
       <select name="agent" id="agent" class="form-select">
       <option value=""> --</option>
          <?php foreach($agents as $agent): ?>
            <option <?=$agent->getNom_identification() === $mission->getAgent() ?"selected": "" ?> value="<?= $agent->getNom_identification()?>"> <?= $agent->getNom_identification()?> </option>
          <?php endforeach ?>
        </select>

        <label for="contact" class="form-lable"> Contact</label>
       <select name="contact" id="contact" class="form-select">
       <option value=""> --</option>
          <?php foreach($contacts as $contact): ?>
            <option <?= $contact->getNom_de_code() === $mission->getContact() ?"selected": "" ?> value="<?= $contact->getNom_de_code()?>"> <?= $contact->getNom_de_code()?> </option>
          <?php endforeach ?>
        </select>

        <label for="cible" class="form-lable"> Cible</label>
       <select name="cible" id="cible" class="form-select">
       <option value=""> --</option>
          <?php foreach($cibles as $cible): ?>
            <option <?= $cible->getNom_de_code() === $mission->getCible() ?"selected": "" ?> value="<?= $cible->getNom_de_code()?>"> <?= $cible->getNom_de_code()?> </option>
          <?php endforeach ?>
        </select>


        <label for="type_mission" class="form-lable"> Type de mission </label>
       <select name="type_mission" id="type_mission" class="form-select">
       <option value=""> --</option>
          <?php foreach($types as $type): ?>
            <option <?= $type->getType() === $mission->getType_mission() ?"selected": "" ?> value="<?= $type->getType()?>"> <?= $type->getType()?> </option>
          <?php endforeach ?>
        </select>

        <label for="statut" class="form-lable"> Statut </label>
       <select name="statut" id="statut" class="form-select">
       <option value=""> --</option>
          <?php foreach($statuts as $statut): ?>
            <option <?= $statut->getStatut() === $mission->getStatut() ?"selected": "" ?> value="<?= $statut->getStatut()?>"> <?= $statut->getStatut()?> </option>
          <?php endforeach ?>
        </select>
        
        
        <label for="planque" class="form-lable"> Planque</label>
       <select name="planque" id="planque" class="form-select">
       <option value=""> --</option>
          <?php foreach($planques as $planque): ?>
            <option <?= $planque->getCode() === $mission->getPlanque() ?"selected": "" ?> value="<?= $planque->getCode()?>"> <?= $planque->getCode()?> </option>
          <?php endforeach ?>
        </select>
        
        <label for="specialite" class="form-lable"> Spécialité </label>
       <select name="specialite" id="specialite" class="form-select">
        <option value=""> --</option>
          <?php foreach($specialites as $specialite): ?>
            <option <?= $specialite->getSpecialite() === $mission->getSpecialite() ?"selected": "" ?> value="<?= $specialite->getSpecialite()?>"> <?= $specialite->getSpecialite()?> </option>
          <?php endforeach ?>
        </select>

        <label for="date_debut" class="form-lable"> Date de début</label>
        <input type="text" name="date_debut" value="<?=$mission->getDate_debut() ?>" placeholder="Date de début" id="date_debut" class="form-control" minlength="3" maxlength="40">

        <label for="date_fin" class="form-lable"> Date de fin </label>
        <input type="text" name="date_fin" value="<?=$mission->getDate_fin() ?>" placeholder="Date de fin" id="date_fin" class="form-control" minlength="3" maxlength="40">

        <input type="submit" class="btn btn-success mt-3" value="Créer"> 
        </form>


</form>

</div>
