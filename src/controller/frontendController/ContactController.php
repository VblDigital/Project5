<?php

namespace src\controller\frontendController;

use src\controller\Input;

class ContactController
{
    public function sendContact ()
    {
        $input = new Input();

        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
            $name = $input->post('name');
            $email = $input->post('email');
            $message = $input->post('message');
        }
        $contact = "Message reçu de " . $name . " - adresse email : " . $email . "<br/>Message : " . $message;
        //$send = mail('vbopenclass@gmail.com', 'Message reçu du blog', $contact);
    }
}