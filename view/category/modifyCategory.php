<?php include ('./view/admin/adminMenu.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Modifier la catégorie</h2>
                    <br>
                </div>
                <div>
                    <form class="category-form" action="./index.php?action=admin&p=modifyCategory&id=<?= $_GET['id']; ?>" method="post">
                        <p>Changer le nom de la catégorie :</p>
                        <input type="text" name="catName" value="<?= $viewCategory->getName(); ?>">
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>