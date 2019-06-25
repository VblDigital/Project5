<?php $title = $post->getTitle();
$message = new \src\Message(); ?>

<?php ob_start(); ?>
<?php require './view/menu.php';
$input = new \src\controller\Input(); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div class="lien">
                    <a href="../index.php"> <<<< Retour</a>
                </div>
                <div class="warning">
                    <?php
                        $message->message();
                    ?>
                </div>
                <!-- POST -->
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
                <div>
                    <img class='medium' src="<?= $post->getFileUrl();?>"/>
                </div>
                <!-- Category(ies) -->
                <div class="blog-post-meta">Catégorie(s) :
                    <?php
                    echo implode(', ', $categoriesNames);
                    ?><br/><?php
                    if(($post->getUpdatedDate()==! "")){
                        $date = $post->getUpdatedDate();
                        setlocale(LC_TIME, 'fr_FR.utf8','fra');
                        echo "Modifié le : " . utf8_encode(strftime("%A %#d %B %Y", strtotime($date)));
                    } ?>
                </div><br/>
                <!-- Comment(s) -->
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
                    <!-- To add comment -->
                    <div>
                        <?php require './view/forms/commentForm.php'; ?>
                    </div>
                </div>
            </div>
       </div>
   </div>
</main>
<?php require './view/blogFooter.php'?>

<?php $content = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>