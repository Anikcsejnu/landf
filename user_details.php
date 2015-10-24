<?php
require_once 'vendor/autoload.php';
session_start();
use App\Product\Products;
use App\Users\Users;
use App\Profile\Profiles;
use App\utility;

$debug = new utility();
//echo $_GET['id'];

if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
    $user_object = new Users();
    $user = $user_object->find_one_user_and_profile($_GET['id']);
//    $debug->debug($user);
    ?>
    ﻿<!DOCTYPE html>
    <html lang="en">
        <head>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title>Edit Profile | Lost & Found</title>
            <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
            <link type="text/css" href="css/theme.css" rel="stylesheet">
            <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
            <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
                  rel='stylesheet'>
        </head>
        <body>
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                            <i class="icon-reorder shaded"></i></a><a class="brand" href="dashboard.php"><img src="assets/admin/layout3/img/mylogo2.png"</a>
                        <div class="nav-collapse collapse navbar-inverse-collapse">
                            <ul class="nav nav-icons">
                                <a href="#"><i ></i> </a></li>
    <!--                                <li><a href="#"><i class="icon-eye-open"></i></a></li>
                                <li><a href="#"><i class="icon-bar-chart"></i></a></li>-->
                            </ul>

                            <ul class="nav pull-right">

                                <li><a href="#">Welcome, <b><?php echo $_SESSION['username']; ?></b> </a></li>
                                <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="images/user.png" class="nav-avatar" />
                                        <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile.php?user=<?php echo $_SESSION['username']; ?>">Your Profile</a></li>
                                        <li><a href="profile_edit.php">Edit Profile</a></li>
                                        <li><a href="account_setting.php">Account Settings</a></li>
                                        <li class="divider"></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.nav-collapse -->
                    </div>
                </div>
                <!-- /navbar-inner -->
            </div>
            <!-- /navbar -->
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="span3">
                            <div class="sidebar">
                               <ul class="widget widget-menu unstyled">
