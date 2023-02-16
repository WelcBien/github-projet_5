<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\Model\UserRepository;

class User
{
    public function executeUser(string $identifier)
    {
        $connection = new DatabaseConnection();

        $userRepository = new UserRepository();
        $userRepository->connection = $connection;
        $user = $userRepository->getUser($identifier);        

        require('index.php');
    }

    public function executeSignup()
    {    
        require('templates/signup.php');
    }
    public function traitementSignup()
    {
       if(!empty($_POST['pseudo']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['password']) && !empty($_POST['email'])) 
       {     
        $connection = new DatabaseConnection();
        $userRepository = new UserRepository();
        $userRepository->connection = $connection;
        
        if($userRepository->userExist($_POST['pseudo']))
        {
            throw new \Exception('Ce pseudo existe déjà sur le site.');    

        }else{
            $userRepository->register($_POST['pseudo'], $_POST['lastname'], $_POST['firstname'], $_POST['email'], password_hash($_POST['password'], PASSWORD_BCRYPT));
        }
            
            header("Location: index.php?action=signup&inscription=ok");  
                
        } else {
            throw new \Exception('Merci de remplir tous les champs.');            
        }
    }
    
    public function executeLogin()
    {    
        require('templates/login.php');
    }
   
    public function traitementLogin()
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

     public function traitementLogout()
    {   
        $_SESSION = [];
        session_destroy();
        header('Location: index.php');
    }
}