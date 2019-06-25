<?php
// Manage the message (alert) after forms submission

require '../vendor/autoload.php';
$input = new \src\controller\Input();

switch($input->get('code'))
{
    case '404':header('Location: index.php?p=404');
        break;
    default:header('Location: index.php');
}