<?php $title = 'Page 404'; ?>

<?php ob_start(); ?>
    <div class="center">
        <img src="../public/img/404.png" /><br/>
        <a href="javascript:history.go(-1)"><img src="../public/img/retour.png" /></a>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require 'view/template.php'; ?>