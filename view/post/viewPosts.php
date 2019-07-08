<?php require './view/admin/adminMenu.php'; ?>

<main role="main" class="container">
    <div>
        <h2>Liste des billets</h2>
        <table class="table table-hover post">
            <?php foreach ($dataPosts as $post) {?>
            <thead>
                <tr class="bold">
                    <th>Référence billet</th>
                    <th>Posté le</th>
                    <th>Posté par</th>
                    <th>Catégorie(s)</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="id"><?= $post->getId(); ?></td>
                    <td class="nom"><?php $date = $post->getCreatedDate();
                        setlocale(LC_TIME, 'fr_FR.utf8','fra');
                        echo utf8_encode(strftime("%#d %B %Y", strtotime($date))); ?>
                    </td>
                    <td class="nom"><?= $post->getCreatedBy()->getUsername(); ?></td>
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
                </tr>
            </tbody>
            <tbody>
            <thead>
                <tr>
                    <th colspan="2">Titre</th>
                    <th colspan="2">Chapo</th>
                    <th>Texte</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="nom" colspan="2"><?= $post->getTitle(); ?></td>
                    <td  colspan="2"><?= $post->getChapo(); ?></td>
                    <td><?= $post->getText(); ?></td>
                </tr>
                <tr class="dashed">
                    <td colspan="2" class="grey"><a href="admin-modifypostform-<?= $post->getId(); ?>">Modifier le billet</a></td>
                    <td colspan="2" class="grey"><a href="admin-deletepost-<?= $post->getId(); ?>">Supprimer le billet</a></td>
                    <td colspan="2" class="grey"></td>
                </tr>
            </tbody>
            <?php }?>
        </table>
    </div>
</main>