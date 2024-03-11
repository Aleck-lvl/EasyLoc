<?php
 if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }

include('lib/menu/navbar.php');
