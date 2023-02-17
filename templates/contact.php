<?php ob_start(); ?> <!-- Mémorise toute sortie HTML -->

<?php $title = 'Contact'; ?>
<body>        
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('templates/assets/img/contact.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Me contacter !</h1>
                        <span class="subheading">Des questions, des réponses</span>
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
                    <?php if(isset($_GET['send'])) {?>
                    <p class="alert alert-success">Votre message a bien été envoyé</p>                    
                    <?php } ?>
                    <p>Souhaitez-vous entrer en contact ? Remplissez le formulaire ci-dessous pour m'envoyer un message et je vous répondrai dans les plus brefs délais.</p>
                    <div class="my-5">
                        <br><br>
                        <form class="container" method="POST" action="index.php?action=contact-confirm">                        
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
                                <label for="msg" class="form-label">Message</label>
                                <textarea class="form-control" name="msg"></textarea>
                            </div>                                
                            <button type="submit" class="btn btn-lg btn-primary" name="send">Envoyer</button>
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