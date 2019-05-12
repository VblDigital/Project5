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
                        <p>Autheur :</p>
                        <input type="text" name="author" value="">
                        <p>Titre :</p>
                        <input type="text" name="title" value="">
                        <p>Chapo :</p>
                        <input type="text" name="chapo" value="">
                        <p>Texte :</p>
                        <input type="text" name="text" value="">
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>