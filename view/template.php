<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Le blog de Valérie Bleser">
    <meta name="author" content="Valérie Bleser Copyright 2019">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href= "./public/css/blog.css" rel="stylesheet">
</head>
<body>
<?php include ('./view/menu.php'); ?>
<?= $content ?>
<footer class="blog-footer">
    <p>Modèle de blog développé pour <a href="https://getbootstrap.com/">Bootstrap</a> par <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
        <a href="#">Retour au menu</a>     -     <a href ="./view/user/connect.php">Page d'administration</a>
    </p>
</footer>
</body>
</html>