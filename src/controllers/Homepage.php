<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\Model\PostRepository;

class Homepage
{
    public function execute()
    { 
        $connection = new DatabaseConnection();

        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $posts = $postRepository->getPosts();
   
        require('templates/homepage.php');
    }

    public function executeAbout()
    {    
        require('templates/about.php');
    }
}
