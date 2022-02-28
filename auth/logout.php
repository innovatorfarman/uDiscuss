<?php

 include '../partials/db.php';
 session_start();

 if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin']!=true){
 	echo "You are not logged in. Will be redirected to login page";
 }else{
 	session_unset();
 	session_destroy();

 	echo "You are logged out now.<a href='/udiscuss/auth/login.php'>Login Now</> ";
    header('location: /udiscuss/');
 }


 ?>