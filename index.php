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
    if($_GET['action'] == 'destroy')
    {
        session_destroy();
        session_unset();
        
        $controls_admin = new Controls_Admin();
        $controls_admin -> destroy();
    }

    if($_GET['action'] == 'accueil')
    {
        $controls_admin = new Controls_Admin;
        $controls_admin->accueil();
    }

    if($_GET['action'] == 'account')
    {
        $controls_admin = new Controls_Admin;
        $controls_admin->account();
    }

    if($_GET['action'] == 'gestionAccount')
    {

        $controls_admin = new Controls_Admin();

        if(isset($_POST['updateClient']))
        {
            if(isset($_POST['idClient']) && $_POST['idClient'] != '')
            {
                $idClient = $_POST['idClient'];
            }
            else
            {
                $idClient = null;
            }

            if(isset($_POST['nom']) && $_POST['nom'] != '')
            {
                $nom = $_POST['nom'];
            }
            else
            {
                $nom = null;
            }

            if(isset($_POST['prenom']) && $_POST['prenom'] != '')
            {
                $prenom = $_POST['prenom'];
            }
            else
            {
                $prenom = null;
            }

            if(isset($_POST['rue']) && $_POST['rue'] != '')
            {
                $rue = $_POST['rue'];
            }
            else
            {
                $rue = null;
            }

            if(isset($_POST['commune2']) && $_POST['commune2'] != '')
            {
                $commune = $_POST['commune2'];
            }
            else
            {
                $commune = null;
            }

            if(isset($_POST['mail']) && $_POST['mail'] != '')
            {
                $mail = $_POST['mail'];
            }
            else
            {
                $mail = null;
            }

            $controls_admin -> updateAccount($idClient, $nom, $prenom, $rue, $commune, $mail);
        }

    }

    if($_GET['action'] == 'voirPlus')
    {

        $idBien = $_POST['idBien'];

        $controls_admin = new Controls_Admin;
        $controls_admin->voirPlus($idBien);
    }

    if($_GET['action'] == 'reservation')
    {

        $idBien = $_POST['idBien'];

        $controls_admin = new Controls_Admin;
        $controls_admin->reservation($idBien);
    }

    if($_GET['action'] == 'mes-reservations')
    {

        $controls_admin = new Controls_Admin;
        $controls_admin->mesReservation();
    }
}
   

    