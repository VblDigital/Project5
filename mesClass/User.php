<?php

//To create the object Users
namespace mesClass;
/**
 * Created by PhpStorm.
 * User: VALEBLES
 * Date: 24/02/2019
 * Time: 11:21
 */
/**
 * mesClass User
 * New mesClass to create the users
 */
class User
{
    private $id;
    private $username;
    private $password;
    private $email;

    /**
     * @param mixed $id
     * @return int
     */
    public function setId ( $id ) {
        $id = (int) $id;
        if($id>0) {
            $this->_id = $id;
        }
    }

    /**
     * @param mixed $username
     * @return string
     */
    public function setUsername ( $username ) {
        if(is_string($username)) {
            $this->_username = $username;
        }
    }

    /**
     * @param mixed $password
     * @return string
     */
    public function setPassword ( $password ) {
        if(is_string($password)) {
            $this->_password = $password;
        }
    }

    /**
     * @param mixed $email
     * @return string
     */
    public function setEmail ( $email ) {
        if(is_string($email)) {
            $this->_email = $email;
        }
    }

    /**
     * @return mixed
     */
    public function getId () {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername () {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword () {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getEmail () {
        return $this->email;
    }
}