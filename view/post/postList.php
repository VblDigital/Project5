<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<?php require ('./view/introduction.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <div class="blog-post">
                <?php
                foreach ($posts as $datas){
                ?>
                <h2 class="blog-post-title">
                    <?= $datas->getTitle (); ?>
                </h2>
                <div class="blog-post-meta">Publié le
                    <?php
                    $date = $datas->getCreatedDate();
                    setlocale(LC_TIME, 'fr_FR.utf8','fra');
                    echo utf8_encode(strftime("%A %#d %B %Y", strtotime($date))); ?>
                    par <?= $datas->getCreatedBy()->getUsername(); ?>
                </div>
                <div class="blog-post">
                    <?= $datas->getChapo(); ?><br/>
                </div>
                <div>
                    <a href="./index.php?action=post&id=<?= $datas->getId(); ?>">Lire la suite</a>
                </div>
                <div class="blog-post-meta">Catégorie(s) :
                    <?php
                    $categoriesNames = array();
                    foreach ($datas->getCategories() as $category) {
                        $categoriesNames[] = $category->getName();
                    }
                    echo implode(', ', $categoriesNames);
                    ?>
                </div>
                <p class="blog-post-meta">
                </p>
                <?php } ?>
                <hr>
                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                </nav>
            </div>
        </div>
        <aside class="col-md-4 blog-sidebar">
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        </div>
        </aside>
    </div>
</main>
<?php require './view/blogFooter.php'?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
