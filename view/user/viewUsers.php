<?php require './view/admin/adminMenu.php'; ?>
<main role="main" class="container">
    <h2>Liste des utilisateurs enregistrés</h2>
    <table class="table table-hover-small">
        <thead>
            <tr>
                <th>Référence utilisateur</th>
                <th>Nom utlisateur</th>
                <th>Adresse email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($dataUsers as $user) {?>
        <tr>
            <td class="id"><?= $user->getId(); ?></td>
            <td class="nom"><?= $user->getUsername(); ?></td>
            <td class="nom"><?= $user->getEmail(); ?></td>
            <td></td>
            <td class="lien"><a href="admin-modifyuserform-<?= $user->getId(); ?>">Modifier l'utilisateur</a></td>
            <td class="lien"><a href="admin-deleteuser-<?= $user->getId(); ?>">Supprimer l'utilisateur</a></td>
        </tr>
        </tbody>
        <?php }?>
        <div>
            <?php if (isset($errorMessage)) {echo $errorMessage;} ?>
        </div>
    </table>
    <br>
</main>