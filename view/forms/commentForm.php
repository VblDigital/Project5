<?php $input = new \src\controller\Input(); ?>
<div class="blog-post">
    <div>
        <br/><h4>Ajouter un commentaire</h4>
    </div>
    <div>
        <form class="comment-form" action="submitcomment-<?= $input->get('id'); ?>" method="post">
            <p>Pseudonyme :</p>
            <input type="text" name="commentAuthor" cols="50" rows="1" />
            <p>Texte :</p>
            <textarea name="commentText" cols="70" rows="7"></textarea><br/>
            <input type="hidden" name="postId" value="<?= $input->get('id');?>" />
            <button type="submit">Enregistrer</button>
        </form>
    </div>
</div>