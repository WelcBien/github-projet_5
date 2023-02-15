<?php ob_start() ?>

   <?php $title = 'Ajout d\'un post'; ?>
   <body>
   <!-- Page Header-->
      <header class="masthead" style="background-image: url('templates/assets/img/admin.png')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Un post</h1>
                            <span class="subheading">Ajouter un post</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

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
   <!-- Footer-->        
   <?php require('footer.php'); ?>
</body>