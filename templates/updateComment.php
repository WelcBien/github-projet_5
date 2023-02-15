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
                  <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=about">À propos de</a></li>
                  <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=contact">Contact</a></li>
               </ul>
            </div>
         </div>
      </nav>
        <!-- Page Header-->
      <header class="masthead" style="background-image: url('templates/assets/img/modification.jpg')">
         <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
               <div class="col-md-10 col-lg-8 col-xl-7">
                  <div class="site-heading">
                     <h1>Commentaires</h1>
                     <span class="subheading">Modifier son commentaire</span>
                  </div>
               </div>
            </div>
         </div>
      </header>

      <?php ob_start(); ?>
      <div class="container">
         <em><a href="index.php?action=post&id=<?= $comment->post ?>"><p class="msg_b">Retour au post</p></a></em>

         <h2>Modification du commentaire</h2>

         <form action="index.php?action=updateComment&id=<?= $comment->identifier ?>" method="post">   
            <div class="comment">
               <label for="comment">Commentaire</label><br />
               <textarea id="comment" name="comment"><?= htmlspecialchars($comment->comment) ?></textarea>
            </div>
            <div>
               <button type="submit" class="btn btn-warning" name="submit">Modifier</button>
               <a type="submit" class="btn btn-danger text-uppercase" href="index.php?action=deleteComment&id=<?= $comment->identifier ?>">Supprimer</a>                        

            </div>
         </form>
      </div>
      <?php $content = ob_get_clean(); ?>

      <?php require('layout.php') ?>
      
    
   