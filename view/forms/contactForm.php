<?php $title = 'Mon profil'; ?>

<?php ob_start(); ?>
<?php require './view/menu.php'; ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Pour me contacter</h2>
                </div>
                <div class="warning">
                    <?php if (isset($texte)){
                        echo $texte;}
                    ?><br/>
                </div>
                <div>
                    <form class="category-form" action="contact" method="post">
                        <p>Votre nom :<br/>
                            <textarea name="name" cols="50" rows="1"></textarea>
                        </p>
                        <p>Votre adresse email :<br/>
                            <textarea name="email" cols="100" rows="1"></textarea>
                        </p>
                        <p>Votre message :<br/>
                            <textarea name="message" cols="150" rows="10"></textarea>
                        </p>
                        <button type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require './view/blogFooter.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>