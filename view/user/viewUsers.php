<?php require './view/admin/adminMenu.php'; ?><main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Liste des utilisateurs enregistrés</h2>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Référence de l'utilisateur</th>
                            <th>Nom de l'utlisateur</th>
                            <th>Adresse email</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dataUsers as $user) {?>
                        <tr>
                            <td class="id"><?= $user->getId(); ?></td>
                            <td class="nom"><?= $user->getUsername(); ?></td>
                            <td class="nom"><?= $user->getEmail(); ?></td>
                            <td><a href="modifyUserForm-<?= $user->getId(); ?>">Modifier l'utilisateur</a></td>
                            <td><a href="deleteUser-<?= $user->getId(); ?>">Supprimer l'utilisateur</a></td>
                        </tr>
                        </tbody>
                        <?php }?>
                        <div>
                            <?php if (isset($errorMessage)) {echo $errorMessage;} ?>
                        </div>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
</main>