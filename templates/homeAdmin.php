<?php ob_start() ?>

<?php $title = 'Admin'; ?>    
<body>        
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('templates/assets/img/admin.png')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Admin</h1>
                        <span class="subheading">Validation</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container">            
            <em><a href="index.php "><p class="alert alert-primary">Retour à la liste des posts</p></a></em>
            <h2>Valider ou supprimer un commentaire</h2>            
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
    </main>    
    <?php $content = ob_get_clean(); ?>
    <?php require('layout.php') ?>
    <!-- Footer-->        
    <?php require('footer.php'); ?>