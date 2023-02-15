<?php

namespace Application\Controllers\Post;

require_once('src/lib/Database.php');
require_once('src/model/Post.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Post\PostRepository;

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