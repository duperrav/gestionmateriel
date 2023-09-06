<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


class Connexion
{

session_start();
session_unset();

    $message="";
    if (isset($_POST["message"])) 
    {
        $message = $_POST["message"];
    }

}



