<?php

namespace Application\Controllers\Connexion;

require_once('src/model/User.php');
require_once('src/lib/Database.php');

use Application\Model\User\UserRepository;
use Application\Lib\Database\DatabaseConnection;

class Signup
{
    public function execute()
    {    
        require('templates/signup.php');
    }
    public function traitement()
    {
       if(!empty($_POST['pseudo']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['password']) && isset($_POST['email'])) 
       {     
        // Code, les données de l'user

        $connection = new DatabaseConnection();
        $userRepository = new UserRepository();
        $userRepository->connection = $connection;
        
        if($userRepository->userExist($_POST['pseudo']))
        {
            throw new \Exception('Ce pseudo existe déjà sur le site.');

        }else{
            $userRepository->register($_POST['pseudo'], $_POST['lastname'], $_POST['firstname'], $_POST['email'], password_hash($_POST['password'], PASSWORD_BCRYPT));
        }
            // Code; authentification sur le site at récup des données da les variables globales sessions 
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $firstname = htmlspecialchars($_POST['firstname']);             
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $email = htmlspecialchars($_POST['email']);    
        
    } else {
        throw new \Exception('Merci de remplir tous les champs.');        
    }
        
        header("Location: index.php?action=signup&inscription=ok");
               
    }    
    
}