<!--                                Including Dashboard Menu-->
                                    <?php include_once "menu.php" ?>
                                </ul>
                                <!--/.widget-nav-->


                                <ul class="widget widget-menu unstyled">
                                    <li><a href="#"><i class="menu-icon icon-bold"></i> Share Your Experience </a></li>
                                    <li><a href="#"><i class="menu-icon icon-book"></i>Add Blog Post </a></li>
                                    <li><a href="#"><i class="menu-icon icon-paste"></i>Suggest to admin </a></li>
                                </ul>
                                <!--/.widget-nav-->
                                <ul class="widget widget-menu unstyled">
                                    <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                            </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                            </i>More Pages </a>
                                        <ul id="togglePages" class="collapse unstyled">
                                            <li><a href=""><i class="icon-inbox"></i>Profile </a></li>
                                        </ul>
                                    </li>
                                    <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                                </ul>
                            </div>
                            <!--/.sidebar-->
                        </div>
                        <!--/.span3-->
                        <div class="span9">
                            <div class="content">
                                <div class="module">
                                    <div class="module-head">
                                        <h3>User Details</h3>
                                    </div>
                                    <div class="module-body">
                                    <?php if (isset($user) && !empty($user)) { ?>
        <td>
            <dl>
                <dt>User ID</dt>
                <dd>
                    <?php
                    if (array_key_exists('id', $user) && !empty($user['id'])) {

                        echo $user['user_id'];
                    } else {
                        echo "User Id Not set yet";
                    }
                    ?>
                </dd>

                <dt>Username</dt>
                <dd>
                    <?php
                    if (array_key_exists('username', $user) && !empty($user['username'])) {
                        echo $user ['username'];
                    } else {
                        echo "No Username available";
                    }
                    ?>
                </dd>
                <dt>Email</dt>
                <dd>
                    <?php
                    if (array_key_exists('email', $user) && !empty($user['email'])) {
                        echo $user ['email'];
                    } else {
                        echo "No Email available";
                    }
                    ?>
                </dd>
                <dt>Password</dt>
                <dd>
                    <?php
                    if (array_key_exists('password', $user) && !empty($user['password'])) {
                        echo $user ['password'];
                    } else {
                        echo "No Password available";
                    }
                    ?>
                </dd>

                <dt>Is Admin?</dt>
                <dd>
                    <?php if ($user['is_admin'] == 1) {
                        echo "YES";
                    } else {
                        echo "No";
                    }
                    ?>
                </dd>
                <dt>Created</dt>
                <dd>
                    <?php
                    if (array_key_exists('created', $user) && !empty($user['created'])) {
                        echo $user ['created'];
                    } else {
                        echo "No created date";
                    }
                    ?>
                </dd>
                <dt>Modified</dt>
                <dd>
                    <?php
                    if (array_key_exists('modified', $user) && !empty($user['modified'])) {
                        echo $user ['modified'];
                    } else {
                        echo "Not Modified yet";
                    }
                    ?>
                </dd>
                <dt>First Name</dt>
                <dd>
                    <?php
                    if (array_key_exists('first_name', $user) && !empty($user['first_name'])) {
                        echo $user ['first_name'];
                    } else {
                        echo "Not Modified yet";
                    }
                    ?>
                </dd>
                <dt>Mobile Number</dt>
                <dd>
                    <?php
                    if (array_key_exists('mobile_number', $user) && !empty($user['mobile_number'])) {
                        echo $user ['mobile_number'];
                    } else {
                        echo "No Mobile Number Exist";
                    }
                    ?>
                </dd>
                <dt>Address</dt>
                <dd>
                    <?php
                    if (array_key_exists('address', $user) && !empty($user['address'])) {
                        echo $user ['address'];
                    } else {
                        echo "Not Modified yet";
                    }
                    ?>
                </dd>
                <dt>Zip Code</dt>
                <dd>
                    <?php
                    if (array_key_exists('zip_code', $user) && !empty($user['zip_code'])) {
                        echo $user ['zip_code'];
                    } else {
                        echo "Not Modified yet";
                    }
                    ?>
                </dd>
                <dt>Zip Code</dt>
                <dd>
                    <?php
                    if (array_key_exists('city', $user) && !empty($user['city'])) {
                        echo $user ['city'];
                    } else {
                        echo "Not Modified yet";
                    }
                    ?>
                </dd>
                <dt>District</dt>
                <dd>
                    <?php
                    if (array_key_exists('district', $user) && !empty($user['district'])) {
                        echo $user ['district'];
                    } else {
                        echo "Not Modified yet";
                    }
                    ?>
                </dd>
                <dt>Profile Picture</dt>
                <dd>
                    <?php
                    if (array_key_exists('profile_picture', $user) && !empty($user['profile_picture'])) {
                        echo $user ['profile_picture'];
                    } else {
                        echo "Not Modified yet";
                    }
                    ?>
                </dd>

                    <a href="user_list.php">List</a> |
                    <a href="profile_edit.php?id=<?php echo $user['user_id'] ?>">Edit</a> |
                    <a href="src/Users/user_delete.php?id=<?php echo $user['user_id'] ?>">Delete</a>
                </dd>
            </dl>
        </td>
    <?php } else {
        echo "<p style='color:#ff4634'>" . " Opps ! Something Going Wrong ! Please try again later" . "</p>";
    } ?>
                                    </div>
                                </div>

                                <!--/.module-->
                            </div>
                            <!--/.content-->
                        </div>
                        <!--/.span9-->
                    </div>
                </div>
                <!--/.container-->
            </div>
            <!--/.wrapper-->
            <div class="footer">
                <div class="container">
                    <b class="copyright">&copy; 2015 Md. Abutaleb </b>All rights reserved.
                </div>
            </div>
            <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
            <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
            <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
            <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
            <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
            <script src="scripts/common.js" type="text/javascript"></script>

        </body>
    </html>
    <?php
} else {
    $_SESSION['invalid'] = "Access Denied ! Please login for continue";
    header('location:login.php');
}
?>