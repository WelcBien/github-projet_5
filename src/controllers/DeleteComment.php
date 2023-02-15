<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\Model\CommentRepository;

class DeleteComment
{
    public function execute()
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