<?php

namespace src\controller\frontendController;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
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

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'postmaster@sandbox77380c8d295d42b8980f538139b34c86.mailgun.org';                     // SMTP username
            $mail->Password   = 'fb7362d3ce87ddde7b10f9b183b9b9a1-29b7488f-1f58bc83';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($email, $name);
            $mail->addAddress('vbopenclass@gmail.com');
            $mail->addReplyTo($email);

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Message depuis le blog';
            $mail->Body    = $message;
            $mail->AltBody = $message;

            $mail->send();
            $texte = 'Votre message a bien été envoyé. Nous vous répondrons sous peu.';
            require'./view/forms/contactForm.php';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}