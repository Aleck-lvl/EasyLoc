<?php

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
}

include('lib/menu/navbar.php');

?>

<form method="POST" action="index.php?action=gestionAccessibilite">
<div class="row">
    <div class="col-3"></div>
    <div class="col-6" style="margin-top:4vh">
        <div class="card shadow">
            <div class="card-body">
                <?php
                foreach($tabAccess as $access)
                {
                    ?>
                    
                    <h6 class="card-subtitle text-body-secondary text-center mb-3">Gestion du type de bien : <?=$access['id_acces']?></h6>

                    <label for="type">Nom du type de bien :</label>
                    <input type="text" class="form-control mb-3" id="type" name="type" value="<?=$access['lib_acces']?>">

                    <input type="hidden" class="form-control mb-3" name="idAcces" value="<?=$access['id_acces']?>">

                    <center><input type="submit" class="btn btn-dark mb-3" name="updateAccessibilite" value="Modifier"></center>
                    <center><input type="submit" class="btn btn-dark mb-3" name="deleteAccessibilite" value="Supprimer"></center>
                    <?php
                }
                ?>
                
                   
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>

</form>