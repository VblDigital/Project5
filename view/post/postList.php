<!-- First page displayed on homepage with all posts list -->
<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<?php require ('./view/menu.php'); ?>
<?php require ('./view/introduction.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <div class="blog-post">
                <!-- Left part - all the posts displayed with chapo and link to reach a post related to id -->
                <?php
                foreach ($posts as $datas){ ?>
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
                    <a href="./post-<?= $datas->getId(); ?>">Lire la suite</a>
                </div>
                <div class="blog-post-meta">Catégorie(s) :
                    <?php $categoriesNames = array();
                    foreach ($datas->getCategories() as $category) {$categoriesNames[] = $category->getName();}
                    echo implode(', ', $categoriesNames);
                    ?>
                </div>
                <p class="blog-post-meta">
                </p>
                <?php } ?>
                <hr>
                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Précédent</a>
                    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Suivant</a>
                </nav>
            </div>
        </div>
        <!-- right part - links to social media -->
        <?php require './view/aside.php'; ?>
    </div>
</main>
<?php require './view/blogFooter.php'?>

<?php $content = ob_get_clean(); ?>

<?php require'view/template.php'; ?>
