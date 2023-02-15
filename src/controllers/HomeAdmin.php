<?php

namespace Application\Controllers;

use Application\Lib\DatabaseConnection;
use Application\Model\CommentRepository;

class HomeAdmin
{
    public function show()

    {
        $connection = new DatabaseConnection();

        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getCommentsInvalid();

        require_once('templates/homeAdmin.php');
    }
    public function execute()
    {
        $valide = null;        
        if (isset($_GET['valide']) && !empty($_GET['valide'])) {            
            $valide = (int)['valide'];            
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $connection = new DatabaseConnection();
        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;

        $comment = $commentRepository->commentValide($_GET['valide']);
            }            

        }


