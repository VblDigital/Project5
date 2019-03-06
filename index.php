<?php

session_start();
/** * Created by PhpStorm.

 * User: VALEBLES
 * Date: 24/01/2019
 * Time: 17:30
 */
// connection to database
require 'mesClass/Autoloader.php';
\mesClass\Autoloader::register();
$bdd = new mesClass\Database('project5_bdd');

if(isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

if ($p === 'home') {
    require 'home.php';
}
if ($p === 'allpost') {
    require 'post/allpost.php';
}
?>