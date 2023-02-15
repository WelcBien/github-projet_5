<?php ob_start(); 

$title = "Creation d'un post"; ?>

<div class="container">
   <em><a href="index.php "><p class="msg_b">Retour à la liste des posts</p></a></em>

   <h2>Formulaire ajout d'un post</h2>

   <form class="container" action="index.php?action=addPost-confirm" method="post">
      <div>
         <label for="title">Titre</label><br />
         <input type="text" class="form-control" name="title">
      </div>        
      <div>
         <label for="chapo">Chapo</label><br />
         <textarea id="chapo" name="chapo"></textarea>
      </div>
      <div>
         <label for="content">Contenu</label><br />
         <textarea id="content" name="content"></textarea>
      </div>
      <div>
         <label for="author">Auteur</label><br />
         <input type="text" class="form-control" name="author">
      </div> 
      <div>
         <button type="submit" class="btn btn-primary" name="submit">Publier</button>         
      </div>
   </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>


