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
                <h6 class="card-subtitle text-body-secondary text-center mb-3">Liste des types de biens</h6>

                <a href="index.php?action=accessibilite"><input type="button" class="btn btn-primary" style="margin-bottom:2vh" value="Créer un nouveau type de bien"></a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom du type de bien</th>
                            <th scope="col">Accueil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($tabAccess as $access)
                        {
                            ?>
                            <tr>
                                <th scope="row"><?=$access['lib_acces']?></th>
                                <td>
                                    <form method="POST" action="index.php?action=gestionAccessibilite">
                                        <input type="hidden" name="idAcces" value="<?=$access['id_acces']?>">
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