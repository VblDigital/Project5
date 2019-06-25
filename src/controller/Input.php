<?php

namespace src\controller;

/**
 * Class Input
 * @package src\controller
 * To manage the variables $_GET, $_POST and $_SESSION
 */
class Input
{
    private $_post;
    private $_get;
    private $_session;

    /**
     * Input constructor.
     */
    public function __construct()
    {
        $this->_post = $_POST;
        $this->_get = $_GET;
        $this->_session = $_SESSION;
    }

    /**
     * @param null $key
     * @return mixed|null
     */
    public function post( $key = null)
    {
        return $this->checkGlobal($this->_post, $key);
    }

    /**
     * @param null $key
     * @return mixed|null
     */
    public function get( $key = null)
    {
        return $this->checkGlobal($this->_get, $key);
    }

    /**
     * @param null $key
     * @return mixed|null
     */
    public function session( $key = null)
    {
        return $this->checkGlobal($this->_session, $key);
    }

    /**
     * @param $global
     * @param null $key
     * @return mixed|null
     */
    private function checkGlobal( $global, $key = null)
    {
        if ($key) {
            if (isset($global[$key])) {
                return $global[$key];
            } return null;
        }
        return $global;
    }
}
