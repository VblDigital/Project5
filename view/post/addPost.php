<?php include ('./view/admin/adminMenu.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Ajouter un billet</h2>
                    <br>
                </div>
                <div>
                    <form class="category-form" action="./index.php?action=admin&p=addPost" method="post">
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
                                <input type="checkbox" name="category[]" value="<?= $category->getId(); ?>"><?= $category->getName(); ?><br/></input>
                            <?php } ?>
                        </p>
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>