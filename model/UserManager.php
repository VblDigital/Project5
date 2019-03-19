<?php
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 19/03/2019
 * Time: 16:28
 */

namespace model;

require_once("Manager.php");

class UserManager extends Manager
{
    private $id;
    private $username;
    private $password;
    private $email;

    /**
     * @param mixed $id
     */
    public function setId ( $id )
    {
        $id = (int) $id;
        if($id>0){
            $this->id = $id;
        }
    }
    /**
     * @param mixed $username
     */
    public function setUsername ( $username )
    {
        if(is_string($username)) {
            $this->username = $username;
        }
    }

    /**
     * @param mixed $password
     */
    public function setPassword ( $password )
    {
        if(is_string($password)) {
            $this->password = $password;
        }
    }

    /**
     * @param mixed $email
     */
    public function setEmail ( $email )
    {
        if(is_string($email)) {
            $this->email = $email;
        }
    }

    /**
     * @return mixed
     */
    public function getId ()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername ()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword ()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getEmail ()
    {
        return $this->email;
    }
}