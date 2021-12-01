<?php 
include("authentication.php"); 

require("./asset/header.php");

?>


<div class="background">
    <div class="container-xxl" >
            <div class="log">
                <form class="d-flex flex-column my-3 " 
                  method="POST" name="login"> 
                    <div class="my-3">
                        <label>ID</label>
                        <input type="email" id="id" name="email" required>
                    </div>
                    
                    <div class="my-3">
                        <label>MDP </label>
                        <input type="password" name="password" required>
                    </div>
                    <button type="submit" name="valider" class="btn btn-outline-light">Connexion</button>
                </form>
            </div>
     </div>
</div>
    
<?php

require("./asset/footer.php");

?>