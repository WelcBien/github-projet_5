<?php

namespace Application\Controllers;

require_once('src/lib/Database.php');
require_once('src/model/Comment.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Comment\CommentRepository;

class AddComment
{
    public function execute(string $post, array $input)
    {
        
        $comment = null;        
        if (!empty($input['comment'])) {            
            $comment = $input['comment'];            
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $success = $commentRepository->createComment($post, $comment);
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=post&id=' . $post);
        }
    }
}