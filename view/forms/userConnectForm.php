<div align="center">
    <div>
        Pour accéder à la page d'administration, il vous faut au préalable vous connecter :
    </div>
    <form  name="loginForm" method="POST" action="./index.php?action=admin&p=check-user">
        <div>
            <div class="warning">
                <?php
                $message = new \src\Message();
                $message->message();
                ?>
            </div>
        </div>
        <div>
            <h2>Se connecter</h2>
        </div>
        <div>
            <input type="text" name="username" placeholder="Identifiant" autocomplete="on"> *
        </div>
        <div>
            <input type="password" name="password" placeholder="Mot de passe" autocomplete="off"> *
        </div>
        <br/>
        Les champs suivis d'une * sont obligatoires<br/>
        Attention à la casse.<br/>
        <br/>
        <div>
            <input type="submit" name="submit" value="Valider">
        </div>
    </form>
</div>