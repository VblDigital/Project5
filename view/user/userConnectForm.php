<div align="center">
    <div>
        Pour accéder à la page d'administration, il vous faut au préalable vous connecter :
    </div>
    <form  name="loginForm" method="POST" action="./index.php?action=admin&p=check-user">
        <div>
            <?php
            if(isset($errMsg)){
                echo '<div>'.$errMsg.'</div>';
            }
            ?>
        </div>
        <div>
            <h2>Se connecter</h2>
        </div>
        <div>
            <input type="text" name="username" placeholder="Identifiant" autocomplete="on" required> *
        </div>
        <div>
            <input type="password" name="password" placeholder="Mot de passe" autocomplete="off" required> *
        </div>
        <br/>
        Les champs suivis d'une * sont obligatoires<br/>
        <br/>
        <div>
            <input type="submit" name="submit" value="Valider">
        </div>
    </form>
</div>