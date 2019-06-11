<?php $title = $post->getTitle(); ?>

<?php ob_start(); ?>
<?php include './view/menu.php'; ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <a href="../index.php"> <<<< Retour</a>
                <h2 class="blog-post-title-single">
                    <?= $post->getTitle();?>
                </h2>
                <div class="blog-post-meta">Publié le
                    <?php
                    $date = $post->getCreatedDate();
                    setlocale(LC_TIME, 'fr_FR.utf8','fra');
                    echo utf8_encode(strftime("%A %#d %B %Y", strtotime($date)));  ?>
                    par <?= $post->getCreatedBy()->getUsername(); ?>
                </div>
                <div class="blog-post">
                    <?= $post->getText();?><br/>
                </div>
                <div class="blog-post-meta">Catégorie(s) :
                    <?php
                    echo implode(', ', $categoriesNames);
                    ?>
                </div>
                <div class="blog-post">
                    <?php
                        if (empty($post->getComments()))
                        {
                            echo "Pas de Commentaires. Ajoutez le premier commentaire de ce billet !";
                        }
                        else
                        {
                            echo "Commentaires : ";
                        }
                    ?>
                </div>
                <div class="blog-post">
                    <?php foreach($post->getComments() as $comment) { ?>
                    <div class="blog-post-meta">
                        Le
                        <?php $dateComment = $comment->getDate();
                        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                        echo utf8_encode(strftime("%A %#d %B %Y", strtotime($dateComment)));?>
                        par
                        <?=$comment->getAuthor() ;?>
                    </div>
                    <div class="blog-post">
                        <?= $comment->getText();?>
                    </div><br/>
                    <?php }?>
                    <div class="warning">
                        <?php
                        if (isset($_GET['warning'])){
                            echo "<br/> " . $_GET['warning'] . "<br/>";
                        }
                        ?>
                    </div>
                    <div>
                        <?php require './view/comment/commentForm.php'; ?>
                    </div>
                </div>
            </div>
       </div>
   </div>
</main>
<?php require './view/blogFooter.php'?>

<?php $content = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>