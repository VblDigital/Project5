<?php $title = 'Modifier une catégorie'; ?>

<?php ob_start(); ?>
    <div>
        <h2>Modifier la catégorie : </h2>
        <div class="col-md-8 blog-main">
            <div class="blog-post">
                Nom actuel de la catégorie :
                <?php
                $id = $_GET['id'];
                var_dump($category->getId());
                ?>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>