<?php
 if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }

include('lib/menu/navbar.php');

?>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8" style="margin-top:4vh">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST" action="index.php?action=voirPlus">
                        <?php
                        foreach($tabBien as $bien)
                        {
                            ?>
                            <div class="row">
                                <div class="col-6 border-end">
                                    <h6 class="card-subtitle text-body-secondary text-center mb-3">Images du bien</h6>
                                    <center><img src="<?=$bien['image']?>" style="height: 50vh;width:55vh"></center>
                                </div>
                                <div class="col-6">
                                    <h6 class="card-subtitle text-body-secondary text-center mb-3">Description de ce bien</h6>
                                    <h6>Nom : </h6><?=$bien['nom_bien']?>
                                    <h6>Description : </h6><?=$bien['descriptif']?>
                                    <h6>rue : </h6><?=$bien['rue_bien']?>
                                    <h6>Nom : </h6><?=$bien['nom_bien']?>
                                    <h6>Superficie : </h6><?=$bien['sup_bien']?> m2
                                    <h6>Nombres de pièces : </h6><?=$bien['nb_pieces']?>
                                    <h6>Nombres de couchages : </h6><?=$bien['nb_couchage']?>
                                    <h6>Nombre de chambres : </h6><?=$bien['nb_chambres']?>
                                </div>
                            </div>
                            <input type="hidden" name="idBien" value="<?=$bien['id_bien']?>">
                            <center style="margin-top:2vh"><input type="submit" class="btn btn-primary" name="reserver" value="Voir plus"></center>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>

