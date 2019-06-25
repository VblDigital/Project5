<?php $input = new \src\controller\Input();
$title = 'Menu Administration';?>

<?php ob_start(); ?>

<!-- admin menu -->
<?php require ('./view/menu.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <h4>
                    <!-- if logged, to log out -->
                    <?php if ($input->session() != null && $input->session('user')) {
                        print_r("Bonjour " . ($input->session('user')->getUsername()) . "!"); ?><br/>
                        </h4>
                        <a href="admin-logout">Se deconnecter</a><?php
                    }?>
                <div>
                <h2>Administration du blog</h2>
                </div>
            </div>
            <div>
                <!-- display the part defined in index.php -->
                <?php require $view; ?>
            </div>
        </div>
    </div>
</main>

<?php require './view/blogFooterLight.php'?>

<?php $content = ob_get_clean(); ?>

<!-- common part of all frontend pages -->
<?php require './view/template.php'; ?>