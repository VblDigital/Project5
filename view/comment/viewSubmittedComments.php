<?php require './view/admin/adminMenu.php'; ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Liste des commentaires pour modération</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Auteur du commentaire</th>
                            <th>Texte du commentaire</th>
                            <th>Date de publication</th>
                            <th>Titre du billet</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($dataComments)) {
                            foreach ($dataComments as $comment) {?>
                        <tr>
                            <td class="id"><?= $comment->getAuthor(); ?></td>
                            <td class="nom"><?= $comment->getText(); ?></td>
                            <td class="nom"><?php $date = $comment->getDate();
                                setlocale(LC_TIME, 'fr_FR.utf8','fra');
                                echo utf8_encode(strftime("%#d %B %Y", strtotime($date)));?></td>
                            <td class="nom"><?= $comment->getPostId(); ?></td>
                            <td><a href="admin-approvecomment-<?= $comment->getId(); ?>">Approuver le commentaire</a></td>
                            <td><a href="admin-deletesubmittedcomment-<?= $comment->getId(); ?>">Supprimer le commentaire</a></td>
                        </tr>
                        </tbody>
                        <?php }
                        }?>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
</main>