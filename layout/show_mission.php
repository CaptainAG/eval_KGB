<?php
require("asset/header.php");
?>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Détails</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex justify-content-between align-items-center ">
        <table> 
          <tbody>
          
          <tr><td scope="row">Agent:</td> <td><?=$mission->getAgent()?></td></tr>
            <tr> <td scope="row">Contact:</td> <td><?=$mission->getContact()?> </td> </tr>
            <tr><td scope="row">Cible:</td> <td> <?=$mission->getCible()?> </td></tr>
            <tr><td scope="row">Type de mission :</td> <td> <?=$mission->getType_Mission()?></td></tr>
            <tr><td scope="row">Statut:</td> <td><?=$mission->getStatut()?> </td></tr>
            <tr><td scope="row">Planque:</td> <td><?=$mission->getPlanque()?> </td> </tr>
            <tr><td scope="row">Spécialité:</td> <td> <?=$mission->getSpecialite()?></td></tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php 
require("asset/footer.php");
?>