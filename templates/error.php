<?php $title = "Le super blog de WelcDev"; ?>

<?php ob_start(); ?>
<h1>Message d'erreur !</h1>
<p class="msg_er">Une erreur est survenue : <?= $errorMessage ?></p>
<a href="index.php"><p class="msg_b">Retour à la page d'accueil</p></a>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>