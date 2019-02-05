<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 05/02/2019
 * Time: 16:14
 */
session_start();
?>
<!--login form -->
        <form  method="POST" action="admin/connect.php">
            <div>
                <h2>Se connecter</h2>
            </div>
            <div>
                <input id="username" style="width:200px" type="text" name="username" placeholder="Identifiant" required> *
            </div>
            <div>
                <input id="password" style="width:200px" type="password" name="password" placeholder="Mot de passe" required> *
            </div>
            <br/>
            Les champs suivis d'une * sont obligatoires<br/>
            <br/>
            <div>
                <input type="submit" name="log_action" value="Valider">
            </div>
            <div>
                Pas encore inscrit ? Venez par <a href="admin/register.php">ICI</a>
            </div>
        </form>