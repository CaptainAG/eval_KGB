<?php 

require("../asset/header.php");
require("../asset/navbar.php");
require("../Controller/ContactController.php");
require("../Controller/PaysController.php");


$contactController= new ContactController();
$countryController= new CountryController();
 
$countrys= $countryController-> getAll();
$error= null;

if($_POST){
    $nom= $_POST["nom"];
    $prenom= $_POST["prenom"];
    $date_de_naissance=$_POST["date_de_naissance"];
    $nom_de_code=$_POST["nom_de_code"];
    $nationalite=$_POST["nationalite"];
   

    $newContact= new Contact([
        "nom"=>$nom,
        "prenom"=>$prenom,
        "date_de_naissance"=>$date_de_naissance,
        "nom_de_code"=>$nom_de_code,
        "nationalite"=>$nationalite,
        
    ]);
    $contactController->create($newContact);
    header("Location: ./page_contact.php");

}

?>

<?php 
  if($error){
    echo "<p class='alert-danger'>$error </p>";
  } ?>

<div class="container-xxl">
<form method="post" enctype="multipart/form-data" >
        <label for="nom" class="form-lable"> Nom</label>
        <input type="text" name="nom" placeholder="Le Nom de l'agent" id="nom" class="form-control" minlength="3" maxlength="40">
        <label for="prenom" class="form-lable"> Prénom</label>
        <input type="text" name="prenom" placeholder="Le Prénom de l'agent" id="prenom" class="form-control" minlength="3" maxlength="40">
        <label for="date_de_naissance" class="form-lable"> Date de naissance </label>
        <input type="date" name="date_de_naissance" placeholder="La Date de naissance" id="date_de_naissance" class="form-control" minlength="3" maxlength="40">
        <label for="nom_de_code" class="form-lable"> Nom de code</label>
        <input type="text" name="nom_de_code" placeholder="Le nom d'identification de l'agent" id="nom_de_code" class="form-control" minlength="3" maxlength="40">

        <label for="nationalite" class="form-lable"> Nationnalité</label>
       <select name="nationalite" id="nationalite" class="form-select">
       <option value=""> --</option>
          <?php foreach($countrys as $country): ?>
            <option value="<?= $country->getNationalite()?>"> <?= $country->getNationalite()?> </option>
          <?php endforeach ?>
        </select>
        <input type="submit" class="btn btn-success mt-3" value="Créer"> 
        </form>


</form>

</div>
