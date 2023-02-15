<?php

namespace Application\Controllers;

use Application\Model\ContactRepository;
use Application\Lib\DatabaseConnection;

class Contact
{
    public function execute()
    {    
        require('templates/contact.php');
    }
    public function traitement()
    {
       if(!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['msg'])) 
       {       
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);    
        $email = htmlspecialchars($_POST['email']);
        $msg = htmlspecialchars($_POST['msg']);                
        
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            }else{
                throw new \Exception('Email non valide');                
            }      
        
        $connection = new DatabaseConnection();
        $contactRepository = new ContactRepository();
        $contactRepository->connection = $connection;                        
        $contactRepository->send($_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['msg']); 

        // Envoyer l'email

        // Le destinataire
        $to = "welcdev@gmail.com";

        // Objet du mail
        $subject = "Vous avez reçu un message de : " . $email;

        $message = "
            <p>De <strong> " .$email. "</strong><p>
            <p><strong>Nom :</strong> " .$lastname. "</p>
            <p><strong>Téléphone :</strong> " .$firstname. "</p>
            <p><strong>Message :</strong> " .$msg. "</p>
        ";

        // Définir le type de contenu lors de l'envoi d'un e-mail HTML
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // L'en-tête
        $headers .= 'From: <' .$email. '>' . "\r\n";        
            
        // envoi du mail
        mail($to,$subject,$message,$headers);
        
            header("Location: index.php?action=contact&send=ok");            

        } else {
            throw new \Exception('Merci de remplir tous les champs !');           
        }    
                 
    }   
    
}