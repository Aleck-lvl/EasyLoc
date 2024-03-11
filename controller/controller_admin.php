<?php

require('model/userManager.php');

class Controls_Admin
{

    public function accueil()
    {
        $userManager = new userManager();

        include('view/accueil/accueil.php');
    }
    public function client()
    {
        $userManager = new userManager();

        $getStatut = $userManager->getStatut();
        $tabStatut = $getStatut->fetchAll();

        $getValid = $userManager->getvalid();
        $tabValid = $getValid->fetchAll();

        include('view/client/client.php');
    }

    public function listeClient()
    {
        $userManager = new userManager();

        $whereClause = '';
        $getClient = $userManager->getClient($whereClause);
        $tabClient = $getClient->fetchAll();

        include('view/client/listeClient.php');
    }

    public function gestionClient($idClient)
    {
        $userManager = new userManager();

        $getStatut = $userManager->getStatut();
        $tabStatut = $getStatut->fetchAll();

        $getValid = $userManager->getvalid();
        $tabValid = $getValid->fetchAll();

        $whereClause = "c
                        INNER JOIN statut s
                        ON c.id_statut = s.id_statut
                        INNER JOIN validation v
                        ON c.id_valid = v.id_valid
                        INNER JOIN commune com
                        ON c.id_commune = com.id_commune
                        WHERE id_client = '".$idClient."'";
        $getClient = $userManager->getClient($whereClause);
        $tabClient = $getClient->fetchAll();

        include('view/client/gestionClient.php');
    }

    public function updateClient($idClient, $nom, $prenom, $rue, $commune, $mail, $password, $statut, $validation)
    {
        $userManager = new userManager();

        $column = 'nom_client = "'.$nom.'", prenom_client = "'.$prenom.'", rue_client = "'.$rue.'", id_commune = "'.$commune.'", mail_client = "'.$mail.'", pass_client = "'.$password.'", 
                    id_statut = "'.$statut.'", id_valid = "'.$validation.'"';
        $whereClause = 'WHERE id_client = "'.$idClient.'"';
        $updateClient = $userManager->updateClient($column, $whereClause);

        header('location: '.baseLink.'/index.php?action=listeClient');

    }

    public function deleteClient($idClient)
    {
        $userManager = new userManager();

        $whereClause = 'WHERE id_client = "'.$idClient.'"';
        $deleteClient = $userManager->deleteClient($whereClause);

        header('location: '.baseLink.'/index.php?action=listeClient');
    }

    public function addClient($nom, $prenom, $rue, $commune, $mail, $password, $statut, $validation)
    {
        $userManager = new userManager();
    
        $column = 'nom_client, prenom_client, rue_client, id_commune, mail_client, pass_client, id_statut, id_valid';
        $value = '"'.$nom.'", "'.$prenom.'", "'.$rue.'", "'.$commune.'", "'.$mail.'", "'.$password.'", "'.$statut.'", "'.$validation.'"';
        $setClient = $userManager->setClient($column, $value);

        header('location: '.baseLink.'/index.php?action=client');
    }

    public function bien()
    {
        $userManager = new userManager();

        $getImage = $userManager->getImage();
        $tabImage = $getImage->fetchAll();

        $getStatut = $userManager->getStatut();
        $tabStatut = $getStatut->fetchAll();

        $whereClause = "";
        $getTypeBien = $userManager->getTypeBien($whereClause);
        $tabTypeBien = $getTypeBien->fetchAll();

        include('view/bien/bien.php');
    }

    public function listeBien()
    {
        $userManager = new userManager();

        $whereClause = "";
        $getBien = $userManager->getBien($whereClause);
        $tabBien = $getBien->fetchAll();

        include('view/bien/listeBien.php');
    }

