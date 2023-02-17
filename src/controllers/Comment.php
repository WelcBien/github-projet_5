<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\Model\CommentRepository;

class Comment
{
    public function executeComment(string $identifier)
    {
        $connection = new DatabaseConnection();
        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comment = $commentRepository->getComment($identifier);        

        require('index.php');
    }

    public function executeAddComment(string $post, array $input)
    {        
        $comment = null;        
        if (!empty($input['comment'])) {            
            $comment = $input['comment'];            
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->createComment($post, $comment);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $post);
        }
    }

    public function executeDeleteComment()
    {       
        if (isset($_GET['id']) &&!empty($_GET['id']))
         {            
              $id = $_GET['id'];          
        } else {
            throw new \Exception('Aucun commentaire n\'a été trouvé !');
        }

        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->deleteComment($id);
        if (!$success) {
            throw new \Exception('Impossible de supprimer le commentaire !');
        } else {
            
            header('Location: index.php?action=homeAdmin');           
        }
    }

    public function executeUpdateComment(string $identifier, ?array $input)
    {
        // Il gère la soumission du formulaire lorsqu'il y a une entrée.
        if ($input !== null) {            
            $comment = null;                
            if (!empty($input['comment'])) {               
                $comment = $input['comment'];                
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }

            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $success = $commentRepository->updateComment($identifier, $comment);
            if (!$success) {
                throw new \Exception('Impossible de modifier le commentaire !');
            } else {
                header('Location: index.php?action=updateComment&id=' . $identifier);
            }            

        }
        // Sinon, il affiche le formulaire.
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comment = $commentRepository->getComment($identifier);
        if ($comment === null) {
            throw new \Exception("Le commentaire $identifier n'existe pas.");
        }

        require('templates/updateComment.php');
    }
}