<?php $title = 'Menu Administration';?>

<?php ob_start(); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                <h2>Administration du blog</h2>
                <?php include './view/admin/adminMenu.php'; ?>
                </div>
            </div>
            <div>
                <?php require $view; ?>
            </div>
        </div>
    </div>
</main>

<?php include './view/blogFooterLight.php'?>

<?php $content = ob_get_clean(); ?>

<?php require './view/adminTemplate.php'; ?>
