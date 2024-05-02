<?php

require_once('manager.php');

class userManager extends Manager
{
    public function setClient($column, $value)
    {
        $db = $this->dbConnect();
        $setClient = $db -> prepare('INSERT INTO clients ('.$column.') VALUES ('.$value.')');
        $setClient -> execute();

        return $setClient;
    }

    public function getClient($value, $whereClause)
    {
        $db = $this->dbConnect();
        $getClient = $db -> prepare('SELECT '.$value.' FROM clients '.$whereClause);
        $getClient -> execute();

        return $getClient;
    }

    public function updateClient($column, $whereClause)
    {
        $db = $this->dbConnect();
        $updateClient = $db -> prepare('UPDATE clients SET '.$column.' '.$whereClause );
        $updateClient -> execute();

        return $updateClient;
    }

    public function deleteClient($whereClause)
    {
        $db = $this->dbConnect();
        $deleteClient = $db -> prepare('DELETE FROM clients '.$whereClause);
        $deleteClient -> execute();

        return $deleteClient;
    }

    public function getStatut()
    {
        $db = $this->dbConnect();
        $getStatut = $db -> prepare('SELECT * FROM statut ');
        $getStatut -> execute();

        return $getStatut;
    }

    public function getvalid()
    {
        $db = $this->dbConnect();
        $getvalid = $db -> prepare('SELECT * FROM validation');
        $getvalid -> execute();

        return $getvalid;
    }


    public function setTypeBien($column, $value)
    {
        $db = $this->dbConnect();
        $setTypeBien = $db -> prepare('INSERT INTO type_bien ('.$column.') VALUES ('.$value.')');
        $setTypeBien -> execute();

        return $setTypeBien;
    }

    public function getTypeBien($whereClause)
    {
        $db = $this->dbConnect();
        $getTypeBien = $db -> prepare('SELECT * FROM type_bien '.$whereClause);
        $getTypeBien -> execute();

        return $getTypeBien;
    }

    public function updateTypeBien($column, $whereClause)
    {
        $db = $this->dbConnect();
        $updateTypeBien = $db -> prepare('UPDATE type_bien SET '.$column.' '.$whereClause );
        $updateTypeBien -> execute();

        return $updateTypeBien;
    }

    public function deleteTypeBien($whereClause)
    {
        $db = $this->dbConnect();
        $deleteTypeBien = $db -> prepare('DELETE FROM type_bien '.$whereClause);
        $deleteTypeBien -> execute();

        return $deleteTypeBien;
    }


    public function setBien($column, $value)
    {
        $db = $this->dbConnect();
        $setBien = $db -> prepare('INSERT INTO biens ('.$column.') VALUES ('.$value.')');
        $setBien -> execute();

        return $setBien;
    }

    public function getBien($whereClause)
    {
        $db = $this->dbConnect();
        $getBien = $db -> prepare('SELECT * FROM biens '.$whereClause);
        $getBien -> execute();

        return $getBien;
    }

    public function updateBien($column, $whereClause)
    {
        $db = $this->dbConnect();
        $updateBien = $db -> prepare('UPDATE biens SET '.$column.' '.$whereClause );
        $updateBien -> execute();

        return $updateBien;
    }

    public function deleteBien($whereClause)
    {
        $db = $this->dbConnect();
        $deleteBien = $db -> prepare('DELETE FROM biens '.$whereClause);
        $deleteBien -> execute();

        return $deleteBien;
    }

    public function setTarification($column, $value)
    {
        $db = $this->dbConnect();
        $setTarification = $db -> prepare('INSERT INTO tarif ('.$column.') VALUES ('.$value.')');
        $setTarification -> execute();

        return $setTarification;
    }

    public function getTarification($whereClause)
    {
        $db = $this->dbConnect();
        $getTarification = $db -> prepare('SELECT * FROM tarif '.$whereClause);
        $getTarification -> execute();

        return $getTarification;
    }

    public function updateTarification($column, $whereClause)
    {
        $db = $this->dbConnect();
        $updateTarification = $db -> prepare('UPDATE tarif SET '.$column.' '.$whereClause );
        $updateTarification -> execute();

        return $updateTarification;
    }

    public function deleteTarification($whereClause)
    {
        $db = $this->dbConnect();
        $deleteTarification = $db -> prepare('DELETE FROM tarif '.$whereClause);
        $deleteTarification -> execute();

        return $deleteTarification;
    }

    public function setReservation($column, $value)
    {
        $db = $this->dbConnect();
        $setReservation = $db -> prepare('INSERT INTO reservation ('.$column.') VALUES ('.$value.')');
        $setReservation -> execute();

        return $setReservation;
    }

    public function getReservation($whereClause)
    {
        $db = $this->dbConnect();
        $getReservation = $db -> prepare('SELECT * FROM reservation '.$whereClause);
        $getReservation -> execute();

        return $getReservation;
    }

    public function setPhoto($column, $value)
    {
        $db = $this->dbConnect();
        $setPhoto = $db -> prepare('INSERT INTO images ('.$column.') VALUES ('.$value.')');
        $setPhoto -> execute();

        return $setPhoto;
    }

    public function getImage()
    {
        $db = $this->dbConnect();
        $getImage = $db -> prepare('SELECT * FROM images');
        $getImage -> execute();

        return $getImage;
    }
}