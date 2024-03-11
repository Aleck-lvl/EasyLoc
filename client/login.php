<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
<?php
require('config.php');
session_start();
if (isset($_POST['nom'])){
  $nom = stripslashes($_REQUEST['nom']);
  $nom = mysqli_real_escape_string($conn, $nom);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `clients` WHERE nom_client ='$nom' and pass_client='".hash('sha256', $password)."'";
  $result = mysqli_query($conn,$query);
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['username'] = $nom;
      header("Location: index.php?action=accueil");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form class="box" action="" method="post" name="login">
<!-- <h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p> -->

<div class="row">
    <div class="col-3"></div>
    <div class="col-6" style="margin-top:4vh">
        <div class="card shadow">
            <div class="card-body">
                <h6 class="card-subtitle text-body-secondary text-center mb-3">Connectez-vous</h6>

                <label for="nom">Nom d'utilisateur :</label>
                <input type="text" class="form-control mb-3" id="nom" name="nom" placeholder="Nom d'utilisateur*">

                <label for="nom">Mot de passe :</label>
                <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Mot de passe*">

                <center><input type="submit" class="btn btn-dark" name="submit" value="Connexion"/></center>
                <center><p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p></center>
                   
            </div>
        </div>
    </div>
    <div class="col-3"></div>

<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>