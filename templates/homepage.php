<?php $title = "Le blog de WelcDev !"; ?>

<?php ob_start(); ?> <!-- Mémorise toute sortie HTML -->

<!DOCTYPE html>
<html lang="fr">    
    <body>
        <!-- Navigation-->
        
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('templates/assets/img/home_blog.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Le Blog </h1>
                            <span class="subheading">WelcDev, le Développeur qu'il vous faut !</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">                    
                        <?php                       
                            foreach ($posts as $post) {
                        ?> 
                        
                        <h2>
                            <?= htmlspecialchars($post->title); ?>                            
                        </h2>
                
                        <h5>
                            <?= nl2br(htmlspecialchars($post->chapo)); ?>                            
                        </h5>
                            
                        <p><em>le <?= $post->frenchCreationDate; ?></em></p>                        
                        <?php if(isset($_SESSION['id'])) { ?>                            
                        <em><a href="index.php?action=post&id=<?= urlencode($post->identifier) ?>"><p class="msg_b">Lire la suite →</p></a></em> 
                        <?php } ?>                       
                        
                        <!-- Divider-->
                        <hr class="my-4" />                    
                        <?php
                        }
                        ?>
                        <?php if(!isset($_SESSION['id'])) { ?>
                        <em><a href="index.php?action=login"><p class="msg_b">Connectez-vous pour acceder aux posts !</p></a></em>
                        <?php
                        }
                        ?>
<?php $content = ob_get_clean(); ?> <!-- Pour récupérer le contenu généré et tout est mis dans $content -->

                        <?php require('layout.php') ?>
                        <?php if(isset($_SESSION['id']) && $_SESSION['admin'] == 1) { ?>
                        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="index.php?action=addPost">Ajouter un Post →</a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        
        <!-- Footer -->        
        <?php require('footer.php'); ?>        
    
