<?php
 if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }

include('lib/menu/navbar.php');

?>

<form method="POST" action="index.php?action=gestionBien">
<div class="row">
    <div class="col-3"></div>
    <div class="col-6" style="margin-top:4vh">
        <div class="card shadow">
            <div class="card-body">
                <?php
                foreach($tabBien as $bien)
                {
                    ?>
                    <h6 class="card-subtitle text-body-secondary text-center mb-3">Gestion du bien : <?=$bien['ref_bien']?></h6>
    
                    <label for="nom">Nom du bien :</label>
                    <input type="text" class="form-control mb-3" id="nom" name="nom" value="<?=$bien['nom_bien']?>">
    
                    <label for="rue">Rue du bien :</label>
                    <input type="text" class="form-control mb-3" id="rue" name="rue" value="<?=$bien['rue_bien']?>">
    
                    <label for="idCommune">Commune / code postal du bien :</label>
                    <input type="text" class="form-control" name="commune" id="commune" value="<?=$bien['ville']?>  <?=$bien['cp']?>" onkeyup="autocompletCommune()">
                    <input type="hidden" class="form-control" name="commune2" id="commune2" value="<?=$bien['id_commune']?>">
                    <ul id="commune_list"></ul>
    
                    <label for="superficie">Superficie du bien :</label>
                    <input type="text" class="form-control mb-3" id="superficie" name="superficie" value="<?=$bien['sup_bien']?>">
    
                    <label for="couchage">Nombre de couchage du bien :</label>
                    <input type="text" class="form-control mb-3" id="couchage" name="couchage" value="<?=$bien['nb_couchage']?>">
    
                    <label for="piece">Nombre de pièces du bien :</label>
                    <input type="text" class="form-control mb-3" id="piece" name="piece" value="<?=$bien['nb_pieces']?>">
    
                    <label for="chambres">Nombre de chambres du bien :</label>
                    <input type="text" class="form-control mb-3" id="chambres" name="chambre" value="<?=$bien['nb_chambres']?>">
    
                    <label for="descriptif">Description du bien :</label>
                    <textarea type="text" class="form-control mb-3" id="descriptif" name="descriptif"><?=$bien['descriptif']?></textarea>
    
                    <label for="reference">Référence du bien :</label>
                    <input type="text" class="form-control mb-3" id="reference" name="reference" value="<?=$bien['ref_bien']?>">
    
                    <label for="photo">Référence du bien :</label>
                    <input type="file" class="form-control mb-3" id="photo" name="photo">
    
                    <label for="selectStatut">Statut du client :</label>
                    <select id="selectStatut" class="form-select mb-3" aria-label="Default select example">
                        <option selected><?=$bien['lib_statut']?></option>
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
                    <input type="hidden" name="idStatut" id="idStatut" value="<?=$bien['id_statut']?>">
    
                    
    
                    <label for="selectTypeBien">Type de bien :</label>
                    <select id="selectTypeBien" class="form-select mb-3" aria-label="Default select example">
                        <option selected><?=$bien['lib_type_bien']?></option>
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
                    <input type="hidden" name="idTypeBien" id="idTypeBien" value="<?=$bien['id_type_bien']?>">

                    <input type="hidden" name="idBien" value="<?=$bien['id_bien']?>">
    
                    <center><input type="submit" class="btn btn-dark mb-3" name="updateBien" value="Modifier"></center>
                    <center><input type="submit" class="btn btn-dark mb-3" name="deleteBien" value="Supprimer"></center>

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>

</form>

<script src="view/bien/main.js"></script>
<script src="lib/js/scriptCommune.js"></script>
<script src="lib/js/jquery.min.js"></script>