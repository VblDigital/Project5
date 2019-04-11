<?php $title = $post->getTitle(); ?>

<?php ob_start(); ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
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
                    implode(',', $categoriesNames);
                    ?>
                </div>
                <div class="blog-post">
                    Commentaires :<br/><br/>
                </div>
                <div class="blog-post">
                    <?php foreach($post->getComments() as $comment) { ?>
                    <div class="blog-post-meta">
                        Le
                        <?php $dateComment = $comment->getDate();
                        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                        echo utf8_encode(strftime("%A %#d %B %Y", strtotime($dateComment)));?>
                        par
                        <?=$comment->getUserId()->getUsername() ;?>
                    </div>
                        <div class="blog-post">
                            <?= $comment->getText();?>
                        </div>
                </div>
                <div>

                </div>
                <?php } ?>
            </div>
       </div>
   </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
