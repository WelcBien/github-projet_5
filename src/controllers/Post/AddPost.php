<?php

namespace Application\Controllers\Post;

require_once('src/lib/Database.php');
require_once('src/model/Post.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Post\PostRepository;

class AddPost
{
    public function show()
    {
        require_once('templates/addPost.php');
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
            throw new \Exception('Veuillez remplir tous les champs du formulaire.');
        }

        $postRepository = new PostRepository();
        $postRepository->connection = new DatabaseConnection();
        $success = $postRepository->createPost($title, $chapo, $content, $author, $_SESSION['id']);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter le post !');
        } else {
            header('Location: index.php?action=post&id=' . $success);            
        }
    }
 }