    public function gestionBien($idBien)
    {
        $userManager = new userManager();

        $getStatut = $userManager->getStatut();
        $tabStatut = $getStatut->fetchAll();

        $whereClause = "";
        $getTypeBien = $userManager->getTypeBien($whereClause);
        $tabTypeBien = $getTypeBien->fetchAll();

        $whereClause = "b
                        INNER JOIN statut s
                        ON b.id_statut = s.id_statut
                        INNER JOIN type_bien tb
                        ON b.id_type_bien = tb.id_type_bien
                        INNER JOIN commune c
                        ON b.id_commune = c.id_commune
                        WHERE id_bien = '".$idBien."'";
        $getBien = $userManager->getBien($whereClause);
        $tabBien = $getBien->fetchAll();

        include('view/bien/gestionBien.php');
    }

    public function deleteBien($idBien)
    {
        $userManager = new userManager();

        $whereClause = 'WHERE id_bien = "'.$idBien.'"';
        $deleteBien = $userManager->deleteBien($whereClause);

        header('location: '.baseLink.'/index.php?action=listeBien');
    }

    public function updateBien($idBien, $nom, $rue, $commune, $superficie, $couchage, $piece, $chambre, $descriptif, $reference,  $photo, $statut, $idTypeBien)
    {
        $userManager = new userManager();

        $column = 'nom_bien = "'.$nom.'", rue_bien = "'.$rue.'", id_commune = "'.$commune.'", sup_bien = "'.$superficie.'", nb_couchage = "'.$couchage.'", nb_pieces = "'.$piece.'", 
                    nb_chambres = "'.$chambre.'", descriptif = "'.$descriptif.'", ref_bien = "'.$reference.'", lien_photo = "'.$photo.'", id_statut = "'.$statut.'", id_type_bien = "'.$idTypeBien.'"';
        $whereClause = 'WHERE id_bien = "'.$idBien.'"';
        $updateBien = $userManager->updateBien($column, $whereClause);

        header('location: '.baseLink.'/index.php?action=listeBien');

    }

    public function addBien($nom, $rue, $commune, $superficie, $couchage, $piece, $chambre, $descriptif, $reference, $statut, $photo, $idTypeBien)
    {
        $userManager = new userManager();
    
        $column = 'nom_bien, rue_bien, id_commune, sup_bien, nb_couchage, nb_pieces, nb_chambres, descriptif, ref_bien, lien_photo, id_statut, id_type_bien';
        $value = '"'.$nom.'", "'.$rue.'", "'.$commune.'", "'.$superficie.'", "'.$couchage.'", "'.$piece.'", "'.$chambre.'", "'.$descriptif.'", "'.$reference.'", "'.$statut.'", "'.$photo.'", "'.$idTypeBien.'"';
        $setBien = $userManager->setBien($column, $value);

        header('location: '.baseLink.'/index.php?action=bien');
    }

    public function reservation()
    {
        $userManager = new userManager();

        $whereClause = "";
        $getReservation = $userManager->getReservation($whereClause);
        $tabReservation = $getReservation->fetchAll();

        include('fullcalendar/index.php');
    }

    public function addreservation($idClient, $startTime, $endTime, $title, $commentaire)
    {
        $userManager = new userManager();
    
        $column = 'idClient, date_debut, date_fin, title, commentaire';
        $value = '"'.$idClient.'", "'.$startTime.'", "'.$endTime.'", "'.$title.'", "'.$commentaire.'"';
        $setReservation = $userManager->setReservation($column, $value);

        header('location: '.baseLink.'/index.php?action=reservation');
    }

    public function tarification()
    {
        $userManager = new userManager();

        $whereClause = "";
        $getBien = $userManager->getBien($whereClause);
        $tabBien = $getBien->fetchAll();


        include('view/tarification/tarification.php');
    }

    public function listeTarification()
    {
        $userManager = new userManager();

        $whereClause = "";
        $getTarification = $userManager->getTarification($whereClause);
        $tabTarification = $getTarification->fetchAll();

        include('view/tarification/listeTarification.php');
    }

