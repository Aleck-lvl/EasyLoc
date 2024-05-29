<?php

require('model/userManager.php');

class Controls_Admin
{

    public function destroy()
    {
        header('location: login.php');
    }

    public function accueil()
    {
        $userManager = new userManager();

        $whereClause = " b
                        INNER JOIN images i
                        ON b.id_bien = i.id_bien
                        LIMIT 1";
        $getBien = $userManager->getBien($whereClause);
        $tabBien = $getBien->fetchAll();

        include('view/accueil/accueil.php');
    }

    public function account()
    {
        $userManager = new userManager();

        $value = "*";
        $whereClause = "c
                        INNER JOIN commune com
                        ON c.id_commune = com.id_commune
                        WHERE nom_client = '".$_SESSION['username']."'";
        $getClient = $userManager->getClient($value, $whereClause);
        $tabClient = $getClient->fetchAll();

        include('view/account/account.php');
    }

    public function updateAccount($idClient, $nom, $prenom, $rue, $commune, $mail)
    {
        $userManager = new userManager();

        $column = 'nom_client = "'.$nom.'", prenom_client = "'.$prenom.'", rue_client = "'.$rue.'", id_commune = "'.$commune.'", mail_client = "'.$mail.'"';
        $whereClause = 'WHERE id_client = "'.$idClient.'"';
        $updateClient = $userManager->updateClient($column, $whereClause);

        header('location: '.baseLinkClient.'/index.php?action=account');

    }

    public function voirPlus($idBien)
    {
        $userManager = new userManager();

        $whereClause = "WHERE id_bien = '".$idBien."'";
        $getBien = $userManager->getBien($whereClause);
        $tabBien = $getBien->fetchAll();

        $whereClause = " b
                        INNER JOIN images i
                        ON b.id_bien = i.id_bien
                        WHERE b.id_bien = '".$idBien."'";
        $getImage = $userManager->getBien($whereClause);
        $tabImage = $getImage->fetchAll();

        include('view/bien/bien.php');
    }
   
    public function reservation($idBien)
    {
        $userManager = new userManager();

        $value = "id_client";
        $whereClause = " WHERE nom_client = '".$_SESSION['username']."'";
        $getClient = $userManager->getClient($value, $whereClause);
        $tabClient = $getClient->fetch();

        include('fullcalendar/index.php');
    }

    public function mesReservation()
    {
        $userManager = new userManager();

        $whereClause = " ";
        $getReservation = $userManager->getReservation($whereClause);
        $tabReservation = $getReservation->fetch();

        $value = "id_client";
        $whereClause = "";
        $getClient = $userManager->getClient($value, $whereClause);
        $tabClient = $getClient->fetch();

        $whereClause = "";
        $getBien = $userManager->getBien($whereClause);
        $tabBien = $getBien->fetch();

        include('fullcalendar/indexResa.php');
    }
}