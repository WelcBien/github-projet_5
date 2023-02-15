<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Le Blog - Projet_5</title>
        <link rel="icon" type="image/x-icon" href="templates/assets/favicon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="style.css" rel="stylesheet" />
    </head>
    <body>
        <header>        
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Administration</h1>                           
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
                                <h2>Bienvenue admin</h2>
                                <div class="my-5">                        
                                    <br><br>
                                    <form class="container" method="POST" action="index.php?action=loginAdmin-confirm">

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Admin</label>
                                            <input type="text" class="form-control" name="admin">            
                                        </div>                                
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>        
                                        <button type="submit" class="btn btn-primary" name="submit">Se connecter</button>
                                        <br><br>                                
                                    </form>             
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
        <!-- Footer-->        
        <?php require('footer.php'); ?>
    </body>
</html>