    public function gestionTarification($idTarification)
    {
        $userManager = new userManager();

        $whereClause = "";
        $getBien = $userManager->getBien($whereClause);
        $tabBien = $getBien->fetchAll();

        $whereClause = "t
                        INNER JOIN biens b
                        ON b.id_bien = t.id_bien
                        WHERE id_tarif = '".$idTarification."'";
        $getTarification = $userManager->getTarification($whereClause);
        $tabTarification = $getTarification->fetchAll();

        include('view/tarification/gestionTarification.php');
    }

    public function updateTarification($idTarification, $date_debut, $date_fin, $prix, $bien2)
    {
        $userManager = new userManager();

        $column = 'dd_tarif = "'.$date_debut.'", df_tarif = "'.$date_fin.'", prix_loc = "'.$prix.'", id_bien = "'.$bien2.'"';
        $whereClause = 'WHERE id_tarif = "'.$idTarification.'"';
        $updateTarification = $userManager->updateTarification($column, $whereClause);

        header('location: '.baseLink.'/index.php?action=listeTarification');

    }

    public function deleteTarification($idTarification)
    {
        $userManager = new userManager();

        $whereClause = 'WHERE id_tarif = "'.$idTarification.'"';
        $deleteTarification = $userManager->deleteTarification($whereClause);

        header('location: '.baseLink.'/index.php?action=listeTarification');
    }

    public function addTarification($date_debut, $date_fin, $prix, $bien2)
    {
        $userManager = new userManager();
    
        $column = 'dd_tarif, df_tarif, rue_client, prix_loc, id_bien';
        $value = '"'.$date_debut.'", "'.$date_fin.'", "'.$prix.'", "'.$bien2.'"';
        $setTarification = $userManager->setTarification($column, $value);

        header('location: '.baseLink.'/index.php?action=client');
    }

    public function typeBien()
    {
        $userManager = new userManager();

        include('view/typeBien/typeBien.php');
    }

    public function listeTypeBien()
    {
        $userManager = new userManager();

        $whereClause = "";
        $getTypeBien = $userManager->getTypeBien($whereClause);
        $tabTypeBien = $getTypeBien->fetchAll();

        include('view/typeBien/listeTypeBien.php');
    }

    public function gestionTypeBien($idTypeBien)
    {
        $userManager = new userManager();

        $whereClause = "WHERE id_type_bien = '".$idTypeBien."'";
        $getTypeBien = $userManager->getTypeBien($whereClause);
        $tabTypeBien = $getTypeBien->fetchAll();

        include('view/typeBien/gestionTypeBien.php');
    }

    public function updateTypeBien($idtypeBien, $type)
    {
        $userManager = new userManager();

        $column = 'lib_type_bien = "'.$type.'"';
        $whereClause = 'WHERE id_type_bien = "'.$idtypeBien.'"';
        $updateTypeBien = $userManager->updateTypeBien($column, $whereClause);

        header('location: '.baseLink.'/index.php?action=listeTypeBien');

    }

    public function deleteTypeBien($idTypeBien)
    {
        $userManager = new userManager();

        $whereClause = 'WHERE id_type_bien = "'.$idTypeBien.'"';
        $deleteTypeBien = $userManager->deleteTypeBien($whereClause);

        header('location: '.baseLink.'/index.php?action=listeTypeBien');
    }

    public function addTypeBien($type)
    {
        $userManager = new userManager();
    
        $column = 'lib_type_bien';
        $value = '"'.$type.'"';
        $setTypeBien = $userManager->setTypeBien($column, $value);

        header('location: '.baseLink.'/index.php?action=typeBien');
    }

    public function addPhoto($image)
    {

        $userManager = new userManager();

        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));

        $column = 'image';
        $value = '"'.$imgData.'"';
        $setPhoto = $userManager->setPhoto($column, $value);
    }
}