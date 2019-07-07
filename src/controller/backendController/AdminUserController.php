<?php

namespace src\controller\backendController;

use PHPMailer\PHPMailer\PHPMailer;
use src\controller\Input;
use src\manager\UserManager;
use src\Message;

/**
 * Class AdminUserController
 * @package src\controller\backendController
 * To manage users in Admin part
 */
class AdminUserController
{
    /**
     * @return array
     * Display all the users
     */
    public function viewUsers()
    {
        $userManager = new UserManager();
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    /**
     * @return array
     * Display one specific user
     */
    public function viewUser()
    {
        $input = new Input();
        $userManager = new UserManager();
        $viewuser = $userManager->getUser($input->get('id'));

        return ['dataUser' => $viewuser, 'view' => './view/user/modifyUser.php'];
    }

    /**
     * @return array
     * Action after new user's form submission
     */
    public function addUser()
    {
        $input = new Input();
        if ($input->post('username') && $input->post('password') && $input->post('email'))
        {
            $username = htmlspecialchars($input->post('username'));
            $password = htmlspecialchars($input->post('password'));
            $password = md5($password);
            $email = htmlspecialchars($input->post('email'));
        }
        $userManager = new UserManager();
        $userManager->addUser($username, $password, $email);
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    /**
     * @return array
     * Action after update user's form submission excepted password
     */
    public function modifyUser()
    {
        $input = new Input();
        $id = $input->get('id');
        if ($input->post('username') && $input->post('email'))
        {
            $username = htmlspecialchars($input->post('username'));
            $email = htmlspecialchars($input->post('email'));
        }

        $userManager = new UserManager();
        $userManager->modifyUser($id, $username, $email);
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    /**
     * @return array
     * Action after update user's form submission - only password
     */
    public function modifyUserPass()
    {
        $input = new Input();
        $id = $input->get('id');

        if ($input->post('password'))
        {
            $password = md5($input->post('password'));
        }

        $userManager = new UserManager();
        $userManager->modifyUserPass($id, $password);
        $viewUsers = $userManager->getUsers();

        return ['dataUsers' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    /**
     * @return array
     * Delete one specific user related to the id
     */
    public function deleteUser()
    {
        $input = new Input();
        $id = $input->get('id');

        $userManager = new UserManager();
        $userManager->deleteUser($id);
        $viewUsers= $userManager->getUsers();

        return ['dataUser' => $viewUsers, 'view' => './view/user/viewUsers.php'];
    }

    /**
     * @return array
     * Action after login user's form submission
     */
    public function checkUser()
    {
        $input = new Input();
        if ($input->post('username') && ($input->post('password')))
        {
            $username = htmlspecialchars($input->post('username'));
            $password = htmlspecialchars($input->post('password'));
            $password = md5($password);

            $userManager = new UserManager();
            $userManager->checkUser($username, $password);

            if ($_SESSION['user'] == null)
            {
                $message = new Message();
                $alert = $message->setMessage('L\'identifiant et/ou le mot de passe est incorrect.');
                return ['alert' => $alert, 'view' => './view/forms/userConnectForm.php'];
            }
            $id = $_SESSION['user']->getId();
            $userManager->refreshNewpass($id);
            header('Location: /admin');
        } else {
            $message = new Message();
            $alert = $message->setMessage('Les champs ci-dessous ne peuvent être vide.');
            return ['alert' => $alert, 'view' => './view/forms/userConnectForm.php'];
        }
    }

    public function passRecovery()
    {
        $input = new Input();
        // the cell accountemail is not empty
        if ($input->post('accountemail')) {
            $email = htmlentities(strtolower(trim($input->post('accountemail'))));
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // the email format is valid
                $userManager = new UserManager();
                $test = $userManager->checkUserEmail($email);
                if ($input->session('email') == false)
                {
                    //No account is linked to this email address
                    $message = new Message();
                    $alert = $message->setMessage('Cette adresse email ne correspond à aucun compte connu.');
                    return ['alert' => $alert, 'view' => './view/forms/passRecoveryForm.php'];
                } else {
                    $checkNewPass = $input->session('email')->getNewpass();
                    if ($checkNewPass == "1") {
                        // a new password has been requested
                        $message = new Message();
                        $alert = $message->setMessage('Une réinitialisation de mot de passe a déjà été faite.');
                        return ['alert' => $alert, 'view' => './view/forms/passRecoveryForm.php'];
                    } else {
                        //An account has been linked to this email address
                        //Generate the password
                        $newpass = rand(10000, 99999);

                        //Send the new password by email
                        $mail = new PHPMailer(true);
                        $message = new Message();
                        $email = $input->session('email')->getEmail();
                        $name = "";
                        $text = "Bonjour, <br/> Voici votre nouveau de mot de passe : " . $newpass . ". 
                        <br/> Le blog de Valérie Bleser.";

                        //Server settings
                        $mail->isSMTP(); // Set mailer to use SMTP
                        $mail->Host = 'smtp.mailgun.org'; // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true; // Enable SMTP authentication
                        $mail->Username = 'postmaster@sandbox77380c8d295d42b8980f538139b34c86.mailgun.org'; // SMTP username
                        $mail->Password = '49e16f34743c196137cddbb41f0e6acd-29b7488f-f49be92b'; // SMTP password
                        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587; // TCP port to connect to

                        //Recipients
                        $mail->setFrom($email, $name);
                        $mail->addAddress('vbopenclass@gmail.com');
                        $mail->addReplyTo($email);

                        // Content
                        $mail->isHTML(true); // Set email format to HTML
                        $mail->Subject = 'Récupération de mot de passe';
                        $mail->Body = $text;
                        $mail->AltBody = $text;

                        $mail->send();
                        $alert = $message->setMessage('Nouveau mot de passe envoyé.');

                        //Insert the new password in the database
                        $id = ($input->session('email')->getId());
                        $userManager = new UserManager();
                        $userManager->newPass($id, $newpass);

                        return ['alert' => $alert, 'view' => './view/forms/userConnectForm.php'];
                    }
                }
            } else {
                // the email format is not valid
                $message = new Message();
                $alert = $message->setMessage('Le format de l\'adresse email n\'est pas correct.');
                return ['alert' => $alert, 'view' => './view/forms/passRecoveryForm.php'];
            }
        } elseif ($input->post('accountemail') == null) {
            // the cell accountemail is empty
            $message = new Message();
            $alert = $message->setMessage('Les champs ci-dessous ne peuvent être vide.');
            return ['alert' => $alert, 'view' => './view/forms/passRecoveryForm.php'];
        }
    }
}
