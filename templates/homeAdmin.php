<?php ob_start(); 

$title = "Valider un commentaire"; 
?>

<div class="container">
    <h1>Admin</h1>
   <em><a href="index.php "><p class="msg_b">Retour à la liste des posts</p></a></em>

   <h2>Valider ou supprimer un commentaire</h2>
   <div class="container">
        <ul>
            <?php
                foreach ($comments as $comment) {
            ?>        
            <p><?= htmlspecialchars($comment->comment) ?></p> 
            <p><em>le <?= $comment->frenchCreationDate ?></em></p>                         
            <a type="submit" class="btn btn-warning text-uppercase" href="index.php?action=valide&id=<?= $comment->identifier ?>">Valider</a>
            <a type="submit" class="btn btn-danger text-uppercase" href="index.php?action=deleteComment&id=<?= $comment->identifier ?>">Supprimer</a>                        
            <hr>
            <?php
                }
            ?>
        </ul>   
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>



