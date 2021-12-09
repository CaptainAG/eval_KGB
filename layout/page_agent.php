<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/AgentController.php");

$controller= new AgentController();
$agents= $controller->getAll();
$error= null;


?>

<div class="container-xxl">
            <div class="row justify-content-center text-center">
                <h1>Agent</h1>
                <div class=" d-flex justify-content-center">
                <a href='./create_agent.php' class="btn btn-success">Ajouter un Agent</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover  text-center">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Date de naissance</th>
                                <th scope="col">Nom d'identification</th>
                                <th scope="col">Nationnalité</th>
                                <th scope="col">Spécialité </th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($agents as $agent): ?>
                                <tr>
                                    <td scope="row"> <?= $agent->getNom() ?> </td>
                                    <td> <?= $agent->getPrenom() ?> </td>
                                    <td> <?= $agent->getDate_de_naissance() ?> </td>
                                    <td> <?= $agent->getNom_identification() ?> </td>
                                    <td> <?= $agent->getNationalite() ?> </td>
                                    <td> <?= $agent->getSpecialite()?> </td>
                                    <td> <a href="update_agent.php?id=<?= $agent->getId()?>" class="btn btn-warning">Modifier</a> </td>
                                    <td> <a href="delete_agent.php?id=<?= $agent->getId()?>" class="btn btn-danger">Supprimer</a> </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php require("../asset/footer.php") ?>