<?php $title = "Le blog de WelcDev !"; ?>

<?php ob_start(); ?> <!-- Mémorise toute sortie HTML -->

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Le Blog - projet_5</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />        
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>        
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <!-- <a class="navbar-brand" href="index.php">Start Bootstrap</a> -->
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
        <header class="masthead" style="background-image: url('templates/assets/img/home_blog.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Le Blog </h1>
                            <span class="subheading">WelcDev, le Développeur qu'il vous faut !</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                    <?php                       
                        foreach ($posts as $post) {
                    ?> 
                    
                        <h2>
                            <?= htmlspecialchars($post->title); ?>                            
                        </h2>
            
                        <h5>
                            <?= nl2br(htmlspecialchars($post->chapo)); ?>                            
                        </h5>
                        
                        <p><em>le <?= $post->frenchCreationDate; ?></em></p>                        
                        <?php if(isset($_SESSION['id'])) { ?>                            
                        <em><a href="index.php?action=post&id=<?= urlencode($post->identifier) ?>"><p class="msg_b">Lire la suite →</p></a></em> 
                        <?php } ?>
                    <!-- Divider-->
                    <hr class="my-4" />                    
                    <?php
                    }
                    ?>
                    <?php $content = ob_get_clean(); ?> <!-- Pour récupérer le contenu généré et on met le tout dans $content -->

                    <?php require('layout.php') ?>
                    <?php if(isset($_SESSION['id']) && $_SESSION['admin'] == 1) { ?>
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="index.php?action=addPost">Ajouter un Post →</a></div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Footer -->        
        <?php require('footer.php'); ?>        
    </body>
</html>



