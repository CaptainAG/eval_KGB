<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/PlanqueController.php");

$controller= new PlanqueController();
$planques= $controller->getAll();
$error= null;

?>

<div class="container-xxl">
            <div class="row justify-content-center text-center">
                <h1>Planque</h1>
                <div class=" d-flex justify-content-center">
                <a href='./create_planque.php' class="btn btn-success">Ajouter une planque
                </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-responsive text-center">
                        <thead>
                            <tr>
                                <th scope="col">Code</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Type</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($planques as $planque): ?>
                                <tr>
                                    <td scope="row"> <?= $planque->getCode() ?> </td>
                                    <td> <?= $planque->getAdresse() ?> </td>
                                    <td> <?= $planque->getType() ?> </td>
                                    <td> <?= $planque->getPays() ?> </td>
                                    <td> <a href="./update_planque.php?id=<?= $planque->getId() ?>" class="btn btn-warning">Modifier</a> </td>
                                    <td> <a href="./delete_planque.php?id=<?= $planque->getId() ?>" class="btn btn-danger">Supprimer</a> </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php require("../asset/footer.php") ?>