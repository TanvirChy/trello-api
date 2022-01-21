<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $this->siteTitle(); ?> | MVC Framework</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">

    <link href="<?= css('main') ?>" rel="stylesheet" type="text/css" />
    <?= $this->content('head'); ?>

</head>

<body>
    <nav class="nav-container">
        <div class="nav-title">User Management System.</div>
        <div class="nav-options">
            <?php

            use App\Core\Session;

            $currentUser = Session::exits('currentUser') ;
            
            if($currentUser){
                ?>
                <a class="nav-option" href="<?php echo route('/page/index') ?>">HOME</a>
                <a class="nav-option" href="<?php echo route('/trello/index') ?>">TRELLO</a>
                <a class="nav-option" href="<?php echo route('/page/profile') ?>">UPDATE</a>
                <a class="nav-option" href="<?php echo route('/page/logout') ?>">LOGOUT</a>
                <?php
            } else{
                ?>
                <a class="nav-option" href="<?php echo route('/page/login') ?>">LOGIN</a>
                <a class="nav-option" href="<?php echo route('/page/registration') ?>">REGISTRATION</a>
            <?php    
            }
            
            ?>
           
        </div>
    </nav>

    <?= $this->content('body'); ?>



    <?= $this->content('script'); ?>
</body>



</html>