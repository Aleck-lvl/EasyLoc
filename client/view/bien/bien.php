<?php
 if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }

include('lib/menu/navbar.php');

foreach($tabBien as $bien)
{
    ?>
    <center style="margin-top:2vh"><h4><?=$bien['nom_bien']?></h4></center>
    <div class="row">
        <?php
        foreach($tabImage as $image)
        {
            ?>
                <div class="col" style="margin-top:2vh">
                    <center><img src="<?=$image['image']?>" style="height: 40vh;width:45vh"></center>
                </div>
            <?php
        }
        ?>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card shadow" style="margin-top:2vh">
                <div class="card-body">
                    <form method="POST" action="index.php?action=reservation">
                        <h6 class="card-subtitle text-body-secondary text-center mb-3">Description de ce bien</h6>
                            <h6>Nom : </h6><?=$bien['nom_bien']?>
                            <h6>Description : </h6><?=$bien['descriptif']?>
                            <h6>rue : </h6><?=$bien['rue_bien']?>
                            <h6>Nom : </h6><?=$bien['nom_bien']?>
                            <h6>Superficie : </h6><?=$bien['sup_bien']?> m2
                            <h6>Nombres de pièces : </h6><?=$bien['nb_pieces']?>
                            <h6>Nombres de couchages : </h6><?=$bien['nb_couchage']?>
                            <h6>Nombre de chambres : </h6><?=$bien['nb_chambres']?>
                        <input type="hidden" name="idBien" value="<?=$bien['id_bien']?>">
                        <center style="margin-top:2vh"><input type="submit" class="btn btn-primary" name="reserver" value="Réserver"></center>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
    <?php
}


