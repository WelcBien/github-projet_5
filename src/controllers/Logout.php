<?php

namespace Application\Controllers;

class Logout
{
    public function traitement()
    {   
        $_SESSION = [];
        session_destroy();
        header('Location: index.php');
    }
}
