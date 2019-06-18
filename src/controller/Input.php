<?php

namespace src\controller;

class Input
{
    private $_post;
    private $_get;
    private $_session;

    public function __construct()
    {
        $this->_post = $_POST;
        $this->_get = $_GET;
        $this->_session = $_SESSION;
    }

    public function post($key = null, $default = null)
    {
        return $this->checkGlobal($this->_post, $key, $default);
    }

    public function get($key = null, $default = null)
    {
        return $this->checkGlobal($this->_get, $key, $default);
    }

    public function session($key = null, $default = null)
    {
        return $this->checkGlobal($this->_session, $key, $default);
    }

    private function checkGlobal($global, $key = null, $default = null)
    {
        if ($key) {
            if (isset($global[$key])) {
                return $global[$key];
            } else {
                return $default ?: null;
            }
        }
        return $global;
    }
}