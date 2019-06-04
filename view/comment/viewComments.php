<?php require './view/admin/adminMenu.php'; ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Liste des commentaires publiés</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Auteur du commentaire</th>
                            <th>Texte du commentaire</th>
                            <th>Date de publication</th>
                            <th>Titre du billet</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($dataComments)){
                            foreach ($dataComments as $comment) {?>
                        <tr>
                            <td class="id"><?= $comment->getAuthor(); ?></td>
                            <td class="nom"><?= $comment->getText(); ?></td>
                            <td class="nom"><?= $comment->getDate(); ?></td>
                            <td class="nom"><?= $comment->getPostId(); ?></td>
                            <td><a href="deleteComment-<?= $comment->getId(); ?>">Supprimer le commentaire</a></td>
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