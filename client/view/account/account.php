<?php
 if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }


include('lib/menu/navbar.php');

?>

<form method="POST" action="index.php?action=gestionAccount">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8" style="margin-top:4vh">
            <div class="card shadow">
                <div class="card-body">
                <?php
                    foreach($tabClient as $client)
                    {
                        ?>
                        <h6 class="card-subtitle text-body-secondary text-center mb-3">A propos de vos informations</h6>

                        <label for="nom">Votre nom :</label>
                        <input type="text" class="form-control mb-3" id="nom" name="nom" value="<?=$client['nom_client']?>">

                        <label for="prenom">Votre prénom :</label>
                        <input type="text" class="form-control mb-3" id="prenom" name="prenom" value="<?=$client['prenom_client']?>">

                        <label for="rue">Votre rue :</label>
                        <input type="text" class="form-control mb-3" id="rue" name="rue" value="<?=$client['rue_client']?>">

                        <label for="idCommune">Votre commune / code postal :</label>
                        <input type="text" class="form-control" name="commune" id="commune" value="<?=$client['ville']?> <?=$client['cp']?>" onkeyup="autocompletCommune()">
                        <input type="hidden" class="form-control" name="commune2" id="commune2" value="<?=$client['id_commune']?>">
                        <ul id="commune_list"></ul>

                        <label for="mail">Votre adresse mail :</label>
                        <input type="mail" class="form-control mb-3" id="mail" name="mail" value="<?=$client['mail_client']?>">

                        <input type="hidden" name="idClient" value="<?=$client['id_client']?>">

                        <center><input type="submit" class="btn btn-dark mb-3" name="updateClient" value="Modifier"></center>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</form>
<script src="lib/js/scriptCommune.js"></script>
<script src="lib/js/jquery.min.js"></script>