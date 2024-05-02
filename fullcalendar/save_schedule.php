<?php 
require_once('db-connect.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('../../EasyLoc/index.php?action=reservation') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if(empty($id)){
    $sql = "INSERT INTO `reservation` (`idBien`, `idClient`, `date_debut`,`date_fin`,`title`,`commentaire`) VALUES ('$idBien', '$idClient', '$start_datetime','$end_datetime','$title','$description')";
}else{
    $sql = "UPDATE `reservation` set `idBien` = '{$idBien}', `idClient` = '{$idClient}', `date_debut` = '{$start_datetime}', `date_fin` = '{$end_datetime}', `title` = '{$title}', `commentaire` = '{$description}' where `id` = '{$id}'";
}
$save = $conn->query($sql);
if($save){
    echo "<script> alert('Votre réservation à bien était enregistrer'); location.replace('../../EasyLoc/index.php?action=reservation') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>