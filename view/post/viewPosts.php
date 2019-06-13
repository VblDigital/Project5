<?php require './view/admin/adminMenu.php'; ?>
<main role="main" class="container">
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
                            <th>Chapo</th>
                            <th>Texte</th>
                            <th>Catégorie(s)</th>
                            <th>Image</th>
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
                            <td><?= $post->getChapo(); ?></td>
                            <td><?= $post->getText(); ?></td>
                            <td><?php $categoriesNames = array();
                                foreach ($post->getCategories() as $category) {$categoriesNames[] = $category->getName();}
                                echo implode(', ', $categoriesNames);
                                ?>
                            </td>
                            <td>
                                <?php if($post->getFileName()== null) {
                                echo '';
                                } else {?><img class='small' src="<?= $post->getFileUrl();?>" /><?php } ?>
                            </td>
                            <td><a href="admin-modifypostform-<?= $post->getId(); ?>">Modifier le billet</a></td>
                            <td><a href="admin-deletepost-<?= $post->getId(); ?>">Supprimer le billet</a></td>
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