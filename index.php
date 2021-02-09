<?php

require_once('./config/Autoload.php');
\PHPAPI\Core\AutoLoad::register();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Freelancer - Ma Liste de Magasins Theme</title>
        <!-- Favicon-->
        <!-- Custom styles for this template -->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>

            .font_type{
                
                font-size: 1.5em;
    position: relative;
    z-index: 1;
    padding-right: 0;
    padding-left: 0;
    resize: none;
    border: none;
    border-radius: 0;
    background: none;
    box-shadow: none !important;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php include './view/header.php'; ?>
        <!-- Masthead-->
        <?php include './view/search.php'; ?>
        <?php include './view/liste.php' ?>
     


       <?php include './view/formAddMagasin.php'; ?>


      <?php include './view/footer.php'; ?>
<?php
include './view/modal.php'; ?>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="js/create.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="js/search.js"></script>
        <script src="js/formUpdate.js"></script>
        <script src="js/delete.js"></script>
    </body>
</html>

