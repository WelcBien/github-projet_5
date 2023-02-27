<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\Model\CommentRepository;

class HomeAdmin
{
    public function showHomeAdmin()

    {
         if(!isset($_SESSION['id']) || $_SESSION['admin'] != 1) {
            throw new \Exception("Vous devez être connecté");
        }
        $connection = new DatabaseConnection();

        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getCommentsInvalid();

        require_once('templates/homeAdmin.php');
    }
    public function executeHomeAdmin()
    {
        $valide = null;        
        if (isset($_GET['valide']) && !empty($_GET['valide'])) {            
            $valide = (int)['valide'];            
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $connection = new DatabaseConnection();
        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;

        $comment = $commentRepository->commentValide($_GET['valide']);
    }
    
    public function executeValide()
    {       
        if (isset($_GET['id']) && !empty($_GET['id']))
         {            
              $id = $_GET['id'];          
        } else {
            throw new \Exception('Aucun commentaire n\'a été trouvé !');
        }
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->commentValide($id);
        if (!$success) {
            throw new \Exception('Impossible de valider le commentaire !');
        } else {
            
            header('Location: index.php?action=homeAdmin');                      
        }

    }

}


