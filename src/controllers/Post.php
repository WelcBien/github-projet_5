<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\Model\CommentRepository;
use Application\Model\PostRepository;

class Post
{
    public function showPost(string $identifier)
    {
        $connection = new DatabaseConnection();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $post = $postRepository->getPost($identifier);

        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getComments($identifier);

        require('templates/post.php');
    }

    public function showAddPost()
    {
        require_once('templates/addPost.php');
    }
    public function executeAddPost()
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