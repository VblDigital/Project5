<?php
require ($path . '/model/Autoloader.php');
\model\Autoloader::register();
$bdd = new \model\Manager('project5_bdd');