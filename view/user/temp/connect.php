<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../vendor/autoload.php';
require('../../src/controller/BackendConnect.php');

$userFormController = new \src\manager\UserFormManager();
var_dump($userFormController->getUser());
