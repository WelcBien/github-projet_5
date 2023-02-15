<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="fr"> 
    <?php $title = 'Page d\'erreur'; ?>   
    <body>        
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('templates/assets/img/erreur1.png')"></header>        
        <main>
            <div class="container">
                <h1>Message d'erreur !</h1>
                <p class="msg_er">Une erreur est survenue : <?= $errorMessage ?></p>
                <a href="index.php"><p class="msg_b">Retour à la page d'accueil</p></a>
            </div>
        </main>

<?php $content = ob_get_clean(); ?>

    <?php require('layout.php') ?>
    <!-- Footer-->        
    <?php require('footer.php'); ?>
    