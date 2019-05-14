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
                                <option value="<?= $user->getUsername(); ?>"><?= $user->getUsername(); ?></option>
                                <?php } ?>
                            </select>
                        </p>
                        <p>Titre :<br/>
                        <input type="text" name="title" value="" size="80px"></p>
                        <p>Chapo :<br/>
                        <input type="chapobox" name="chapo" value="" size="150px"></p>
                        <p>Texte :<br/>
                        <input type="textbox" name="text" value="" size="30px"></p>
                        <p>Categorie :<br/>
                        <select id="category" name="category">
                            <?php foreach ($dataCategories as $post) {?>
                                <option value="<?= $post->getName(); ?>"><?= $post->getName(); ?></option>
                            <?php } ?>
                        </select>
                        </p>
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>