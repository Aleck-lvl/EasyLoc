<?php

require('model/userManager.php');

class Controls_Admin
{

    public function accueil()
    {
        $userManager = new userManager();

        include('client/view/accueil/accueil.php');
    }
   
}