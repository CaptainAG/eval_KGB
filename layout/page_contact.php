<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/ContactController.php");

$controller= new ContactController();
$contacts= $controller->getAll();
$error= null;

?>

<div class="container-xxl">
            <div class="row justify-content-center text-center">
                <h1>Contact</h1>
                <div class=" d-flex justify-content-center">
                <a href='./create_contact.php' class="btn btn-success">Ajouter un contact</a>
                </div>
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
                        <?php foreach($contacts as $contact): ?>
                            <tr>
                                <td scope="row"> <?= $contact->getNom() ?> </td>
                                <td> <?= $contact->getPrenom() ?> </td>
                                <td> <?= $contact->getDate_de_naissance() ?> </td>
                                <td> <?= $contact->getNom_de_code() ?> </td>
                                <td> <?= $contact->getNationalite() ?> </td>
                                <td> <a href="update_contact.php?id=<?= $contact->getId() ?>" class="btn btn-warning">Modifier</a> </td>
                                <td> <a href="delete_contact.php?id=<?= $contact->getId()?>" class="btn btn-danger">Supprimer</a> </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>