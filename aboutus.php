<?php
include_once "vendor/autoload.php";
SESSION_START();
use App\Product\Products;
use App\Users\Users;
use App\utility;
use App\Profile\Profiles;


if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    $product_object = new Products();
    $all_product = $product_object->find_one_product($_POST['product_code']);
    $debug_object = new utility();
//    $debug_object->debug($all_product);
//    $debug_object->debug($_REQUEST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Home | Lost & Found </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/searchbox.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" href="#"><img src="assets/admin/layout3/img/mylogo2.png"</a>
            <ul class="nav navbar-nav navbar-right pull-right">
                <li><a href="index.php"></a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="aboutus.php">about us</a></li>

            </ul>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="register-container container">
    <div class="row">

        <form class="form-wrapper cf" action="index.php" method="POST">
            <label class="input-block-level" style="color: white;"><font color = "green" face="Verdana" style="font-size: 20px">This site is help u to find your lost things. With condition that is you have to sign up and register your product with details about you and your product. After registration you get a code and then you have to print this code and attach it with your product. This will help to find your product. If you lost your product and then if anyone find it, he can contact with you with this code through our site.</font>
            </label>

            <p style="font-size: 15px">N.B</p>
            <ul type="disc">
                <li><font color = "green" face="Verdana" style="font-size: 15px">Your information remain safe and when you want to inform the founder about yourself only then he can know it.</font></li>
                <li><font color = "green" face="Verdana" style="font-size: 15px">This site only help you to contact with founder. </font></li>
                <li><font color = "green" face="Verdana" style="font-size: 15px">We don’t provide any kind of security of your product and you.</font></li>
            </ul>
            
        </form>
    </div>
</div>

<!-- Javascript -->
<script src="assets/js/jquery-1.8.2.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>

</body>

</html>

