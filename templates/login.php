<?php ob_start(); ?> <!-- Mémorise toute sortie HTML -->

<?php $title = 'Connexion'; ?>
<body>       
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('templates/assets/img/login.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Connexion</h1>
                        <span class="subheading">Connectez vous, et contribuez</span>
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
                    <h2>Se connecter</h2>
                    <div class="my-5">                        
                        <br><br>
                        <form class="container" action="index.php?action=login_confirm" method="POST">
                            <div class="mb-3">
                                <label for="pseudo" class="form-label">Pseudo</label>
                                <input type="text" class="form-control" name="pseudo" autocomplete="off">            
                            </div>                                
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" autocomplete="off">
                            </div>        
                            <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>
                            <em><a href="index.php?action=signup"><p>Je n'ai pas de compte, je m'inscris</p></a></em>
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