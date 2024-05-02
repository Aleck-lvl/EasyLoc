<?php

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
}

include('lib/menu/navbar.php');
?>

<form method="POST" action="index.php?action=addAccessibilite">
<div class="row">
    <div class="col-3"></div>
    <div class="col-6" style="margin-top:4vh">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="card-subtitle text-body-secondary text-center mb-3">Créer un nouveau type d'accessibilite</h6>

                <label for="type">Nom du type d'accessibilité :</label>
                <input type="text" class="form-control mb-3" id="type" name="type">

                <center><input type="submit" class="btn btn-dark mb-3" name="addAccessibilite" value="Créer"></center>
                   
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>

</form>