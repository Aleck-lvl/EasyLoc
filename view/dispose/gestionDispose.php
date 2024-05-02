<?php

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
}

include('lib/menu/navbar.php');

?>

<form method="POST" action="index.php?action=gestionDispose">
<div class="row">
    <div class="col-3"></div>
    <div class="col-6" style="margin-top:4vh">
        <div class="card shadow">
            <div class="card-body">
                <?php
                foreach($tabDispose as $dispose)
                {
                    ?>
                    
                    <h6 class="card-subtitle text-body-secondary text-center mb-3">Gestion du type de bien : <?=$dispose['id_dispose']?></h6>

                <label for="selectStatut">Type accessibilite :</label>
                <select id="selectStatut" class="form-select mb-3" aria-label="Default select example">
                <option selected><?=$dispose['lib_acces']?></option>
                <?php
                $a = 1;
                foreach($tabAccess as $access)
                {
                    ?>
                        <option value="<?=$access['id_acces']?>"><?=$access['lib_acces']?></option>
                    <?php
                    $a++;
                }
                ?>
                </select>
                <input type="hidden" name="idAcces" id="idAcces">

                <label for="idBien">Nom du bien :</label>
                <input type="text" class="form-control" name="bien" id="bien"  value="<?=$dispose['nom_bien']?>" onkeyup="autocompletBien()">
                <input type="hidden" class="form-control" name="bien2" id="bien2" value="<?=$dispose['id_bien']?>">
                <ul id="bien_list"></ul>

                <input type="hidden" name="idDispose" value="<?=$dispose['id_dispose']?>">

                    <center><input type="submit" class="btn btn-dark mb-3" name="updateDispose" value="Modifier"></center>
                    <center><input type="submit" class="btn btn-dark mb-3" name="deleteDispose" value="Supprimer"></center>
                    <?php
                }
                ?>
                
                   
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>

</form>

<script src="view/dispose/main.js"></script>
<script src="lib/js/scriptBien.js"></script>
<script src="lib/js/jquery.min.js"></script>