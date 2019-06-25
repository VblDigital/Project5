<?php

namespace src;

/**
 * Class Message to display message after form's soumission
 * @package src
 */
class Message
{
    public function setMessage ($message){
        $_SESSION['message'] = $message;
    }

    public function message(){
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }
}