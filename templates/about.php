<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Le Blog - Projet_5</title>
        <link rel="icon" type="image/x-icon" href="templates/assets/favicon.png" />
        
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        
        <link href="style.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a href="index.php"><img class="navbar-brand" src="templates/assets/img/logo_blog.jpg" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=about">À propos de</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php?action=contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('templates/assets/img/about.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>À propos de </h1>
                            <span class="subheading">Tour d'horizon</span>
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
                        <H2>À propos de moi</H2>
                        <p>Je suis un ancien agent RATP en reconversion, suivi une formation comme Technicien Système et Réseau en 2018 chez GEFI, 
                            fin 2021 et début 2022, une formation Développeur Web chez 3Wa, et découvert OpenClassRooms pour une formation en PHP SYMPHONY.</p>
                        <p>Très sociable, capable de gérer plusieurs tâches à la fois et de travailler en équipe. 
                            À la recherche d’un nouveau poste au sein d’une équipe dynamique offrant des opportunités d’évolution.</p>
                        <p>Je passe une bonne parite de mes journées devant l'ordinateur, entre pratique informatique et lecture. Bricoler est une des parties
                            de ma personnalité. Très sportif, notamment, pratique du Karaté, ancien instructeur de TaeKwonDo, pratiquant également la culture 
                            physique(couramment appelé musculation), et d'autres parts, les activités exterieurs telles que: promenade, courses à pied, pratique de velo en forêts.                            
                        </p>
                        <p>Brièvement, à propos de moi, avec le bouton en bas de page qui complète ma personnalité côté professionnel.</p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="https://acrobat.adobe.com/link/review?uri=urn:aaid:scds:US:e85ef142-5603-3e6f-8464-b729960ea1f0" target="_blank">Mon CV →</a></div>
        </main>
        <!-- Footer-->
        <?php require('footer.php'); ?>
    </body>
</html>
