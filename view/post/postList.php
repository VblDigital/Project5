<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<?php require ($path . 'view/introduction.php'); ?>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <div class="blog-post">
                    <?php
                    while ($data = $post->fetch())
                    {
                    ?>
                    <h2 class="blog-post-title">
                        <?= $data['title']; ?>
                    </h2>
                    <div class="blog-post-meta">Publié le
                        <?php
                        $date = $data['4'];
                        setlocale(LC_TIME, 'fr_FR.utf8','fra');
                        echo utf8_encode(strftime("%A %#d %B %Y", strtotime($date)));  ?>
                        par
                    </div>
                    <div class="blog-post">
                        <?= $data['3'];;?><br/>
                    </div>
                    <div>
                        <a href="index.php?action=post&id=<?= $data['id'] ?>">Lire la suite</a>
                    </div>
                    <div class="blog-post-meta">Catégorie(s) :
                    </div>
                    <p class="blog-post-meta">
                    </p>
                    <?php
                    }
                    $post->closeCursor();
                    ?>
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

<?php $content = ob_get_clean(); ?>

<?php require($path . 'view/template.php'); ?>
