<?php

namespace src\manager;

use mysql_xdevapi\Exception;
use src\controller\Input;
use src\model\User;

/**
 * Class UserManager with sql requests related to users
 * @package src\manager
 */
class UserManager extends Manager
{
    /**
     * @return array|mixed
     */
    public function getUsers()
    {
        return $this->prepareObject('SELECT * FROM user', User::class, true );
    }

    /**
     * @param $userId
     * @return array|mixed
     */
    public function getUser ( $userId)
    {
        return $this->prepareObject('SELECT * FROM user WHERE id=' . $userId, User::class, false);
    }

    /**
     * @param $postId
     * @return array|mixed
     */
    public function getPostUser( $postId)
    {
        return $this->prepareObject('SELECT * FROM user WHERE id =' . $postId, User::class, false);
    }

    /**
     * @param $commentId
     * @return array|mixed
     */
    public function getCommentUser( $commentId)
    {
        return $this->prepareObject('SELECT * FROM user WHERE id =' . $commentId, User::class, false);
    }

    /**
     * @param $username
     * @param $password
     * @param $email
     */
    public function addUser( $username, $password, $email)
    {
        $this->prepareStmt('INSERT INTO user (username, password, email) VALUES ("'. $username . '", "'. $password . '", "'. $email . '")');
    }

    /**
     * @param $userId
     * @param $username
     * @param $email
     * @return array|mixed
     */
    public function modifyUser( $userId, $username, $email)
    {
        $this->prepareStmt('UPDATE user SET username = "' . $username . '", email = "' . $email . '" WHERE id=' . $userId);
        return $this->getUser($userId);
    }

    /**
     * @param $userId
     * @param $password
     * @return array|mixed
     */
    public function modifyUserPass( $userId, $password)
    {
        $this->prepareStmt('UPDATE user SET password = "' . $password . '" WHERE id=' . $userId);
        return $this->getUser($userId);
    }

    /**
     * @param $userId
     */
    public function deleteUser( $userId)
    {
        try{
            return $this->prepareStmt('DELETE FROM user WHERE id=' . $userId);
        }
        catch (\PDOException $e) {
            $erreur = explode(':', $e->getMessage());
            if ($erreur[2] == 1451) {
                echo $errorMessage = "Cet utilisateur a toujours des billets actifs, il ne peut être supprimé !";
            }
        }
    }

    /**
     * @param $username
     * @param $password
     */
    public function checkUser( $username, $password)
    {
        $_SESSION['user'] = $this->prepareObject('SELECT * FROM user where username = "'. $username . '" && password = "'. $password . '"', User::class, false );
    }
}
