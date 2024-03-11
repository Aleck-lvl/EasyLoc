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
                <h6 class="card-subtitle text-body-secondary text-center mb-3">Liste des tarifs</h6>

                <a href="index.php?action=tarification"><input type="button" class="btn btn-primary" style="margin-bottom:2vh" value="Créer un nouveau tarif"></a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Date de début</th>
                            <th scope="col">Date de fin</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($tabTarification as $tarif)
                        {
                            ?>
                            <tr>
                                <th scope="row"><?=$tarif['dd_tarif']?></th>
                                <td><?=$tarif['df_tarif']?></td>
                                <td><?=$tarif['prix_loc']?></td>
                                <td>
                                    <form method="POST" action="index.php?action=gestionTarification">
                                        <input type="hidden" name="idTarification" value="<?=$tarif['id_tarif']?>">
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