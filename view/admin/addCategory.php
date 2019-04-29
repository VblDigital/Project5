<?php $title = 'Ajouter une catégorie'; ?>

<?php ob_start(); ?>

<div>
    <h2>Ajouter une nouvelle catégorie</h2>
        <div class="col-md-8 blog-main">
            <div class="blog-post">
                <?php require ('../../view/forms/addCategoryForm.php'); ?>
            </div>
        </div>
    </div>
</main>
<div class="blog-footer-less"><a href="adminIndex.php">Voir les catégories</a>  --  <a href="#">Modifier les catégories</a></div>
<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>