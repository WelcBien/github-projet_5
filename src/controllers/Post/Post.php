<?php

namespace Application\Controllers\Post;

require_once('src/lib/Database.php');
require_once('src/model/Comment.php');
require_once('src/model/Post.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Comment\CommentRepository;
use Application\Model\Post\PostRepository;

class Post
{
    public function execute(string $identifier)
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
}