<!doctype html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Le blog de Valérie Bleser">
    <meta name="author" content="Valérie Bleser Copyright 2019">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    crossorigin="anonymous">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href= "/../public/css/blog.css" rel="stylesheet">
    <!-- Load jQuery  -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Load WysiBB JS and Theme -->
    <script src="/js/jquery.wysibb.min.js"></script>
    <link rel="stylesheet" href="/css/default/wbbtheme.css" />

    <!-- Init WysiBB BBCode editor -->
    <script>
        $(function() {
            $("#editor").wysibb();
        })
    </script>
</head>
<body>
<?= $content ?>
</body>
</html>