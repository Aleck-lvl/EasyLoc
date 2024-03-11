<?php

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
}

include('lib/menu/navbar.php');

?>

<form method="POST" action="index.php?action=addTypeBien">
<div class="row">
    <div class="col-3"></div>
    <div class="col-6" style="margin-top:4vh">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="card-subtitle text-body-secondary text-center mb-3">Créer un nouveau type de bien</h6>

                <label for="type">Nom du type de bien :</label>
                <input type="text" class="form-control mb-3" id="type" name="type">

                <center><input type="submit" class="btn btn-dark mb-3" name="addClient" value="Créer"></center>
                   
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>

</form>