<?php


namespace src\controller\frontendController;


class ContactController
{
    public function sendContact ()
    {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
        }
        $contact = "Message reçu de " . $name . " - adresse email : " . $email . "<br/>Message : " . $message;
        //$send = mail('vbopenclass@gmail.com', 'Message reçu du blog', $contact);
    }
}