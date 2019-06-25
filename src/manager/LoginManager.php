<?php

namespace src\manager;

/**
 * Class LoginManager with sql requests related to login process
 * @package src\manager
 */
class LoginManager extends Manager
{
    /**
     * @param $username
     * @return array|mixed
     */
    public function userToLog( $username)
    {
        return $this->prepareObject('SELECT * FROM user WHERE username =' . "' . $username . '", User::class, false);
    }
}