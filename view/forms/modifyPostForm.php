<form class="category-form" action="admin-modifypost-<?= $input->get('id'); ?>" method="post" enctype="multipart/form-data">
    <p>Auteur :<br/>
        <?= $dataPosts->getCreatedBy()->getUsername(); ?>
    </p>
    <p>Titre :</p>
    <input name="title" cols="50" rows="1" /><?= $dataPosts->getTitle();?>
    <p>Chapo :</p>
    <textarea name="chapo" cols="150" rows="3"><?= $dataPosts->getChapo();?></textarea>
    <p>Texte :</p>
    <textarea name="text" cols="150" rows="10"><?= $dataPosts->getText();?></textarea>
    <?php if($dataPosts->getFileName()== null) {
        echo '<br/><strong>Pas encore d\'image</strong>
                            <p>
                            Ajouter une image :<br/>
                            <input type="file" name="img" />
                            </p>';
    } elseif ($dataPosts->getFileName()!== null) {
        ?><img class='medium' src="<?= $dataPosts->getFileUrl();?>" />
        <p>
            Changer l'image :<br/>
            <input type="file" name="img" />
        </p>
        <?php
    } ?>
    <p>Categorie(s) :<br/><br/>
        <?php
        foreach ($dataCategories as $category) {?>
            <input type="checkbox" name="category[]" value="<?= $category->getId(); ?>"
            <?php foreach ($dataPosts->getCategories() as $postCat)
        {$postCatId = [$postCat->getId()];
        if(in_array($category->getId(), $postCatId))
        { ?>checked <?php }
        } ?>
            ><?= $category->getName(); ?><br/>
        <?php } ?></p>
    <button type="submit">Enregistrer</button>
</form>