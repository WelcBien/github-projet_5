<?php
session_start();

require_once('vendor/autoload.php');

use Application\Controllers\User;
use Application\Controllers\Comment;
use Application\Controllers\Homepage;
use Application\Controllers\Post;
use Application\Controllers\Contact;
use Application\Controllers\HomeAdmin;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                (new Post())->showPost($identifier);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                (new comment())->executeAddComment($identifier, $_POST);
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
                (new Comment())->executeUpdateComment($identifier, $input);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }elseif ($_GET['action'] === 'Comment') { 
            (new Comment())->executeComment($identifier);
            
        }elseif ($_GET['action'] === 'deleteComment') {
            (new Comment())->executeDeleteComment();            

        }elseif ($_GET['action'] === 'updatePost') {            
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                (new Post())->showUpdatePost($identifier);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }

        }elseif ($_GET['action'] === 'updatePost-confirm') {
            (new Post())->executeUpdatePost();
            
        }elseif ($_GET['action'] === 'addPost') {
            (new Post())->showAddPost();

        }elseif ($_GET['action'] === 'addPost-confirm') {
            (new Post())->executeAddPost();
            
        }elseif ($_GET['action'] === 'deletePost') {
            (new Post())->executeDeletePost();
            
        }elseif ($_GET['action'] === 'User') { 
            (new User())->executeUser($identifier);
            
        }elseif ($_GET['action'] === 'contact') {           
            (new Contact())->execute(); 

        }elseif ($_GET['action'] === 'contact-confirm') {            
            (new Contact())->traitement(); 

        }elseif ($_GET['action'] === 'about') {            
            (new Homepage())->executeAbout();

        }elseif ($_GET['action'] === 'login') {            
            (new User())->executeLogin();
        
        }elseif ($_GET['action'] === 'login_confirm') {            
            (new User())->traitementLogin();

        }elseif ($_GET['action'] === 'signup') {            
            (new User())->executeSignup();

        }elseif ($_GET['action'] === 'signup-confirm') {            
            (new User())->traitementSignup();

        }elseif ($_GET['action'] === 'logout') {            
            (new User())->traitementLogout();      
            
        }elseif ($_GET['action'] === 'homeAdmin') {           
            (new HomeAdmin())->showHomeAdmin(); 
            
        }elseif ($_GET['action'] === 'valide') { 
            (new HomeAdmin())->executeValide();        

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