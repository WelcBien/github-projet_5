<?php

namespace Application\Controllers\Connexion;

require_once('src/model/User.php');
require_once('src/lib/Database.php');

use Application\Model\User\UserRepository;
use Application\Lib\Database\DatabaseConnection;

class Login
{
    public function execute()
    {    
        require('templates/login.php');
    }
   
    public function traitement()
     {
        if(!empty($_POST['pseudo']) && !empty($_POST['password'])) 
        { 
            $connection = new DatabaseConnection();
            $userRepository = new UserRepository();
            $userRepository->connection = $connection;

            $user = $userRepository->userExist($_POST['pseudo']);        
            
            if(password_verify($_POST['password'], $user['password'])) 
            { 
                $_SESSION['id'] = $user['id'];
                $_SESSION['pseudo'] = $user['pseudo']; 
                $_SESSION['admin'] = $user['admin'];

                header("Location: index.php");
            
            } else {
                throw new \Exception('Mot de passe invalide !');              
                    
            }   
        
        } else {
            throw new \Exception('Merci de remplir tous les champs !');
        }
     
     }

}