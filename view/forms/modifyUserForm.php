<form class="user-form" action="admin-modifyuser-<?= $input->get('id'); ?>" method="post">
    <p>Modifier les coordonnées :</p>
    <p>Pseudonyme :</p>
    <textarea name="username" cols="100" rows="1"><?= $dataUsers->getUsername(); ?></textarea>
    <p>Adresse email :<br/></p>
    <textarea name="email" cols="100" rows="1"><?= $dataUsers->getEmail(); ?></textarea>
    <button type="submit">Enregistrer</button>
</form>