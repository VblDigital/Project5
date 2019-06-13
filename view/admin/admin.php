<?php $title = 'Menu Administration';?>

<?php ob_start(); ?>

<?php include ('./view/menu.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <h4>
                    <?php if ($_SESSION['user']) {echo "Bonjour " . ($_SESSION['user']->getUsername()) . "!"; ?><br/>
                </h4>
                    <a href="admin-logout">Se deconnecter</a><?php }?>
                <div>
                <h2>Administration du blog</h2>
                </div>
            </div>
            <div>
                <?php include $view; ?>
            </div>
        </div>
    </div>
</main>

<?php include './view/blogFooterLight.php'?>

<?php $content = ob_get_clean(); ?>

<?php require './view/template.php'; ?>
