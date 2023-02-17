<?php ob_start(); ?>

<?php $title = 'Post'; ?>
<body>   
   <!-- Page Header-->
   <header class="masthead" style="background-image: url('templates/assets/img/modification.jpg')">
      <div class="container position-relative px-4 px-lg-5">
         <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
               <div class="page-heading">
                  <h1>Un post</h1>
                  <span class="subheading">Modifier un post</span>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- Main Content-->
   <main class="mb-4"> 
      <div class="container">
         <em><a href="index.php "><p class="alert alert-primary">Retour à la liste des posts</p></a></em>
         <h2>Modification du post</h2>

         <form class="container" action="index.php?action=updatePost-confirm&id=<?= $_GET['id'] ?>" method="post">
            <div>
               <label for="title">Titre</label><br />
               <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($post->title) ?>">
            </div>        
            <div>
               <label for="chapo">Chapo</label><br />
               <textarea id="chapo" name="chapo"><?= htmlspecialchars($post->chapo) ?></textarea>
            </div>
            <div>
               <label for="content">Contenu</label><br />
               <textarea id="content" name="content"><?= htmlspecialchars($post->content) ?></textarea>
            </div>
            <div>
               <label for="author">Auteur</label><br />
               <input type="text" class="form-control" name="author" value="<?= htmlspecialchars($post->author) ?>">
            </div>  
            <div>
               <button type="submit" class="btn btn-warning" name="submit" href="index.php?action=updatePost&id=<?= $post->identifier ?>">Modifier</button>         
            </div>      
         </form>
      </div>
   </main>
   <?php $content = ob_get_clean(); ?>
   <?php require('layout.php') ?>
   <!-- Footer-->        
   <?php require('footer.php'); ?>