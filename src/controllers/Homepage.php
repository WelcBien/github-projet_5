<?php

namespace Application\Controllers;

require_once('src/lib/Database.php');
require_once('src/model/Post.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Post\PostRepository;

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
}
