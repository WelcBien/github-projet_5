<?php

namespace Application\Controllers\Connexion;

require_once('src/lib/Database.php');
require_once('src/model/Comment.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Comment\commentRepository;

class HomeAdmin
{
    public function show()

    {
        $connection = new DatabaseConnection();

        $commentRepository = new commentRepository();
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


