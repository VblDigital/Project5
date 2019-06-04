<?php include ('./view/admin/adminMenu.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Modifier le billet</h2>
                    <br>
                </div>
                <div>
                    <form class="category-form" action="modifyPost-<?= $_GET['id']; ?>" method="post">
                        <p>Auteur :<br/>
                            <?= $dataPosts->getCreatedBy()->getUsername(); ?>
                        </p>
                        <p>Titre :</p>
                            <textarea name="title" cols="50" rows="1"><?= $dataPosts->getTitle();?></textarea>
                        <p>Chapo :</p>
                            <textarea name="chapo" cols="150" rows="3"><?= $dataPosts->getChapo();?></textarea>
                        <p>Texte :</p>
                            <textarea name="text" cols="150" rows="10"><?= $dataPosts->getText();?></textarea>
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
                </div>
            </div>
        </div>
    </div>
</main>