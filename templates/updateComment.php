<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="fr">
   <?php $title = 'Commentaires'; ?>
    <body>        
        <!-- Navigation-->
      
        <!-- Page Header-->
      <header class="masthead" style="background-image: url('templates/assets/img/modification.jpg')">
         <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
               <div class="col-md-10 col-lg-8 col-xl-7">
                  <div class="site-heading">
                     <h1>Commentaires</h1>
                     <span class="subheading">Modifier un commentaire</span>
                  </div>
               </div>
            </div>
         </div>
      </header>      
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
      <!-- Footer-->        
      <?php require('footer.php'); ?>
    
   