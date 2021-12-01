<?php 

require("./layout/header.php");
require("./Controller/MissionController.php");
$controller= new MissionController();
$missions= $controller->getAll();
$error= null;

?>
        <div class="container-xxl">
            <div class="row justify-content-center text-center">
                <h1>Missio<a class="login" href="./layout/login.php" style="text-decoration: none; color: black;" >n</a>s</h1>
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
                                <td> <a href="#">show</a> </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

<?php require("./layout/footer.php") ?>