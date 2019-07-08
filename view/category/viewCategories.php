<?php require './view/admin/adminMenu.php'; ?>
<main role="main" class="container">
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
                    <td class="id"><div class="col col-lg-1"><?= $category->getId(); ?></div></td>
                    <td class="nom"><?= $category->getName(); ?></td>
                    <td class="lien"><a href="admin-modifycategoryform-<?= $category->getId(); ?>">
                    Modifier la catégorie</a></td>
                    <td class="lien"><a href="admin-deletecategory-<?= $category->getId(); ?>">
                    Supprimer la catégorie</a></td>
                </tr>
        </tbody>
            <?php }?>
    </table>
    <br>
</main>