<?php 
require_once('db-connect.php');
if(!isset($_GET['id'])){
    echo "<script> alert('Undefined Schedule ID.'); location.replace('../../EasyLoc/index.php?action=reservation') </script>";
    $conn->close();
    exit;
}

$delete = $conn->query("DELETE FROM `reservation` where id = '{$_GET['id']}'");
if($delete){
    echo "<script> alert('Event has deleted successfully.'); location.replace('../../EasyLoc/index.php?action=reservation') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();

?>