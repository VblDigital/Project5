<?php require './view/admin/adminMenu.php'; ?><main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Liste des billets</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Référence billet</th>
                            <th>Posté le</th>
                            <th>Posté par</th>
                            <th>Titre</th>
                            <th>Texte</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $post) {?>
                        <tr>
                            <td class="id"><?= $post->getId(); ?></td>
                            <td><?= $post->getCreatedDate(); ?></td>
                            <td><?= $post->getCreatedBy(); ?></td>
                            <td><?= $post->getTitle(); ?></td>
                            <td><?= $post->getText(); ?></td>
                            <td><a href="index.php?action=admin&p=modifyCategoryForm&id=<?= $post->getId(); ?>">Modifier le billet</a></td>
                            <td><a href="index.php?action=admin&p=deleteCategory&id=<?= $post->getId(); ?>">Supprimer le billet</a></td>
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