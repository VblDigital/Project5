<?php $title = $post->getTitle(); ?>

<?php ob_start(); ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title-single">
                    <?= $post->getTitle(); ?>
                </h2>
                <div class="blog-post-meta">Publié le
                    <?php
                    $date = $post->getCreatedDate();
                    setlocale(LC_TIME, 'fr_FR.utf8','fra');
                    echo utf8_encode(strftime("%A %#d %B %Y", strtotime($date)));  ?>
                    par <?php foreach ($post as $author) {?>
                        <div><?php echo $author->getCreatedBy()->getUsername()?></div>
                        <?php }?>
                </div>
                <div class="blog-post">
                    <?= $post->getText();?><br/>
                </div>
                <div class="blog-post-meta">Catégorie(s) :
                </div>
                <p class="blog-post-meta">
                </p>
            </div>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
