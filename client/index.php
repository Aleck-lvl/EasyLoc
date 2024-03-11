<?php

// if(!isset($_SESSION["username"])){
//     header("Location: login.php");
//     exit(); 
//   }

define('baseLinkClient', '/EasyLoc/client');
if(session_status() === PHP_SESSION_NONE)
{
    session_start();
}

$sessionTimeout = 20;

if(isset($_SESSION['user_simp_exp']) && time() - $_SESSION['user_simp_exp'] > (59*60))
{
    $_SESSION['simp_token'] = null;
    unset($_SESSION['simp_token']);
    unset($_SESSION['user_simp_exp']);
}

require('controller/controller_admin.php');

if(isset($_GET['action']))
{
    if($_GET['action'] == 'accueil')
    {
        $controls_admin = new Controls_Admin;
        $controls_admin->accueil();
    }
}
   

    