<?php ob_start(); ?>

<?php $title = 'Commentaires'; ?>
<body>
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
   <!-- Main Content-->
   <main class="mb-4">      
      <div class="container">
         <em><a href="index.php?action=post&id=<?= $comment->post ?>"><p class="alert alert-primary">Retour au post</p></a></em>
         <h2>Modification du commentaire</h2>
         <form action="index.php?action=updateComment&id=<?= $comment->identifier ?>" method="post">      
            <div class="mb-3">
               <label for="comment" class="form-label">Commentaire</label>
               <textarea class="form-control" name="comment"><?= htmlspecialchars($comment->comment) ?></textarea>
            </div>                                
            <div>
               <button type="submit" class="btn btn-warning" name="submit">Modifier</button>
               <a type="submit" class="btn btn-danger text-uppercase" href="index.php?action=deleteComment&id=<?= $comment->identifier ?>">Supprimer</a>                   
            </div>         
         </form>
      </div>
   </main>
   <?php $content = ob_get_clean(); ?>
   <?php require('layout.php') ?>
   <!-- Footer-->        
   <?php require('footer.php'); ?>
    
   