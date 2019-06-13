<div class="blog-post">
    <div>
        <br/><h3>Ajouter un commentaire</h3>
    </div>
    <div>
        <form class="comment-form" action="submitcomment-<?= $_GET['id'] ?>" method="post">
            <p>Pseudonyme :</p>
            <textarea name="commentAuthor" cols="50" rows="1"></textarea>
            <p>Texte :</p>
            <textarea name="commentText" cols="70" rows="7"></textarea><br/>
            <input type="hidden" name="postId" value="<?= $_GET['id'];?>" />
            <button type="submit">Enregistrer</button>
        </form>
    </div>
</div>