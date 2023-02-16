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
}