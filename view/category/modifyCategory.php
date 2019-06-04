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
                    <form class="category-form" action="modifyCategory-<?= $_GET['id']; ?>" method="post">
                        <p>Changer le nom de la catégorie :</p>
                        <textarea name="categoryName" rows="1" cols="45"><?php echo $dataCategories->getName(); ?></textarea><br />
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>