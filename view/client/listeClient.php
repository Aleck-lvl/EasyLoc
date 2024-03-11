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
                <h6 class="card-subtitle text-body-secondary text-center mb-3">Liste des clients</h6>

                <a href="index.php?action=client"><input type="button" class="btn btn-primary" style="margin-bottom:2vh" value="Créer un nouveau client"></a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom et prénom du bien</th>
                            <th scope="col">Mail du client</th>
                            <th scope="col">Rue du client</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($tabClient as $client)
                        {
                            ?>
                            <tr>
                                <th scope="row"><?=$client['nom_client']?> <?=$client['prenom_client']?></th>
                                <td><?=$client['mail_client']?></td>
                                <td><?=$client['rue_client']?></td>
                                <td>
                                    <form method="POST" action="index.php?action=gestionClient">
                                        <input type="hidden" name="idClient" value="<?=$client['id_client']?>">
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