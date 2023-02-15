<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\Model\PostRepository;

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
        $author = null;        
        if (!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content']) && !empty($_POST['author'])) {            
            $title = $_POST['title'];
            $chapo = $_POST['chapo'];
            $content = $_POST['content'];
            $author = $_POST['author'];            
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

            $postRepository = new PostRepository();
            $postRepository->connection = new DatabaseConnection();
            $success = $postRepository->updatePost($title, $chapo, $content, $author, $_GET['id']);
            if (!$success) {
                throw new \Exception('Impossible de modifier le post !');
            } else {
                header('Location: index.php?action=post&id=' . $success);
            }            

        }

}
