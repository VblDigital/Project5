<form class="category-form" action="admin-modifycategory-<?= $input->get('id'); ?>" method="post">
    <div class="warning">
        <?php
        $message = new \src\Message();
        $message->message();
        ?>
    </div>
    <p>Changer le nom de la catégorie :</p>
    <textarea name="categoryName" rows="1" cols="45"><?php echo $dataCategories->getName(); ?></textarea><br />
    <button type="submit">Enregistrer</button>
</form>