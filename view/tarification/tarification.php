<?php

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
}

include('lib/menu/navbar.php');

?>

<form method="POST" action="index.php?action=addClient">
<div class="row">
    <div class="col-3"></div>
    <div class="col-6" style="margin-top:4vh">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="card-subtitle text-body-secondary text-center mb-3">Créer un nouveau client</h6>

                <label for="date_debut">Date de début du tarif :</label>
                <input type="date" class="form-control mb-3" id="date_debut" name="date_debut">

                <label for="date_fin">Date de fin du tarif :</label>
                <input type="date" class="form-control mb-3" id="date_fin" name="date_fin">

                <label for="prix">Prix de location :</label>
                <input type="text" class="form-control mb-3" id="prix" name="prix" placeholder="Prix de location*">

                <label for="idBien">Nom du bien :</label>
                <input type="text" class="form-control" name="bien" id="bien" placeholder="Nom du bien*" onkeyup="autocompletBien()">
                <input type="text" class="form-control" name="bien2" id="bien2">
                <ul id="bien_list"></ul>

                <center><input type="submit" class="btn btn-dark mb-3" name="addClient" value="Créer"></center>
                   
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>

</form>

<script src="view/tarification/main.js"></script>
<script src="lib/js/scriptBien.js"></script>
<script src="lib/js/jquery.min.js"></script>