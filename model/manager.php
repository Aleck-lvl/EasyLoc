<?php

class Manager
{
    protected function dbConnect()
    {
        $host_name = 'localhost';
        $database = 'projet';
        $user_name = 'root';
        $password = '';
        $db = null;
        try
        {
            $dbFormulaire = new PDO("mysql:host=$host_name; dbname=$database", $user_name, $password);
            return $dbFormulaire;
        }
        catch(PDOException $e)
        {
            echo "Erreur!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}