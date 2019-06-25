<form class="user-form" action="admin-modifyuserpass-<?= $input->get('id'); ?>" method="post">
    <p>Modifier le mot de passe :</p>
    <p>Nouveau mot de passe :<br/>
        <input type="password" name="password" cols="100" rows="1"></input>
    </p>
    <!--<p>Répétez le mot de passe :<br/>
        <textarea name="passwordcheck" value="" cols="50" rows="1"></textarea>
    </p>-->
    <button type="submit">Enregistrer</button>
</form>