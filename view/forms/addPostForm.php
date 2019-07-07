<form class="category-form" action="admin-addpost" method="post" enctype="multipart/form-data">
    <div class="warning">
        <?php
        $message = new \src\Message();
        $message->message();
        ?>
    </div>
    <p>Auteur :<br/>
        <select id="author" name="author">
            <?php foreach ($dataUsers as $user) {?>
                <option value="<?= $user->getId(); ?>"><?= $user->getUsername(); ?></option>
            <?php } ?>
        </select>
    </p>
    <p>Titre :<br/>
        <textarea name="title" cols="50" rows="1"></textarea>
    </p>
    <p>Chapo :<br/>
        <textarea name="chapo" cols="150" rows="3"></textarea>
    </p>
    <p>Texte :<br/>
        <textarea name="text" cols="150" rows="10"></textarea>
    </p>
    <p>Categorie(s) :<br/><br/>
        <?php foreach ($dataCategories as $category) {?>
            <input type="checkbox" name="category[]" value="<?= $category->getId(); ?>"><?= $category->getName(); ?>
            <br/></input>
        <?php } ?>
    </p>
    <p>
        Ajouter une image :<br/>
        <input type="file" name="img" />
    </p>
    <button type="submit">Enregistrer</button>
</form>