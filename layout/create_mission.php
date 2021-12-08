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
  
$error= null;

if($_POST){
    $titre= $_POST["titre"];
    $description= $_POST["description"];
    $nom_de_code=$_POST["nom_de_code"];
    $pays=$_POST["pays"];
    $agent=$_POST["agent"];
    $toutAgent=implode("<br>",$agent);
    $contact=$_POST["contact"];
    $toutContact=implode("<br>",$contact);
    $cible=$_POST["cible"];
    $toutCible=implode("<br>",$cible);
    $type_mission=$_POST["type_mission"];
    $statut=$_POST["statut"];
    $planque=$_POST["planque"];
    $toutPlanque=implode("<br>",$planque);
    $specialite=$_POST["specialite"];
    $date_debut=$_POST["date_debut"];
    $date_fin=$_POST["date_fin"];
  
    try{
     
      foreach($contacts as $contact) {
        if ($pays != $contact->getNationalite()) {
            throw new Exception("Votre mission ne contient pas d'objets valides.Veuillez vérifier les nationalités des contacts");
        }
      }

      foreach($planques as $planque){
        if($pays != $planque->getPays()){
          throw new Exception("Votre mission ne contient pas d'objets valides.Veuillez vérifier le pays de la planque ");
        }
      }

      $validSpecialiteAgents = 0;
      foreach($agents as $agent){
        if (in_array($specialite->getSpecialite(), $agent->getSpecialite())) {
          $validSpecialiteAgents += 1;
      }
        if ($validSpecialiteAgents == 0) {
          throw new Exception("Votre mission ne contient pas d'objets valides.Veuillez vérifier les spécialité ");
      }
      if ($agent->getNationalite() == $cible->getNationalite()) {
        throw new Exception("Votre mission ne contient pas d'objets valides.Veuillez vérifier la nationalité des agents et des cibles  ");
      }

      }

    }catch(Exception $e){
      $error= $e->getMessage();
    }



    $newMission= new Mission([
        "titre"=>$titre,
        "description"=>$description,
        "nom_de_code"=> $nom_de_code,
        "pays"=>$pays,
        "agent"=>$toutAgent,
        "contact"=>$toutContact,
        "cible"=>$toutCible,
        "type_mission"=>$type_mission ,
        "statut"=> $statut ,
        "planque"=>$toutPlanque,
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
        <input type="text" name="titre" placeholder="Titre de la mission" id="titre" class="form-control" minlength="3" maxlength="40">

        <label for="description" class="form-lable"> Description</label>
        <input type="text" name="description" placeholder="Description de la mission" id="description" class="form-control" minlength="3" maxlength="40">

        <label for="nom_de_code" class="form-lable"> Nom de code  </label>
        <input type="text" name="nom_de_code" placeholder="Nom de code de la mission" id="nom_de_code" class="form-control" minlength="3" maxlength="40">

        <label for="pays" class="form-lable"> Pays</label>
       <select name="pays" id="pays" class="form-select">
       <option value=""> --</option>
          <?php foreach($countrys as $country): ?>
            <option value="<?= $country->getNationalite()?>"> <?= $country->getNationalite()?> </option>
          <?php endforeach ?>
        </select>

        <label for="agent" class="form-lable"> Agent</label> <br>
          <?php foreach($agents as $agent): ?>
              <input type="checkbox" name="agent[]" value="<?= $agent->getNom_identification()?>"> <?= $agent->getNom_identification().' -- ('. ($agent->getNationalite()).') --'.($agent->getSpecialite())?> </input> <br>
          <?php endforeach ?>
          <br>
        

        <label for="contact" class="form-lable"> Contact</label> <br>
          <?php foreach($contacts as $contact): ?>
            <input type="checkbox" name="contact[]" value="<?= $contact->getNom_de_code()?>"> <?= $contact->getNom_de_code() .' -- ('. ($contact->getNationalite()).')'?> </input> <br>
          <?php endforeach ?>
          <br>

        <label for="cible" class="form-lable"> Cible</label> <br>
          <?php foreach($cibles as $cible): ?>
            <input type="checkbox" name="cible[]"  value="<?= $cible->getNom_de_code()?>"> <?= $cible->getNom_de_code().' -- ('. ($cible->getNationalite()).')'?> </input><br>
          <?php endforeach ?>
          <br>


        <label for="type_mission" class="form-lable"> Type de mission </label>
       <select name="type_mission" id="type_mission" class="form-select">
       <option value=""> --</option>
          <?php foreach($types as $type): ?>
            <option value="<?= $type->getType()?>"> <?= $type->getType()?> </option>
          <?php endforeach ?>
        </select>

        <label for="statut" class="form-lable"> Statut </label>
       <select name="statut" id="statut" class="form-select">
       <option value=""> --</option>
          <?php foreach($statuts as $statut): ?>
            <option value="<?= $statut->getStatut()?>"> <?= $statut->getStatut()?> </option>
          <?php endforeach ?>
        </select>
        
        
        <label for="planque" class="form-lable"> Planque</label> <br>
          <?php foreach($planques as $planque): ?>
            <input type="checkbox" name="planque[]" value="<?= $planque->getCode()?>"> <?= $planque->getCode() .' -- ('. ($planque->getPays()).')'?> </input><br>
          <?php endforeach ?>
        <br>
        
        <label for="specialite" class="form-lable"> Spécialité </label>
       <select name="specialite" id="specialite" class="form-select">
        <option value=""> --</option>
          <?php foreach($specialites as $specialite): ?>
            <option value="<?= $specialite->getSpecialite()?>"> <?= $specialite->getSpecialite()?> </option>
          <?php endforeach ?>
        </select>

        <label for="date_debut" class="form-lable"> Date de début</label>
        <input type="date" name="date_debut" placeholder="Date de début" id="date_debut" class="form-control" minlength="3" maxlength="40">

        <label for="date_fin" class="form-lable"> Date de fin </label>
        <input type="date" name="date_fin" placeholder="Date de fin" id="date_fin" class="form-control" minlength="3" maxlength="40">

        <input type="submit" name="valider" class="btn btn-success mt-3" value="Créer"> 
        </form>


</form>

</div>
