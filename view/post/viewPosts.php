<?php require './view/admin/adminMenu.php'; ?><main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Liste des billets</h2>
                    <table class="table table-hover post">
                        <thead>
                        <tr>
                            <th>Référence billet</th>
                            <th>Posté le</th>
                            <th>Posté par</th>
                            <th>Titre</th>
                            <th>Texte</th>
                            <th>Catégorie(s)</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dataPosts as $post) {?>
                        <tr>
                            <td class="id"><?= $post->getId(); ?></td>
                            <td><?php $date = $post->getCreatedDate();
                                setlocale(LC_TIME, 'fr_FR.utf8','fra');
                                echo utf8_encode(strftime("%#d %B %Y", strtotime($date))); ?>
                            </td>
                            <td><?= $post->getCreatedBy()->getUsername(); ?></td>
                            <td><?= $post->getTitle(); ?></td>
                            <td><?= $post->getText(); ?></td>
                            <td><?php $categoriesNames = array();
                                foreach ($post->getCategories() as $category) {$categoriesNames[] = $category->getName();}
                                echo implode(', ', $categoriesNames);
                                ?>
                            </td>
                            <td><a href="index.php?action=admin&p=modifyPostForm&id=<?= $post->getId(); ?>">Modifier le billet</a></td>
                            <td><a href="index.php?action=admin&p=deletePost&id=<?= $post->getId(); ?>">Supprimer le billet</a></td>
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