<?php

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
}

include('lib/menu/navbar.php');

?>

<form method="POST" action="index.php?action=gestionTypeBien ">
<div class="row">
    <div class="col-3"></div>
    <div class="col-6" style="margin-top:4vh">
        <div class="card shadow">
            <div class="card-body">
                <?php
                foreach($tabTypeBien as $type)
                {
                    ?>
                    
                    <h6 class="card-subtitle text-body-secondary text-center mb-3">Gestion du type de bien : <?=$type['lib_type_bien']?></h6>

                    <label for="type">Nom du type de bien :</label>
                    <input type="text" class="form-control mb-3" id="type" name="type" value="<?=$type['lib_type_bien']?>">

                    <input type="hidden" class="form-control mb-3" name="idTypeBien" value="<?=$type['id_type_bien']?>">

                    <center><input type="submit" class="btn btn-dark mb-3" name="updateTypeBien" value="Modifier"></center>
                    <center><input type="submit" class="btn btn-dark mb-3" name="deleteTypeBien" value="Supprimer"></center>
                    <?php
                }
                ?>
                
                   
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>

</form>