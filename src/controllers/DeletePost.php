<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\Model\PostRepository;

class DeletePost
{
    public function execute()
    {       
        if (isset($_GET['id']) &&!empty($_GET['id']))
         {            
              $id = $_GET['id'];          
        } else {
            throw new \Exception('Aucun post n\'a été trouvé !');
        }

        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $success = $postRepository->deletePost($id);
        if (!$success) {
            throw new \Exception('Impossible de supprimer le post !');
        } else {
            
            header("Location: index.php");
        }
    }
}