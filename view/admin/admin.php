<?php $input = new \src\controller\Input();
$title = 'Menu Administration';?>

<?php ob_start(); ?>

<!-- admin menu -->
<?php require ('./view/menu.php'); ?>

<main role="main" class="container">
    <h4>
        <!-- if logged, to log out -->
        <?php if ($input->session() != null && $input->session('user')) {
            print_r("Bonjour " . ($input->session('user')->getUsername()) . "!"); ?><br/>
    </h4>
    <a href="admin-logout">Se deconnecter</a><?php
    }?>
    <h2>Administration du blog</h2>
    <!-- display the part defined in index.php -->
    <?php require $view; ?>
</main>

<?php require './view/blogFooterLight.php'?>

<?php $content = ob_get_clean(); ?>

<!-- common part of all frontend pages -->
<?php require './view/template.php'; ?>