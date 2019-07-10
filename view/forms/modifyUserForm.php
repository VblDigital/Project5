<form class="user-form" action="admin-modifyuser-<?= $input->get('id'); ?>" method="post">
    <p>Modifier les coordonnées :</p>
    <p>Pseudonyme :</p>
    <textarea name="username" cols="100" rows="1"><?= $dataUsers->getUsername(); ?></textarea>
    <p>Adresse email :<br/></p>
    <input type="email" name="email" cols="100" rows="1" /><?= $dataUsers->getEmail(); ?>
    <button type="submit">Enregistrer</button>
</form>