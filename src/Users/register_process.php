<?php

include_once '../../vendor/autoload.php';

use App\Users\Users;
use App\utility;

if (strtoupper($_SERVER['REQUEST_METHOD']) == "POST") {



//$obj = new Users();
//$obj->test();
//$debug = new utility();
//$debug->debug($_REQUEST);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $created = $_POST['created'];
    $user = new Users();
    $user->create($username, $email, $password, $created);
} else {
    header('location:../../login.php');
}