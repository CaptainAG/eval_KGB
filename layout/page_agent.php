<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/AgentController.php");

$controller= new AgentController();
$agent= $controller->getAll();
$error= null;

?>

<div class="container-xxl">
            <div class="row justify-content-center text-center">
                <h1>Agent</h1>
                <div class=" d-flex justify-content-center">
                <a href='./create_agent.php' class="btn btn-success">Ajouter un Agent</a>
                </div>
                <table class="table table-striped table-hover table-responsive text-center">
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
                        <?php foreach($agent as $agent): ?>
                            <tr>
                                <td scope="row"> <?= $agent->getNom() ?> </td>
                                <td> <?= $agent->getNom() ?> </td>
                                <td> <?= $agent->getNom() ?> </td>
                                <td> <?= $agent->getNom() ?> </td>
                                <td> <?= $agent->getNom() ?> </td>
                                <td> <?= $agent->getNom() ?> </td>
                                <td> <a href="./update.php?id=<?= $pokemon->getId() ?>" class="btn btn-warning">Modifier</a> </td>
                                <td> <a href="./delete.php?id=<?= $pokemon->getId() ?>" class="btn btn-danger">Supprimer</a> </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>