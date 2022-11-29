<?php
  require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'functions.php';
  require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'functions'.DIRECTORY_SEPARATOR.'auth.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="//getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>
        <?php if (isset($title)) : echo $title; ?>
        <?php else: echo "Mon site"; ?>
        <?php endif;?>

    </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="//getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<!--    <link href="starter-template.css" rel="stylesheet">-->
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">Mon site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <?= nav_menu('nav-link'); ?>
        </ul>
        <ul class="navbar navbar-nav">
            <?php 
              if(est_connecte()) : ?>
                <li class="nav-item"><a class="nav nav-link" href="/logout.php">Logout</a></li> 
            <?php endif;?>
        </ul>
    </div>
</nav>

<main role="main" class="container">