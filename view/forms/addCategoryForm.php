<form class="category-form" action="admin-addcategory" method="post">
    <div class="warning">
        <?php
        $message = new \src\Message();
        $message->message();
        ?>
    </div>
    <p>Nom de la catégorie :</p>
    <input type="text" name="categoryName" value="" cols="45" rows="1"><br />
    <button type="submit">Enregistrer</button>
</form>