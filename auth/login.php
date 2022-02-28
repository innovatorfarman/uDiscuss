<?php

 if($_SERVER['REQUEST_METHOD']=="POST"){

     $showAlert='';
     $showErr='';

include '../partials/db.php';
 $email=htmlspecialchars($_POST['email']);
 $password=htmlspecialchars($_POST['password']);

     $loginUser = "SELECT * FROM users WHERE email='$email'";
     $resLoginUser = mysqli_query($conn,$loginUser);
     $row=mysqli_num_rows($resLoginUser);

     if($row>0){

         $user = mysqli_fetch_assoc($resLoginUser);
         if(password_verify($password, $user['password'])){
            session_start();
            $_SESSION['isLogin']=true;
            $_SESSION['name'] = $user['name'];
            $_SESSION['userId'] =$user['user_id'];
            $showAlert="You are logged in successfully";
            header("location: ../index.php");
         }
         else{
            $showErr= "Your password is incorrect";
         }
     }
    else{
        $showErr="It seems like you have not created account yet. Create an account here";
    }

 }


 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

 </head>
 <body>
 
 <div class="container my-2">
    <h2>Login to uDiscuss</h2>

 <form method="post" action="/udiscuss/auth/login.php">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">We Will never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-success">Login</button>
</form>
</div>
 </body>
 </html>