<?php require ('./view/admin/adminMenu.php');
$input = new \src\controller\Input(); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Modifier la catégorie</h2>
                    <br>
                </div>
                <div>
                    <?php require './view/forms/modifyCategoryForm.php'; ?>
                </div>
            </div>
        </div>
    </div>
</main>