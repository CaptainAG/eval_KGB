<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/CibleController.php");

$controller= new CibleController();
$cibles= $controller->getAll();
$error= null;

?>

<div class="container-xxl">
            <div class="row justify-content-center text-center">
                <h1>Cible</h1>
                <div class=" d-flex justify-content-center">
                <a href='./create_cible.php' class="btn btn-success">Ajouter une cible</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-responsive text-center">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Date de naissance</th>
                                <th scope="col">Nom de code</th>
                                <th scope="col">Nationnalité</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cibles as $cible): ?>
                                <tr>
                                    <td scope="row"> <?= $cible->getNom() ?> </td>
                                    <td> <?= $cible->getPrenom() ?> </td>
                                    <td> <?= $cible->getDate_de_naissance() ?> </td>
                                    <td> <?= $cible->getNom_de_code() ?> </td>
                                    <td> <?= $cible->getNationalite() ?> </td>
                                    <td> <a href="update_cible.php?id=<?= $cible->getId() ?>" class="btn btn-warning">Modifier</a> </td>
                                    <td> <a href="delete_cible.php?id=<?= $cible->getId()?>" class="btn btn-danger">Supprimer</a> </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php require("../asset/footer.php") ?>