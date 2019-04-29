<?php $title = 'Les catégories'; ?>

<?php ob_start(); ?>
    <div>
        <h2>Liste des catégories disponibles</h2>
            <table class="table table-hover">
                 <thead>
                     <tr>
                         <th>Référence catégorie</th>
                         <th>Nom de la catégorie</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php foreach ($categories as $category) {?>
                     <tr >
                         <td><?= $category->getId(); ?></td>
                         <td><?= $category->getName(); ?></td>
                     </tr>
                 </tbody>
                 <?php }?>
            </table>
            <br>
    </div>
<div class="blog-footer-less"><a href="addCategory.php">Ajouter une catégorie</a>  --  <a href="#">Modifier les catégories</a></div>
<?php $content = ob_get_clean(); ?>

<?php require('adminTemplate.php'); ?>
