<?php

namespace Application\Controllers;

require_once('src/model/Contact.php');
require_once('src/lib/Database.php');

use Application\Model\Contact\ContactRepository;
use Application\Lib\Database\DatabaseConnection;

class Contact
{
    public function execute()
    {    
        require('templates/contact.php');
    }
    public function traitement()
    {
       if(!empty($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['msg'])) 
       { 
            $lastname = htmlspecialchars($_POST['lastname']);
            $firstname = htmlspecialchars($_POST['firstname']); 
            $email = htmlspecialchars($_POST['email']); 
            $msg = htmlspecialchars($_POST['msg']);
        
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            }else{
                throw new \Exception('Email non valide');                
            }
        
        } else {
            throw new \Exception('Merci de remplir tous les champs !');           
        }   
        $connection = new DatabaseConnection();
        $contactRepository = new ContactRepository();
        $contactRepository->connection = $connection;                        
        $contactRepository->send($_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['msg']); 

        // code mail
        $dest = "welcdev@gmail.com";
        $objet = "Test";
        $message = "Hello world";
        $entetes = "Essaie";

        mail($dest,$objet,$message,$entetes);

        header("Location: index.php?action=contact&send=ok");       
        }   
    
}