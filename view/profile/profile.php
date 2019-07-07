<?php $title = 'Mon profil'; ?>

<?php ob_start(); ?>
<?php require './view/menu.php'; ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div class="lien">
                    <a href="../index.php"> <<<< Retour</a>
                </div>
                <h2 class="blog-post-title-single">
                    <img class="profileImg" src="./public/img/profile.jpg" />
                    Valérie Bleser
                </h2>
                <div class="blog-post-meta">
                    En formation chez Openclassrooms - parcours <strong>Développeur d'application - PHP / Symfony</strong>
                </div>
                <div class="blog-post">
                    Après une vingtaine d'années dans différents domaines de la Finance, je décide lors d'un tournant de
                    ma carrière de revenir à ma passion de jeunesse - l'informatique.<br/></br/>
                    Après différents bilans de compétence et un début de formation dans le domaine de l'architecture
                    réseau, je me réoriente vers la programmation.<br/><br/>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require './view/blogFooter.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>