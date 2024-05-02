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

                <label for="nom">Nom du client :</label>
                <input type="text" class="form-control mb-3" id="nom" name="nom" placeholder="Nom de votre client*">

                <label for="prenom">Prénom du client :</label>
                <input type="text" class="form-control mb-3" id="prenom" name="prenom" placeholder="Prénom de votre client*">

                <label for="rue">Rue du client :</label>
                <input type="text" class="form-control mb-3" id="rue" name="rue" placeholder="Rue de votre client*">

                <label for="idCommune">Commune / code postal du client :</label>
                <input type="text" class="form-control" name="commune" id="commune" placeholder="Commune / code postal du client*" onkeyup="autocompletCommune()">
                <input type="hidden" class="form-control" name="commune2" id="commune2">
                <ul id="commune_list"></ul>

                <label for="mail">Mail du client :</label>
                <input type="mail" class="form-control mb-3" id="mail" name="mail" placeholder="Mail de votre client*">

                <label for="password">Password du client :</label>
                <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Password de votre client*">

                <label for="selectStatut">Statut du client :</label>
                <select id="selectStatut" class="form-select mb-3" aria-label="Default select example">
                    <option selected>Choisir un statut...</option>
                    <?php
                    $a = 1;
                    foreach($tabStatut as $statut)
                    {
                        ?>
                            
                            <option value="<?=$a?>"><?=$statut['lib_statut']?></option>
                        
                        <?php
                        $a++;
                    }
                    ?>
                </select>
                <input type="hidden" name="idStatut" id="idStatut">

                

                <label for="selectValid">Validation du client :</label>
                <select id="selectValid" class="form-select mb-3" aria-label="Default select example">
                    <option selected>Choisir une validation...</option>
                    <?php
                    $b = 1;
                    foreach($tabValid as $valid)
                    {
                        
                        ?>
                            
                            <option value="<?=$b?>"><?=$valid['lib_valid']?></option>
                        
                        <?php
                        $b++;
                    }
                    ?>
                </select>
                <input type="hidden" name="idValid" id="idValid">

                <center><input type="submit" class="btn btn-dark mb-3" name="addClient" value="Créer"></center>
                   
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>

</form>

<script src="view/client/main.js"></script>
<script src="lib/js/scriptCommune.js"></script>
<script src="lib/js/jquery.min.js"></script>