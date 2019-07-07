<?php

namespace src\controller\frontendController;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use src\controller\Input;
use src\Message;

/**
 * Class ContactController
 * @package src\controller\frontendController
 *
 */
class ContactController
{
    /**
     * To send the contact form's result => email
     */
    public function sendContact ()
    {
        $input = new Input();
        $message = new Message();

        if ($input->post('name') != null && $input->post('email') != null && $input->post('text') != null) {
            $name = htmlspecialchars($input->post('name'));
            $email = htmlspecialchars($input->post('email'));
            $emailSecure = str_replace(array("\n","\r",PHP_EOL),'',$email);
            $text = htmlspecialchars($input->post('text'));

            $message = new Message();

            if (preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", $email)) {
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->isSMTP(); // Set mailer to use SMTP
                    $mail->Host = $input->env('EMAIL_HOST'); // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true; // Enable SMTP authentication
                    $mail->Username = $input->env('EMAIL_USERNAME'); // SMTP username
                    $mail->Password = $input->env('EMAIL_PASS'); // SMTP password
                    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587; // TCP port to connect to

                    //Recipients
                    $mail->setFrom($emailSecure, $name);
                    $mail->addAddress('vbopenclass@gmail.com');
                    $mail->addReplyTo($emailSecure);

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Message depuis le blog';
                    $mail->Body = $text;
                    $mail->AltBody = $text;

                    $mail->send();
                    $message->setMessage('Votre message a bien été envoyé. Nous vous répondrons sous peu.');
                } catch (Exception $e) {
                    $message->setMessage('pas envoyé');
                }
            } else {
                $message->setMessage('Le format / votre adresse email n\'apparaît pas corrects.
                 Le message n\'a pû être envoyé');
            }
        } else {
            $message->setMessage('Veuillez remplir tous les champs.');
        }
    }
}
