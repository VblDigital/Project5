<?php require ('./view/admin/adminMenu.php');
$input = new \src\controller\Input(); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Modifier un utilisateur</h2>
                </div>
                <div>
                    <br/>
                    <?php require './view/forms/modifyUserForm.php'; ?>
                </div>
                <div>
                    <br/>
                    <?php require './view/forms/modifyUserPassForm.php'; ?>
                </div>
            </div>
        </div>
    </div>
</main>