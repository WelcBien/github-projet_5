<?php

namespace Application\Controllers\Post;

require_once('src/lib/Database.php');
require_once('src/model/Post.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Post\PostRepository;

class UpdatePost
{
    public function show($id)

    {
        $connection = new DatabaseConnection();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $post = $postRepository->getPost($id);

        require_once('templates/updatePost.php');
    }
    public function execute()
    {
        $title = null;
        $chapo = null;
        $content = null;        
        if (!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content'])) {            
            $title = $_POST['title'];
            $chapo = $_POST['chapo'];
            $content = $_POST['content'];            
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

            $postRepository = new PostRepository();
            $postRepository->connection = new DatabaseConnection();
            $success = $postRepository->updatePost($title, $chapo, $content, 1);
            if (!$success) {
                throw new \Exception('Impossible de modifier le post !');
            } else {
                header('Location: index.php?action=post&id=' . $success);
            }            

        }

}
