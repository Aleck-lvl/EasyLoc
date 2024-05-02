<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="lib/js/scriptCommune.js"></script>
    <script src="lib/js/jquery.min.js"></script>
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['rue'], $_REQUEST['commune2'], $_REQUEST['mail'], $_REQUEST['password'])){

  $nom = stripslashes($_REQUEST['nom']);
  $nom = mysqli_real_escape_string($conn, $nom); 

  $prenom = stripslashes($_REQUEST['prenom']);
  $prenom = mysqli_real_escape_string($conn, $prenom); 

  $rue = stripslashes($_REQUEST['rue']);
  $rue = mysqli_real_escape_string($conn, $rue); 

  $idCommune = stripslashes($_REQUEST['commune2']);
  $idCommune = mysqli_real_escape_string($conn, $idCommune); 

  $mail = stripslashes($_REQUEST['mail']);
  $mail = mysqli_real_escape_string($conn, $mail); 

  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `clients` (nom_client, prenom_client, rue_client, id_commune, mail_client, pass_client, id_statut, id_valid)
              VALUES ('$nom', '$prenom', '$rue', '$idCommune', '$mail', '".hash('sha256', $password)."', 1, 1)";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
    <!-- <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p> -->

    <div class="row">
    <div class="col-3"></div>
    <div class="col-6" style="margin-top:4vh">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="card-subtitle text-body-secondary text-center mb-3">Créer votre compte</h6>

                <label for="nom">Nom :</label>
                <input type="text" class="form-control mb-3" id="nom" name="nom" placeholder="Nom*">

                <label for="nom">Prenom :</label>
                <input type="text" class="form-control mb-3" id="prenom" name="prenom" placeholder="Prenom*">

                <label for="nom">Rue :</label>
                <input type="text" class="form-control mb-3" id="rue" name="rue" placeholder="Rue*">

                <label for="idCommune">Commune / code postal du client :</label>
                <input type="text" class="form-control" name="commune" id="commune" placeholder="Commune / code postal du client*" onkeyup="autocompletCommune()">
                <input type="text" class="form-control" name="commune2" id="commune2">
                <ul id="commune_list"></ul>

                <label for="nom">Mail :</label>
                <input type="mail" class="form-control mb-3" id="mail" name="mail" placeholder="Mail*">

                <label for="nom">Mot de passe :</label>
                <input type="mail" class="form-control mb-3" id="password" name="password" placeholder="password*">

                <center><input type="submit" class="btn btn-dark" name="submit" value="S'inscrire"></center>
                <center><p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p></center>
                   
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>
</form>
<?php } ?>
</body>
</html>