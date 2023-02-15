

<?php $title = "Le blog de WelcDev"; ?>

<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Le Blog - projet_5</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="style.css" rel="stylesheet" />
    </head>
    <body>        
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <!-- <a class="navbar-brand" href="index.html">Start Bootstrap</a> -->
                <a href="index.php"><img class="navbar-brand" src="templates/assets/img/logo_blog.jpg" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=about">à propos de</a></li>
                        <?php if(!isset($_SESSION['id'])) { ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=login">connexion</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=signup">inscription</a></li>
                        <?php } else {?>
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=logout">déconnexion</a></li>
                        <?php } ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('templates/assets/img/post.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Un blog post</h1>
                            <span class="subheading">En résumé</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">        
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">               
                    <div class="col-md-10 col-lg-8 col-xl-7">  
                    <?php if(isset($_SESSION['id']) && $_SESSION['admin'] == 1) { ?>
                    <h2>Bienvenue sur la page Admin</h2>                    
                    <?php } ?>
                    <br /><br />                  
                        <h3>
                            <?= htmlspecialchars($post->title) ?>                            
                        </h3>                        

                        <h5>
                            <?= nl2br(htmlspecialchars($post->chapo)) ?>
                        </h5>

                        <p>
                            <?= nl2br(htmlspecialchars($post->content)) ?>
                        </p>
                        <p><em>le <?= $post->frenchCreationDate; ?></em></p>
                        <p><em>de <?= htmlspecialchars($post->author) ?></em></p>
                        <?php if(isset($_SESSION['id']) && $_SESSION['admin'] == 1) { ?>                                                    
                        <a type="submit" class="btn btn-warning text-uppercase" href="index.php?action=updatePost&id=<?= $post->identifier ?>">Modifier</a>                        
                        <a type="submit" class="btn btn-danger text-uppercase" href="index.php?action=deletePost&id=<?= $post->identifier ?>">Supprimer</a>                        
                        <?php } ?>                        
                        <em><a href="index.php"><p class="msg_b">Retour à la liste des posts</p></a></em>                        
                    </div>                    
                </div>
            </div>
        </article>
        <div class="container">
        <h3>Commentaires</h3>
        <?php if(isset($_SESSION['id'])) { ?>
        <form class="container" action="index.php?action=addComment&id=<?= $post->identifier ?>" method="post">        
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" /><br /><br />
            </div>
        </form>
        <?php } else {?>
            <p class="msg_er">Connectez vous pour laisser un commentaire !</p>
        <?php } ?>
        <?php
        foreach ($comments as $comment) {
        ?>
            
        <p><?= htmlspecialchars($comment->comment) ?></p> 
        <p><em>le <?= $comment->frenchCreationDate ?></em></p>
        <?php if(isset($_SESSION['id']) && $_SESSION['admin'] == 1) { ?>        
        <a type="submit" class="btn btn-warning" href="index.php?action=updateComment&id=<?= $comment->identifier ?>">Modifier le commentaire</a>
        <?php } ?>             
        <hr>
        <?php
        }
        ?>
        <?php $content = ob_get_clean(); ?>
        <?php require('layout.php') ?>
        <?php if(isset($_SESSION['id']) && $_SESSION['admin'] == 1) { ?>
        <em><a href="index.php?action=homeAdmin"><p class="msg_b">La liste des commentaires</p></a></em> 
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="index.php?action=addPost">Ajouter un Post →</a></div>
        <?php } ?>
        <?php require('footer.php') ?>
    </body>
</html>
