<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
            <div class="blog-post">
                <?php foreach ($bdd->query('SELECT * FROM post', model\mesClass\Post::class) as $post): ;
                require '../controller/getPosts.php';
                ?>
                <h2 class="blog-post-title">
                    <?= $posttitle; ?>
                </h2>
                <div class="blog-post-meta">Publié le <?php $date = $postdate; $newdate = date("d-m-Y", strtotime($postdate)); echo $newdate; ?> par
                <?= $postauthor; ?>
                </div>
                <div class="blog-post">
                <?= $postchapo;?><br/>
                </div>
                <div>
                <a href="index.php&id=<?php echo $posturl;?>">Lire la suite</a>
                </div>
                <div class="blog-post-meta">Catégorie(s) : <?php
                    include ('../controller/getCategory.php');
                    ?>
                </div>
                <p class="blog-post-meta">
                <?php
                include ('../controller/checkupdate.php');
                endforeach; ?>
                </p>
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