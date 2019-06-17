<?php $title = 'Mon profil'; ?>

<?php ob_start(); ?>
<?php include './view/menu.php'; ?>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-10 blog-main">
                <div class="blog-post">
                    <a href="../../index.php"> <<<< Retour</a>
                </div>
                <div>
                    <img src="./public/img/CVValerieBleser.png" />
                </div>
            </div>
        </div>
    </main>
<?php require './view/blogFooter.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>