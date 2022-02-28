<?php

if($_SERVER['REQUEST_METHOD']=="POST"){

         include '../partials/db.php';
         $name=htmlspecialchars($_POST['name']);
         $email=htmlspecialchars($_POST['email']);
         $password=htmlspecialchars($_POST['password']);
         $hash=password_hash($password, PASSWORD_DEFAULT);


         $registerUser = "INSERT INTO users(name,email,password) VALUES('$name','$email','$hash')";
         $resSignup = mysqli_query($conn,$registerUser);

        if($resSignup){
            echo "Success";
            header("location: ../index.php")
        }else{
            echo "Failed to signup";
        }
}

 ?>