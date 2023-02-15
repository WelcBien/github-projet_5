<?php ob_start(); ?> <!-- Mémorise toute sortie HTML -->

<!DOCTYPE html>
<html lang="fr">
    <?php $title = 'Inscription'; ?>
    <body>        
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('templates/assets/img/signup.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Inscription</h1>
                            <span class="subheading">Inscrivez vous, et contribuez</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php if(isset($_GET['inscription'])) {?>
                            <p class="msg">Votre inscription a bien été pris en compte</p>
                            <?php } ?> 
                        <h2>S'inscrire</h2>
                        <div class="my-5">                        
                            <br><br>
                            <form class="container" method="POST" action="index.php?action=signup-confirm">                            
                                <div class="mb-3">
                                    <label for="pseudo" class="form-label">Pseudo</label>
                                    <input type="text" class="form-control" name="pseudo" autocomplete="off">            
                                </div>
                                <div class="mb-3">
                                    <label for="lastname" class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="lastname" autocomplete="off">            
                                </div>
                                <div class="mb-3">
                                    <label for="firstname" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" name="firstname" autocomplete="off">            
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" autocomplete="off">            
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" autocomplete="off">
                                </div>        
                                <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
                                <br><br>
                                <em><a href="index.php?action=login"><p>J'ai déjà un compte, je me connecte</p></a></em>
                            </form>             
                        </div>
                    </div>
                </div>
            </div>
        </main>
<?php $content = ob_get_clean(); ?> <!-- Pour récupérer le contenu généré et tout est mis dans $content -->

        <?php require('layout.php') ?>
        <!-- Footer-->        
        <?php require('footer.php'); ?>    