<?php ob_start(); ?>

<?php $title = 'Post'; ?>
<body>  
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('templates/assets/img/post.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Un blog post</h1>
                        <span class="subheading">En résumé</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">        
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">               
                <div class="col-md-10 col-lg-8 col-xl-7">  
                    <?php if(isset($_SESSION['id']) && $_SESSION['admin'] == 1) { ?>
                    <h2>Bienvenue sur la page Admin</h2>                    
                    <?php } ?>
                    <br /><br />                  
                    <h3>
                        <?= htmlspecialchars($post->title) ?>                            
                    </h3>
                    <h5>
                        <?= nl2br(htmlspecialchars($post->chapo)) ?>
                    </h5>
                    <p>
                        <?= nl2br(htmlspecialchars($post->content)) ?>  
                    </p>
                    <p>
                        <em><strong>De:</strong> <?= nl2br(htmlspecialchars($post->author)) ?></em>
                    </p>
                    <p>
                        <em><strong>le</strong> <?= $post->frenchCreationDate; ?></em>
                    </p>
                    <?php if(isset($_SESSION['id']) && $_SESSION['admin'] == 1) { ?>                                                    
                    <a type="submit" class="btn btn-warning text-uppercase" href="index.php?action=updatePost&id=<?= $post->identifier ?>">Modifier</a>                        
                    <a type="submit" class="btn btn-danger text-uppercase" href="index.php?action=deletePost&id=<?= $post->identifier ?>">Supprimer</a>                             
                    <?php } ?>                        
                    <em><a href="index.php"><p class="alert alert-primary">Retour à la liste des posts</p></a></em>                        
                </div>                    
            </div>
        </div>
    </article>
    <div class="container">
        <h3>Commentaires</h3>
        <?php if(isset($_SESSION['id'])) { ?>
        <form class="container" action="index.php?action=addComment&id=<?= $post->identifier ?>" method="post">
            <div class="mb-3">
                <label for="comment" class="form-label">Commentaire</label>
                <textarea class="form-control" name="comment"></textarea>
            </div>                                
            <button type="submit" class="btn btn-lg btn-primary" name="send">Envoyer</button>            
        </form>
        <?php } else {?>
            <p class="msg_er">Connectez vous pour laisser un commentaire !</p>
        <?php } ?>
        <?php foreach ($comments as $comment) { ?>                
        <p><?= htmlspecialchars($comment->comment) ?></p> 
        <p><em>le <?= $comment->frenchCreationDate ?></em></p>
        <?php if(isset($_SESSION['id']) && $_SESSION['admin'] == 1) { ?>        
        <a type="submit" class="btn btn-warning" href="index.php?action=updateComment&id=<?= $comment->identifier ?>">Modifier le commentaire</a>
        <?php } ?>             
        <hr>
        <?php } ?>
<?php $content = ob_get_clean(); ?>
        <?php require('layout.php') ?>
        <?php if(isset($_SESSION['id']) && $_SESSION['admin'] == 1) { ?>
        <em><a href="index.php?action=homeAdmin"><p class="alert alert-primary">La liste des commentaires</p></a></em> 
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="index.php?action=addPost">Ajouter un Post →</a></div>
        <?php } ?>
    </div>
    <?php require('footer.php') ?>
    
