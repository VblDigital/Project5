<?php include ('./view/admin/adminMenu.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 blog-main">
            <div class="blog-post">
                <div>
                    <h2>Ajouter un utilisateur</h2>
                    <br>
                </div>
                <div>
                    <form class="user-form" action="addUser" method="post">
                        <p>Pseudonyme :<br/>
                            <textarea name="username" cols="50" rows="1"></textarea>
                        </p>
                        <p>Mot de passe :<br/>
                            <input type="password" name="password" cols="50" rows="1"></input>
                        </p>
                        <!--<p>Répétez le mot de passe :<br/>
                            <textarea name="passwordcheck" value="" cols="50" rows="1"></textarea>
                        </p>-->
                        <p>Adresse email :<br/>
                            <textarea name="email" cols="50" rows="1"></textarea>
                        </p>
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>