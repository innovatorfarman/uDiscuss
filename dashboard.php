<?php 

  session_start();
  if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==true){
    $loggedIn = true;
  }else{
    $loggedIn=false;
  }
include "partials/header.php";

if(!$loggedIn){
    header("location: /");
}


if($loggedIn){
echo '<p class="text-dark">Welcome, '.$_SESSION['name'].'</p>';
}

include "partials/footer.php";


?>