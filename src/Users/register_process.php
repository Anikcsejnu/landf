<?php

include_once '../../vendor/autoload.php';

use App\Users\Users;
use App\Profile\Profiles;
use App\utility;

if (strtoupper($_SERVER['REQUEST_METHOD']) == "POST") {

    $debug = new utility();
//$debug->debug($_REQUEST);
//die();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $created = $_POST['created'];
    $fullName = $_POST['fullname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    
    $user = new Users();
    $user->create($username, $email, $password, $created);
    //Getting the information from database for insert id to profiel table
    $result = $user->one_user_by_username($username);
    $user_id = $result['id'];
    //Inserting same users id to the profile table. 
    $id = new Profiles();
    $id->insert_id_to_profile($user_id, $fullName, $password, $city, $address);
} else {
    header('location:../../login.php');
}