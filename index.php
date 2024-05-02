<?php

// if(!isset($_SESSION["username"])){
//     header("Location: login.php");
//     exit(); 
//   }

define('baseLink', '/EasyLoc');
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
    if($_GET['action'] == 'listeDispose')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> listeDispose();
    }

    if($_GET['action'] == 'gestionDispose')
    {
        $controls_admin = new Controls_Admin();

        if(isset($_POST['idDispose']) && $_POST['idDispose'] != '')
            {
                $idDispose = $_POST['idDispose'];
            }
            else
            {
                $idDispose = null;
            }

        if(isset($_POST['updateDispose']))
        {
    
            if(isset($_POST['idDispose']) && $_POST['idDispose'] != '')
            {
                $idDispose = $_POST['idDispose'];
            }
            else
            {
                $idDispose = null;
            }

            if(isset($_POST['idAcces']) && $_POST['idAcces'] != '')
            {
                $idAcces = $_POST['idAcces'];
            }
            else
            {
                $idAcces = null;
            }
            if(isset($_POST['bien2']) && $_POST['bien2'] != '')
            {
                $bien2 = $_POST['bien2'];
            }
            else
            {
                $bien2 = null;
            }

            
            $controls_admin -> updateDispose($idDispose, $idAcces, $bien2);
        }
        elseif(isset($_POST['deleteDispose']))
        {
            if(isset($_POST['idDispose']) && $_POST['idDispose'] != '')
            {
                $idDispose = $_POST['idDispose'];
            }
            else
            {
                $idDispose = null;
            }

            $controls_admin -> deleteDispose($idDispose);
        }
        else
        {
            $controls_admin -> gestionDispose($idDispose);
        }
        
    }

    if($_GET['action'] == 'addDispose')
    {
        if(isset($_POST['idAcces']) && $_POST['idAcces'] != '')
        {
            $idAcces = $_POST['idAcces'];
        }
        else
        {
            $idAcces = null;
        }
        if(isset($_POST['bien2']) && $_POST['bien2'] != '')
        {
            $bien2 = $_POST['bien2'];
        }
        else
        {
            $bien2 = null;
        }

        $controls_admin = new Controls_Admin();
        $controls_admin -> addDispose($idAcces, $bien2);
    }

    if($_GET['action'] == 'dispose')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> dispose();
    }


    if($_GET['action'] == 'listeAccessibilite')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> listeAccessibilite();
    }

    if($_GET['action'] == 'gestionAccessibilite')
    {
        $controls_admin = new Controls_Admin();

        if(isset($_POST['idAcces']) && $_POST['idAcces'] != '')
            {
                $idAcces = $_POST['idAcces'];
            }
            else
            {
                $idAcces = null;
            }

        if(isset($_POST['updateAccessibilite']))
        {
    
            if(isset($_POST['idAcces']) && $_POST['idAcces'] != '')
            {
                $idAcces = $_POST['idAcces'];
            }
            else
            {
                $idAcces = null;
            }

            if(isset($_POST['type']) && $_POST['type'] != '')
            {
                $type = $_POST['type'];
            }
            else
            {
                $type = null;
            }

            $controls_admin -> updateAccessibilite($idAcces, $type);
        }
        elseif(isset($_POST['deleteAccessibilite']))
        {
            if(isset($_POST['idAcces']) && $_POST['idAcces'] != '')
            {
                $idAcces = $_POST['idAcces'];
            }
            else
            {
                $idAcces = null;
            }

            $controls_admin -> deleteAccessibilite($idAcces);
        }
        else
        {
            $controls_admin -> gestionAccessibilite($idAcces);
        }
        
    }

    if($_GET['action'] == 'addAccessibilite')
    {
        if(isset($_POST['type']) && $_POST['type'] != '')
        {
            $type = $_POST['type'];
        }
        else
        {
            $type = null;
        }
        

        $controls_admin = new Controls_Admin();
        $controls_admin -> addAccessibilite($type);
    }

    if($_GET['action'] == 'accessibilite')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> accessibilite();
    }

    if($_GET['action'] == 'destroy')
    {
        session_destroy();
        session_unset();
        
        $controls_admin = new Controls_Admin();
        $controls_admin -> destroy();
    }

    if($_GET['action'] == 'accueil')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> accueil();
    }

    if($_GET['action'] == 'client')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> client();
    }

    if($_GET['action'] == 'listeClient')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> listeClient();
    }

    if($_GET['action'] == 'gestionClient')
    {

        $controls_admin = new Controls_Admin();

        if(isset($_POST['idClient']) && $_POST['idClient'] != '')
        {
            $idClient = $_POST['idClient'];
        }
        else
        {
            $idClient = null;
        }

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

            if(isset($_POST['idStatut']) && $_POST['idStatut'] != '')
            {
                $statut = $_POST['idStatut'];
            }
            else
            {
                $statut = null;
            }

            if(isset($_POST['idValid']) && $_POST['idValid'] != '')
            {
                $validation = $_POST['idValid'];
            }
            else
            {
                $validation = null;
            }

            $controls_admin -> updateClient($idClient, $nom, $prenom, $rue, $commune, $mail, $statut, $validation);
        }
        elseif(isset($_POST['deleteClient']))
        {
            if(isset($_POST['idClient']) && $_POST['idClient'] != '')
            {
                $idClient = $_POST['idClient'];
            }
            else
            {
                $idClient = null;
            }

            $controls_admin -> deleteClient($idClient);
        }
        else
        {
            $controls_admin -> gestionClient($idClient);
        }

    }

    if($_GET['action'] == 'addClient')
    {
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

        if(isset($_POST['password']) && $_POST['password'] != '')
        {
            $password = $_POST['password'];
        }
        else
        {
            $password = null;
        }

        if(isset($_POST['idStatut']) && $_POST['idStatut'] != '')
        {
            $statut = $_POST['idStatut'];
        }
        else
        {
            $statut = null;
        }

        if(isset($_POST['idValid']) && $_POST['idValid'] != '')
        {
            $validation = $_POST['idValid'];
        }
        else
        {
            $validation = null;
        }

        $controls_admin = new Controls_Admin();
        $controls_admin -> addClient($nom, $prenom, $rue, $commune, $mail, $password, $statut, $validation);
    }

    if($_GET['action'] == 'bien')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> bien();
    }

    if($_GET['action'] == 'listeBien')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> listeBien();
    }

    if($_GET['action'] == 'gestionBien')
    {

        $controls_admin = new Controls_Admin();

        if(isset($_POST['idBien']) && $_POST['idBien'] != '')
        {
            $idBien = $_POST['idBien'];
        }
        else
        {
            $idBien = null;
        }

        if(isset($_POST['updateBien']))
        {

            if(isset($_POST['idBien']) && $_POST['idBien'] != '')
            {
                $idBien = $_POST['idBien'];
            }
            else
            {
                $idBien = null;
            }
        
            if(isset($_POST['nom']) && $_POST['nom'] != '')
            {
                $nom = $_POST['nom'];
            }
            else
            {
                $nom = null;
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
    
            if(isset($_POST['superficie']) && $_POST['superficie'] != '')
            {
                $superficie = $_POST['superficie'];
            }
            else
            {
                $superficie = null;
            }
    
            if(isset($_POST['couchage']) && $_POST['couchage'] != '')
            {
                $couchage = $_POST['couchage'];
            }
            else
            {
                $couchage = null;
            }
    
            if(isset($_POST['piece']) && $_POST['piece'] != '')
            {
                $piece = $_POST['piece'];
            }
            else
            {
                $piece = null;
            }
    
            if(isset($_POST['chambre']) && $_POST['chambre'] != '')
            {
                $chambre = $_POST['chambre'];
            }
            else
            {
                $chambre = null;
            }
    
            if(isset($_POST['descriptif']) && $_POST['descriptif'] != '')
            {
                $descriptif = $_POST['descriptif'];
            }
            else
            {
                $descriptif = null;
            }
    
            if(isset($_POST['reference']) && $_POST['reference'] != '')
            {
                $reference = $_POST['reference'];
            }
            else
            {
                $reference = null;
            }
    
            if(isset($_POST['photo']) && $_POST['photo'] != '')
            {
                $photo = $_POST['photo'];
            }
            else
            {
                $photo = null;
            }
    
            if(isset($_POST['idStatut']) && $_POST['idStatut'] != '')
            {
                $statut = $_POST['idStatut'];
            }
            else
            {
                $statut = null;
            }
    
            if(isset($_POST['idTypeBien']) && $_POST['idTypeBien'] != '')
            {
                $idTypeBien = $_POST['idTypeBien'];
            }
            else
            {
                $idTypeBien = null;
            }

            $controls_admin -> updateBien($idBien, $nom, $rue, $commune, $superficie, $couchage, $piece, $chambre, $descriptif, $reference,  $photo, $statut, $idTypeBien);
        }
        elseif(isset($_POST['deleteBien']))
        {
            if(isset($_POST['idBien']) && $_POST['idBien'] != '')
            {
                $idBien = $_POST['idBien'];
            }
            else
            {
                $idBien = null;
            }

            $controls_admin -> deleteBien($idBien);
        }
        else
        {
            $controls_admin -> gestionBien($idBien);
        }

    }

    if($_GET['action'] == 'addBien')
    {
        if(isset($_POST['nom']) && $_POST['nom'] != '')
        {
            $nom = $_POST['nom'];
        }
        else
        {
            $nom = null;
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

        if(isset($_POST['superficie']) && $_POST['superficie'] != '')
        {
            $superficie = $_POST['superficie'];
        }
        else
        {
            $superficie = null;
        }

        if(isset($_POST['couchage']) && $_POST['couchage'] != '')
        {
            $couchage = $_POST['couchage'];
        }
        else
        {
            $couchage = null;
        }

        if(isset($_POST['piece']) && $_POST['piece'] != '')
        {
            $piece = $_POST['piece'];
        }
        else
        {
            $piece = null;
        }

        if(isset($_POST['chambre']) && $_POST['chambre'] != '')
        {
            $chambre = $_POST['chambre'];
        }
        else
        {
            $chambre = null;
        }

        if(isset($_POST['descriptif']) && $_POST['descriptif'] != '')
        {
            $descriptif = $_POST['descriptif'];
        }
        else
        {
            $descriptif = null;
        }

        if(isset($_POST['reference']) && $_POST['reference'] != '')
        {
            $reference = $_POST['reference'];
        }
        else
        {
            $reference = null;
        }

        if(isset($_POST['photo']) && $_POST['photo'] != '')
        {
            $photo = $_POST['photo'];
        }
        else
        {
            $photo = null;
        }

        if(isset($_POST['idStatut']) && $_POST['idStatut'] != '')
        {
            $statut = $_POST['idStatut'];
        }
        else
        {
            $statut = null;
        }

        if(isset($_POST['idTypeBien']) && $_POST['idTypeBien'] != '')
        {
            $idTypeBien = $_POST['idTypeBien'];
        }
        else
        {
            $idTypeBien = null;
        }


        $controls_admin = new Controls_Admin();
        $controls_admin -> addBien($nom, $rue, $commune, $superficie, $couchage, $piece, $chambre, $descriptif, $reference,  $photo, $statut, $idTypeBien);
    }

    if($_GET['action'] == 'reservation')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> reservation();
    }

    if($_GET['action'] == 'addReservation')
    {
        if(isset($_POST['submitButton']))
        {
            if(isset($_POST['idClient']) && $_POST['idClient'] != '')
            {
                $idClient = $_POST['idClient'];
            }
            else
            {
                $idClient = null;
            }
            if(isset($_POST['startTime']) && $_POST['startTime'] != '')
            {
                $startTime = $_POST['startTime'];
            }
            else
            {
                $startTime = null;
            }
            if(isset($_POST['endTime']) && $_POST['endTime'] != '')
            {
                $endTime = $_POST['endTime'];
            }
            else
            {
                $endTime = null;
            }
            if(isset($_POST['title']) && $_POST['title'] != '')
            {
                $title = $_POST['title'];
            }
            else
            {
                $title = null;
            }
            if(isset($_POST['commentaire']) && $_POST['commentaire'] != '')
            {
                $commentaire = $_POST['commentaire'];
            }
            else
            {
                $commentaire = null;
            }
           
        }

        $controls_admin = new Controls_Admin();
        $controls_admin -> addreservation($idClient, $startTime, $endTime, $title, $commentaire);
    }

    if($_GET['action'] == 'tarification')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> tarification();
    }

    if($_GET['action'] == 'listeTarification')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> listeTarification();
    }

    if($_GET['action'] == 'gestionTarification')
    {

        $controls_admin = new Controls_Admin();

        if(isset($_POST['idTarification']) && $_POST['idTarification'] != '')
        {
            $idTarification = $_POST['idTarification'];
        }
        else
        {
            $idTarification = null;
        }

        if(isset($_POST['updateTarification']))
        {

            if(isset($_POST['idTarification']) && $_POST['idTarification'] != '')
            {
                $idTarification = $_POST['idTarification'];
            }
            else
            {
                $idTarification = null;
            }
        
            if(isset($_POST['date_debut']) && $_POST['date_debut'] != '')
            {
                $date_debut = $_POST['date_debut'];
            }
            else
            {
                $date_debut = null;
            }

            if(isset($_POST['date_fin']) && $_POST['date_fin'] != '')
            {
                $date_fin = $_POST['date_fin'];
            }
            else
            {
                $date_fin = null;
            }

            if(isset($_POST['prix']) && $_POST['prix'] != '')
            {
                $prix = $_POST['prix'];
            }
            else
            {
                $prix = null;
            }

            if(isset($_POST['bien2']) && $_POST['bien2'] != '')
            {
                $bien2 = $_POST['bien2'];
            }
            else
            {
                $bien2 = null;
            }

            $controls_admin -> updateTarification($idTarification, $date_debut, $date_fin, $prix, $bien2);
        }
        elseif(isset($_POST['deleteTarification']))
        {
            if(isset($_POST['idTarification']) && $_POST['idTarification'] != '')
            {
                $idTarification = $_POST['idTarification'];
            }
            else
            {
                $idTarification = null;
            }

            $controls_admin -> deleteTarification($idTarification);
        }
        else
        {
            $controls_admin -> gestionTarification($idTarification);
        }

    }

    if($_GET['action'] == 'addTarification')
    {

        if(isset($_POST['date_debut']) && $_POST['date_debut'] != '')
        {
            $date_debut = $_POST['date_debut'];
        }
        else
        {
            $date_debut = null;
        }

        if(isset($_POST['date_fin']) && $_POST['date_fin'] != '')
        {
            $date_fin = $_POST['date_fin'];
        }
        else
        {
            $date_fin = null;
        }

        if(isset($_POST['prix']) && $_POST['prix'] != '')
        {
            $prix = $_POST['prix'];
        }
        else
        {
            $prix = null;
        }

        if(isset($_POST['bien2']) && $_POST['bien2'] != '')
        {
            $bien2 = $_POST['bien2'];
        }
        else
        {
            $bien2 = null;
        }

        $controls_admin = new Controls_Admin();
        $controls_admin -> addTarification($date_debut, $date_fin, $prix, $bien2);
    }

    if($_GET['action'] == 'typeBien')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> typeBien();
    }

    if($_GET['action'] == 'listeTypeBien')
    {
        $controls_admin = new Controls_Admin();
        $controls_admin -> listeTypeBien();
    }

    if($_GET['action'] == 'gestionTypeBien')
    {
        $controls_admin = new Controls_Admin();

        if(isset($_POST['idTypeBien']) && $_POST['idTypeBien'] != '')
            {
                $idTypeBien = $_POST['idTypeBien'];
            }
            else
            {
                $idTypeBien = null;
            }

        if(isset($_POST['updateTypeBien']))
        {
    
            if(isset($_POST['idTypeBien']) && $_POST['idTypeBien'] != '')
            {
                $idTypeBien = $_POST['idTypeBien'];
            }
            else
            {
                $idTypeBien = null;
            }

            if(isset($_POST['type']) && $_POST['type'] != '')
            {
                $type = $_POST['type'];
            }
            else
            {
                $type = null;
            }

            $controls_admin -> updateTypeBien($idTypeBien, $type);
        }
        elseif(isset($_POST['deleteTypeBien']))
        {
            if(isset($_POST['idTypeBien']) && $_POST['idTypeBien'] != '')
            {
                $idTypeBien = $_POST['idTypeBien'];
            }
            else
            {
                $idTypeBien = null;
            }

            $controls_admin -> deleteTypeBien($idTypeBien);
        }
        else
        {
            $controls_admin -> gestionTypeBien($idTypeBien);
        }
        
    }

    if($_GET['action'] == 'addTypeBien')
    {
        if(isset($_POST['type']) && $_POST['type'] != '')
        {
            $type = $_POST['type'];
        }
        else
        {
            $type = null;
        }

        $controls_admin = new Controls_Admin();
        $controls_admin -> addTypeBien($type);
    }

    if($_GET['action'] == 'addPhoto')
    {
        if(isset($_POST['image']) && $_POST['image'] != '')
        {
            $image = $_POST['image'];
        }
        else
        {
            $image = null;
        }

        $controls_admin = new Controls_Admin();
        $controls_admin -> addPhoto($image);
    }
}
   

    