<?php include ('./view/admin/adminMenu.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Modifier un utilisateur</h2>
                </div>
                <div>
                    <br/>
                    <form class="user-form" action="./index.php?action=admin&p=modifyUser&id=<?= $_GET['id']; ?>" method="post">
                        <p>Modifier les coordonnées :</p>
                        <p>Pseudonyme :</p>
                            <textarea name="username" cols="100" rows="1"><?= $dataUsers->getUsername(); ?></textarea>
                        <p>Adresse email :<br/></p>
                            <textarea name="email" cols="100" rows="1"><?= $dataUsers->getEmail(); ?></textarea>
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
                <div>
                    <br/>
                    <form class="user-form" action="./index.php?action=admin&p=modifyUserPass&id=<?= $_GET['id']; ?>" method="post">
                        <p>Modifier le mot de passe :</p>
                        <p>Nouveau mot de passe :<br/>
                            <input type="password" name="password" cols="100" rows="1"></input>
                        </p>
                        <!--<p>Répétez le mot de passe :<br/>
                            <textarea name="passwordcheck" value="" cols="50" rows="1"></textarea>
                        </p>-->
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>