<?php $title = $post['title']; ?>

<?php ob_start(); ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <h2 class="blog-post-title-single">
                    <?= $post['title'] ?>
                </h2>
                <div class="blog-post-meta">Publié le
                    <?php
                    $date = $post['created_date'];
                    setlocale(LC_TIME, 'fr_FR.utf8','fra');
                    echo utf8_encode(strftime("%A %#d %B %Y", strtotime($date)));  ?>
                    par
                </div>
                <div class="blog-post">
                    <?= $post['2'];;?><br/>
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

<?php require($path . 'view/template.php'); ?>
