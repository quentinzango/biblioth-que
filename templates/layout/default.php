<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>

<!DOCTYPE html>
<html lang="fr-FR" dir="ltr">

<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title><?= $this->Title->getTitle() ?></title>
    <?= $this->Html->meta('icon') ?>



    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $this->Path->getTemplatePath() ?>assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $this->Path->getTemplatePath() ?>assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->Path->getTemplatePath() ?>assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $this->Path->getTemplatePath() ?>assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?= $this->Path->getTemplatePath() ?>assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?= $this->Path->getTemplatePath() ?>assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="<?= $this->Path->getTemplatePath() ?>vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= $this->Path->getTemplatePath() ?>vendors/hamburgers/hamburgers.min.css" rel="stylesheet">
    <link href="<?= $this->Path->getTemplatePath() ?>vendors/loaders.css/loaders.min.css" rel="stylesheet">
    <link href="<?= $this->Path->getTemplatePath() ?>assets/css/theme.min.css" rel="stylesheet" />
    <link href="<?= $this->Path->getTemplatePath() ?>assets/css/user.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&amp;display=swap" rel="stylesheet">
    <link href="<?= $this->Path->getTemplatePath() ?>assets/fonts/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= $this->Path->getTemplatePath() ?>css/all.css" />
    

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>


</head>

<body>
    <section>
        <div class="fixed-top">
            <div class="container px-100">
                <nav class="navbar navbar-expand-lg navbar-freya navbar-light"> <a class="navbar-brand" href="index.html">
                        <div class="freya-logo">BIBLIO-line</div>
                    </a><button class="navbar-toggler p-1 border-1" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="primaryNavbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="hamburger hamburger--emphatic">
                            <span class="hamburger-box">
                                <span class="hamburger-inner">
                                </span>
                            </span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav py-3 py-lg-0 mt-1 mb-2 my-lg-0 ms-lg-n1">
                        <li class="nav-item active "><a class="nav-link  " href="index.html" role="button" data-bs-toggle="" aria-expanded="false">Accueill</a>
                            </li>
                            <li class="nav-item"><a class="nav-link " href="http://localhost/biblioth-que/users/about" role="button" aria-expanded="false">A propos</a>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Utilisateur</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="http://localhost/biblioth-que/users/list">list users</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/biblioth-que/roles">role</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle dropdown-indicator" href="JavaScript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">Document</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="http://localhost/biblioth-que/documents">documents</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/biblioth-que/topics">topics</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/biblioth-que/documenttypes">documenttypes</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/biblioth-que/documentcategories">document_categories</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link  " href="http://localhost/biblioth-que/users/contact" role="button" aria-expanded="false">Contact</a>
                            </li>
                        </ul>
                        </div>
                        <form class="d-flex" action="<?= $this->Url->build(['Controller' => 'Document', 'action' => 'searchByTitle']); ?>"
                             methode="GET">
                            <input class="form-control me-1" type="text" name="search" placeholder="Recherche..." aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Recherche</button>
                        </form>
                        <div class="navbar-nav ms-lg-auto flex-row justify-content-center py-3 py-lg-0 me-n2">
                        <?php if($this->getRequest()->getSession()->read('User.loggedIn')){ ?>
                            <?= $this->Html->link('Se déconnecter',['controller' =>'Users','action'=>'logout'],['class'=>'nav-link']) ?>
                        <?php } else { ?>
                            <?= $this->Html->link('Inscription',['controller' =>'Users','action'=>'registration'],['class'=>'nav-link']) ?>
                            <?= $this->Html->link('SE connecter',['controller' =>'Users','action' =>'login'],['class'=>'nav-link']) ?>
                        <?php } ?>
                        <div>
                    </div>
                </nav>
            </div>
        </div>
    </section>

    <main class="main">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================
    <main class="main" id="top">
    </main>-->

    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    <!--===============================================-->
    <!--    Footer-->
    <!--===============================================-->
    <section>

    </section>
    <footer class="bg-primary text-center py-6">
        <div class="container  text-center text-md-left">
            <div class="row text-center text-md-left">
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto-4">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning"> DESCRIPTION</h5>
                    <p>BIBLIO-line c'est une application qui propose a ces Utilisateursun un ensembles de
                        documents numérique </p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto-4">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">APP</h5>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">



                        <!--<li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true
                  </li>-->
                    </ul>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto-4">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">CONTACT</h5>
                    <p>
                    <i class="fa-sharp fa-solid fa-envelope">quentinzango470@gmail.com</i>
                    </p>
                    <p>
                    <i class="fa-sharp fa-solid fa-phone">+237 692485776</i>
                    </p>
                    <p>
                    <i class="fa-sharp fa-solid fa-phone">+237 651745244</i>
                    </p>
                </div>
            </div>
            <p class="text-uppercase text-300 ls mb-3">BIBLIO-line</p>
        </div>
    </footer>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="<?= $this->Path->getTemplatePath() ?>vendors/popper/popper.min.js"></script>
    <script src="<?= $this->Path->getTemplatePath() ?>vendors/bootstrap/bootstrap.min.js"></script>
    <script src="<?= $this->Path->getTemplatePath() ?>vendors/is/is.min.js"></script>
    <script src="<?= $this->Path->getTemplatePath() ?>vendors/bigpicture/BigPicture.js"> </script>
    <script src="<?= $this->Path->getTemplatePath() ?>vendors/swiper/swiper-bundle.min.js"></script>
    <script src="<?= $this->Path->getTemplatePath() ?>vendors/fontawesome/all.min.js"></script>
    <script src="<?= $this->Path->getTemplatePath() ?>vendors/rellax/rellax.min.js"></script>
    <script src="<?= $this->Path->getTemplatePath() ?>vendors/lodash/lodash.min.js"></script>
    <script src="<?= $this->Path->getTemplatePath() ?>vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= $this->Path->getTemplatePath() ?>vendors/gsap/gsap.js"></script>
    <script src="<?= $this->Path->getTemplatePath() ?>vendors/gsap/customEase.js"></script>
    <script src="<?= $this->Path->getTemplatePath() ?>assets/js/theme.js"></script>
    <?= $this->fetch('script') ?>

</body>

</html>
