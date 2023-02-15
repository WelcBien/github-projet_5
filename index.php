<?php
session_start();

require_once('src/controllers/comment/Add.php');
require_once('src/controllers/comment/Update.php');
require_once('src/controllers/Homepage.php');
require_once('src/controllers/Post/Post.php');
require_once('src/controllers/Contact.php');
require_once('src/controllers/About.php');
require_once('src/controllers/Connexion/Login.php');
require_once('src/controllers/Connexion/Signup.php');
require_once('src/controllers/Post/AddPost.php');
require_once('src/controllers/Post/UpdatePost.php');
require_once('src/controllers/Post/DeletePost.php');
require_once('src/controllers/Comment/DeleteComment.php');
require_once('src/controllers/Connexion/Logout.php');
require_once('src/controllers/Connexion/HomeAdmin.php');
require_once('src/controllers/Comment/Valide.php');

use Application\Controllers\AddComment;
use Application\Controllers\UpdateComment;
use Application\Controllers\Homepage;
use Application\Controllers\Post\Post;
use Application\Controllers\Contact;
use Application\Controllers\About;
use Application\Controllers\Connexion\Login;
use Application\Controllers\Connexion\Signup;
use Application\Controllers\Post\AddPost;
use Application\Controllers\Post\UpdatePost;
use Application\Controllers\Post\DeletePost;
use Application\Controllers\Comment\DeleteComment;
use Application\Controllers\Connexion\Logout;
use Application\Controllers\Connexion\HomeAdmin;
use Application\Controllers\Comment\Valide;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new Post())->execute($identifier);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new AddComment())->execute($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } elseif ($_GET['action'] === 'updateComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                // Il définit l'entrée uniquement lorsque la méthode HTTP est POST (c'est-à-dire que le formulaire est soumis).
                $input = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $_POST;
                }
                (new UpdateComment())->execute($identifier, $input);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }       

        }elseif ($_GET['action'] === 'updatePost') {
            
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                (new UpdatePost())->show($identifier);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        }elseif ($_GET['action'] === 'updatePost-confirm') {
            (new AddPost())->execute();
            
        }elseif ($_GET['action'] === 'addPost') {
            (new AddPost())->show();

        }elseif ($_GET['action'] === 'addPost-confirm') {
            (new AddPost())->execute();
            
        }elseif ($_GET['action'] === 'deletePost') {
            (new DeletePost())->execute();

        }elseif ($_GET['action'] === 'deleteComment') {
            (new DeleteComment())->execute();
            
        }elseif ($_GET['action'] === 'contact') {           
            (new Contact())->execute(); 

        }elseif ($_GET['action'] === 'contact-confirm') {            
            (new Contact())->traitement(); 

        }elseif ($_GET['action'] === 'about') {            
            (new About())->execute();

        }elseif ($_GET['action'] === 'login') {            
            (new Login())->execute();
        
        }elseif ($_GET['action'] === 'login_confirm') {            
            (new Login())->traitement();

        }elseif ($_GET['action'] === 'signup') {            
            (new Signup())->execute();

        }elseif ($_GET['action'] === 'signup-confirm') {            
            (new Signup())->traitement();

        }elseif ($_GET['action'] === 'logout') {            
            (new logout())->traitement();      
            
        }elseif ($_GET['action'] === 'homeAdmin') {           
            (new HomeAdmin())->show(); 
            
        }elseif ($_GET['action'] === 'valide') { 
            (new Valide())->execute();

        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }    

    } else {
        (new Homepage())->execute();    
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}