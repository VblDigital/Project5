<?php
// we define if the form has been validated
if(isset($_POST['submit'])) {

    // we define if the form has been filled
    $connect = (isset($username) && isset($_POST['password']));

    // we define the variable with the data filled
    if ($connect) {
        echo "OK";
    }
}