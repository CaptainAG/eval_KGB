<?php
require("./asset/header.php");

require("./Controller/MissionController.php");
$missionController= new MissionController();
$mission=$missionController->get($_GET["id"]);

$error= null;
if($error){
    echo "<p class='alert-danger'>$error </p>";
  } 

?>

<div class="container-xxl">
  <div class="row justify-content-center text-center">
    <h1>Détails</h1>
    <table class="table table-striped table-hover table-responsive text-center">
     <thead>
            <tr>
              <th>Agent</th>
              <th>Contact</th>
              <th>Cible</th>
              <th>Type de mission</th>
              <th>Statut</th>
              <th>Planque</th>
              <th>Spécialité</th>
            </tr>
      </thead>
      <tbody>
          
          <tr>
            <td scope="row"><?=$mission->getAgent()?></td>
            <td><?=$mission->getContact()?> </td> 
            <td ><?=$mission->getCible()?> </td>
            <td ><?=$mission->getType_Mission()?></td>
            <td><?=$mission->getStatut()?> </td>
            <td><?=$mission->getPlanque()?> </td>
            <td> <?=$mission->getSpecialite()?></td>
          </tr> 
          </tbody>
        </table>
      </div>
      <div>
          <a href="./index.php" class="btn btn-secondary">Retour</a>
      </div>
    </div>
  </div>
</div>

<?php 
require("./asset/footer.php");
?>