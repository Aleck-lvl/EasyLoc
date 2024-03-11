<?php
 if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }

include('lib/menu/navbar.php');

?>

<form method="POST" action="index.php?action=addBien">
<div class="row">
    <div class="col-3"></div>
    <div class="col-6" style="margin-top:4vh">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="card-subtitle text-body-secondary text-center mb-3">Créer un nouveau bien</h6>

                <label for="nom">Nom du bien :</label>
                <input type="text" class="form-control mb-3" id="nom" name="nom" placeholder="Nom de votre bien*">

                <label for="rue">Rue du bien :</label>
                <input type="text" class="form-control mb-3" id="rue" name="rue" placeholder="Rue de votre bien*">

                <label for="idCommune">Commune / code postal du bien :</label>
                <input type="text" class="form-control" name="commune" id="commune" placeholder="Commune / code postal du bien*" onkeyup="autocompletCommune()">
                <input type="hidden" class="form-control" name="commune2" id="commune2">
                <ul id="commune_list"></ul>

                <label for="superficie">Superficie du bien :</label>
                <input type="text" class="form-control mb-3" id="superficie" name="superficie" placeholder="Superficie de votre bien*">

                <label for="couchage">Nombre de couchage du bien :</label>
                <input type="text" class="form-control mb-3" id="couchage" name="couchage" placeholder="Nombre de couchage de votre bien*">

                <label for="piece">Nombre de pièces du bien :</label>
                <input type="text" class="form-control mb-3" id="piece" name="piece" placeholder="Nombre de pièces de votre bien*">

                <label for="chambres">Nombre de chambres du bien :</label>
                <input type="text" class="form-control mb-3" id="chambres" name="chambre" placeholder="Nombre de chambres de votre bien*">

                <label for="descriptif">Description du bien :</label>
                <textarea type="text" class="form-control mb-3" id="descriptif" name="descriptif" placeholder="Description de votre bien*"></textarea>

                <label for="reference">Référence du bien :</label>
                <input type="text" class="form-control mb-3" id="reference" name="reference" placeholder="Référence de votre bien*">

                <label for="photo">Référence du bien :</label>
                <input type="file" class="form-control mb-3" id="photo" name="photo">

                <label for="selectStatut">Statut du client :</label>
                <select id="selectStatut" class="form-select mb-3" aria-label="Default select example">
                    <option selected>Choisir un statut...</option>
                    <?php
                    $a = 1;
                    foreach($tabStatut as $statut)
                    {
                        ?>
                            
                            <option value="<?=$statut['id_statut']?>"><?=$statut['lib_statut']?></option>
                        
                        <?php
                        $a++;
                    }
                    ?>
                </select>
                <input type="hidden" name="idStatut" id="idStatut">

                

                <label for="selectTypeBien">Type de bien :</label>
                <select id="selectTypeBien" class="form-select mb-3" aria-label="Default select example">
                    <option selected>Choisir un type de bien...</option>
                    <?php
                    $b = 1;
                    foreach($tabTypeBien as $typeBien)
                    {
                        
                        ?>
                            
                            <option value="<?=$b?>"><?=$typeBien['lib_type_bien']?></option>
                        
                        <?php
                        $b++;
                    }
                    ?>
                </select>
                <input type="hidden" name="idTypeBien" id="idTypeBien">

                <center><input type="submit" class="btn btn-dark mb-3" name="addClient" value="Créer"></center>
                   
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>

</form>

<?php
foreach($tabImage as $image)
{

    header("Content-type: image/png"); 
        echo $image['image']; 
}
?>

<form action="index.php?action=addPhoto" method="POST" enctype="multipart/form-data">
    <input type="file" class="form-control" name="image">
    <input type="submit" class="btn btn-primary" value="Envoyer">
</form>

<script src="view/bien/main.js"></script>
<script src="lib/js/scriptCommune.js"></script>
<script src="lib/js/jquery.min.js"></script>