<?php ob_start(); 

$title = "Modifier un post"; ?>

<div class="container">
   <em><a href="index.php "><p class="msg_b">Retour à la liste des posts</p></a></em>

   <h2>Modifier un post</h2>

   <form class="container" action="index.php?action=updatePost-confirm" method="post">
      <div>
         <label for="title">Titre</label><br />
         <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($post->title) ?>">
      </div>        
      <div>
         <label for="chapo">Chapo</label><br />
         <textarea id="chapo" name="chapo"><?= nl2br(htmlspecialchars($post->chapo)) ?></textarea>
      </div>
      <div>
         <label for="content">Contenu</label><br />
         <textarea id="content" name="content"><?= nl2br(htmlspecialchars($post->content)) ?></textarea>
      </div>
      <div>
         <label for="author">Auteur</label><br />
         <input type="text" class="form-control" name="author" value="<?= htmlspecialchars($post->author) ?>">
      </div>        
      <div>
         <button type="submit" class="btn btn-warning" name="submit">Modifier</button>         
      </div>      
   </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
