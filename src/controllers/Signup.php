<?php

namespace Application\Controllers;

use Application\Model\UserRepository;
use Application\Lib\DatabaseConnection;

class Signup
{
    public function execute()
    {    
        require('templates/signup.php');
    }
    public function traitement()
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
        
}

