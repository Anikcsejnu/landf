<?php

session_start();
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['admin']);
session_destroy();
header('location:index.php');
