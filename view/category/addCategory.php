<?php include ('./view/admin/adminMenu.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Ajouter une catégorie</h2>
                    <br>
                </div>
                <div>
                    <form class="category-form" action="./index.php?action=admin&p=addCategory" method="post">
                        <p>Nom de la catégorie :</p>
                        <textarea name="categoryName" value="" cols="45" rows="1"></textarea><br />
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>