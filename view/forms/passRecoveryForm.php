<div align="center">
    <div>
        Pour permettre la réinitialisation de votre mot de passe, veuillez entrer l'adresse email utilisée pour ce compte :
    </div>
    <form  name="passRecoveryForm" method="POST" action="admin-recoveryemail">
        <div>
            <div class="warning">
                <?php
                $message = new \src\Message();
                $message->message();
                ?>
            </div>
        </div><br/>
        <div>
            <input type="email" name="accountemail" placeholder="Votre adresse email" autocomplete="off">
        </div>
        <div>
            <input type="submit" name="recupsubmit" value="Valider">
        </div>
        <div>
            <br/><a href="admin">Retour à la page de connexion</a>
        </div>
    </form>
</div>