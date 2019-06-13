<?php require './view/admin/adminMenu.php'; ?><main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Liste des catégories disponibles</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Référence catégorie</th>
                            <th>Nom de la catégorie</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataCategories as $category) {?>
                                <tr>
                                    <td class="id"><?= $category->getId(); ?></td>
                                    <td class="nom"><?= $category->getName(); ?></td>
                                    <td><a href="admin-modifycategoryform-<?= $category->getId(); ?>">Modifier la catégorie</a></td>
                                    <td><a href="admin-deletecategory-<?= $category->getId(); ?>">Supprimer la catégorie</a></td>
                                </tr>
                        </tbody>
                            <?php }?>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
</main>