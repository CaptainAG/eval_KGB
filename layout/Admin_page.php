<?php 

session_start();

   
require("../asset/header.php");
require("../Controller/MissionController.php");
$controller= new MissionController();
$missions= $controller->getAll();
$error= null;

require("../asset/navbar.php");



?>
        <div class="container-xxl">
            <div class="row justify-content-center text-center">
                <h1>Missions</h1>
                <div class="boutton d-flex flex-column flex-md-row  justify-content-between" >
                <a href="./create_admin.php" class="btn btn-primary my-2">Ajouter un admin</a>  
                <a href="./create_type.php" class="btn btn-info my-2">Ajouter un type de mission</a>  
                <a href="./create_specialite.php" class="btn btn-secondary my-2">Ajouter une spécialité</a>
                <a href="./create_mission.php" class="btn btn-dark my-2">Ajouter une Mission</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-responsive text-center">
                        <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Description</th>
                                <th scope="col">Code</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Date de début</th>
                                <th scope="col">Date de fin </th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($missions as $mission): ?>
                                <tr>
                                    <td scope="row"> <?= $mission->getTitre() ?> </td>
                                    <td> <?= $mission->getDescription() ?> </td>
                                    <td> <?= $mission->getNom_de_code() ?> </td>
                                    <td> <?= $mission->getPays() ?> </td>
                                    <td> <?= $mission->getDate_debut() ?> </td>
                                    <td> <?= $mission->getDate_fin() ?> </td>
                                    <td> <a href="./show_mission.php?id=<?= $mission->getId() ?>" class="btn btn-success">Voir</a>
                                    <a href="./update_mission.php?id=<?= $mission->getId() ?>" class="btn btn-warning">Modifier</a> 
                                    <a href="./delete_mission.php?id=<?= $mission->getId() ?>" class="btn btn-danger">Supprimer</a> </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<?php require("../asset/footer.php") ?>