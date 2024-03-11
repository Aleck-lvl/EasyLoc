<?php
 if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }

include('lib/menu/navbar.php');

?>


<div class="row">
    <div class="col-1"></div>
    <div class="col-10" style="margin-top:4vh">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="card-subtitle text-body-secondary text-center mb-3">Liste des biens</h6>

                <a href="index.php?action=bien"><input type="button" class="btn btn-primary" style="margin-bottom:2vh" value="Créer un nouveau bien"></a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Référence du bien</th>
                            <th scope="col">Nom du bien</th>
                            <th scope="col">Descriptif du bien</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($tabBien as $bien)
                        {
                            ?>
                            <tr>
                                <th scope="row"><?=$bien['ref_bien']?></th>
                                <td><?=$bien['nom_bien']?></td>
                                <td><?=$bien['descriptif']?></td>
                                <td>
                                    <form method="POST" action="index.php?action=gestionBien">
                                        <input type="hidden" name="idBien" value="<?=$bien['id_bien']?>">
                                        <input type="submit" class="btn btn-primary" value="Consulter">
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>