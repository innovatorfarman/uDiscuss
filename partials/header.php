<?php 

  session_start();
  if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==true){
    $loggedIn = true;
  }else{
    $loggedIn=false;
  }

echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/udiscuss">uDiscusss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/uDiscuss">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
          $category ="SELECT * FROM category";
          $result = mysqli_query($conn, $category);
          while($row = mysqli_fetch_assoc($result)){

            echo '<li><a class="dropdown-item" href="#">'.$row['category_name'].'</a></li>';
          }
            
          echo '</ul>
        </li>
      </ul>

          <form class="d-flex">
        <input class="form-control m-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success mr-2" type="submit">Search</button>';

        if(!$loggedIn){

        echo '<button type="button" class="btn btn-success ml-2" data-bs-toggle="modal" data-bs-target="#loginModal">
          Login
        </button>
        <button type="button" class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">
          Signup
        </button>';
        }
        else{
          // echo '<p class="text-dark">Welcome, '.$_SESSION['name'].'</p>';
          echo '<a href="/udiscuss/auth/logout.php"><button type="button" class="btn btn-danger mx-2">
          Logout
        </button></a>';
        }


      echo '</form>
    </div>
  </div>
</nav>';

include 'partials/login_modal.php';
include 'partials/signup_modal.php';





?>