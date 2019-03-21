<?php
/**
 * Created by PhpStorm.
 * PostsCategories: VALEBLES
 * Date: 27/02/2019
 * Time: 21:33
 */

require '..\mesClass\Form.php';

$form = new App\Form($_POST);

?>

<div align="center">
    <form  method="POST" action="#">
        <div>
            <h2>Se connecter</h2>
        </div>
        <?php
        echo $form->input('username') . '<br/>';
        echo $form->input('password') . '<br/>';
        ?>
        <br/>
        Les champs suivis d'une * sont obligatoires<br/>
        <br/>
        <?php
            echo $form->submit();
        ?>
        <br/>
    </form>
</div>
    <!--<div>
        Pas encore inscrit ? Venez par <a href="register.php">ICI</a>
    </div>-->

