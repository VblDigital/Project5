<div class="row">
    <div class="col-md-12 blog-main">
        <div class="blog-post">
            <!-- Generate all the posts in a variable -->
            <div>
                <?php
                foreach ($bdd->query('SELECT * FROM post', mesClass\Functions::class) as $post): ;
                $id=$post->getId();
                //$sth2 = $bdd->prepare_category(SELECT )
                $user=$post->getCreatedBy();
                $sth = $bdd->prepare_reference('SELECT username FROM user WHERE id = ' . $user, 'mesClass\User');
                ?>
                <!-- Display the posts -->
                <h2 class="blog-post-title">
                    <?php echo $post->getTitle(); ?>
                </h2>
                <p class="blog-post-meta">Publié le <?php $date = $post->getCreatedDate(); $newdate = date("d-m-Y", strtotime($date)); echo $newdate; ?> par
                <?php echo $sth->getUsername(); ?>
                </p>
                <div style="max-width: 900px">
                    <?php
                    //create the small extract of post
                    echo $post->getChapo(); ?><br />
                </div>
                <div>
                <!-- Link to view all the post -->
                <a href="
                    <?php
                    $id_url=$post->getId();
                    echo 'index.php?p=allpost&id=' . $id_url
                    ?>
                ">Lire la suite</a>
                </div>
                <p class="blog-post-meta">
                    <?php
                    if($post->getUpdatedDate()!="") {
                        $update = $post->getUpdatedDate();
                        $newdupdate = date("d-m-Y", strtotime($update));
                        echo 'Modifié le ' . $newdupdate;
                    }
                    ?>
                </p>
            </div>
            <hr>
            <?php endforeach; ?>
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
            </nav>
        </div>
        <!--<aside class="col-md-4 blog-sidebar">
            <div class="p-4 mb-3 bg-light rounded">
                <h4 class="font-italic">About</h4>
                <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
            <div class="p-4">
                <h4 class="font-italic">Archives</h4>
                <ol class="list-unstyled mb-0">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                </ol>
            </div>
            <div class="p-4">
                <h4 class="font-italic">Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </aside><!-- /.blog-sidebar -->

        <!-- /.row -->
    </div>
</div>

