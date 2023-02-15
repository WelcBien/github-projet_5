<?php

namespace Application\Controllers;

require_once('src/lib/Database.php');
require_once('src/model/Comment.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Comment\CommentRepository;

class UpdateComment
{
    public function execute(string $identifier, ?array $input)
    {
        // Il gère la soumission du formulaire lorsqu'il y a une entrée.
        if ($input !== null) {            
            $comment = null;                
            if (!empty($input['comment'])) {               
                $comment = $input['comment'];                
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }

            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $success = $commentRepository->updateComment($identifier, $comment);
            if (!$success) {
                throw new \Exception('Impossible de modifier le commentaire !');
            } else {
                header('Location: index.php?action=updateComment&id=' . $identifier);
            }            

        }

        // Sinon, il affiche le formulaire.
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comment = $commentRepository->getComment($identifier);
        if ($comment === null) {
            throw new \Exception("Le commentaire $identifier n'existe pas.");
        }

        require('templates/updateComment.php');
    }
}