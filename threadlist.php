<?php 
include 'partials/db.php';
include 'partials/header.php';

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>uDiscuss - Coding Forum</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
</head>
<body>

	<div class="container my-2">
<?php 





// Fetching Categories to display on ThreadListing Page

$id=$_GET['catid'];
$category = "SELECT * FROM category WHERE category_id='$id' ";
$result = mysqli_query($conn,$category);

while($row = mysqli_fetch_assoc($result)){
	$catname = $row['category_name'];
	$catdesc = $row['category_description'];

	echo '<div class="jumbotron container my-2">
  <h1 class="display-4">Forum for '.$catname.'</h1>
  <p class="lead">'.$catdesc.'</p>
  <hr class="my-4">
</div>';

		
}

?></div>

 <!-- Adding Question to DB  -->

<div class="container">
	<?php
	

	if($_SERVER['REQUEST_METHOD']=="POST"){
	
				$title = htmlspecialchars($_POST['title']);
				$problem = htmlspecialchars($_POST['problem']);
				$userId=$_SESSION['userId'];

				$addQue = "INSERT INTO thread(thread_title, thread_description,
				thread_cat_id,thread_user_id) VALUES('$title','$problem',$id,'$userId') ";
				$resAddQue = mysqli_query($conn,$addQue);

				if($resAddQue){
					$showAlert="Added";
				}else{
					$showErr="Failed";
				}

			}
		

 ?>

<?php  if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin']==true)){

				echo '<!-- Question Form -->
				 <!-- Starts here -->
					<h3 class="text-center my-3">Post a Question</h3>
					<form method="post" action="threadlist.php?catid='.$id.'">
				  <div class="mb-3">
				    <label for="title" class="form-label">Question Title</label>
				    <input type="text" class="form-control" id="queTitle" name="title" required>
				    <!-- <div id="emailHelp" class="form-text">Keep you title as crisp as possible</div> -->
				  </div>
				  <div class="mb-3">
				    <label for="problem" class="form-label">Elaborate your concern</label>
				    <textarea class="form-control" id="queDesc" name="problem" ></textarea>
				  </div>
				  <button type="submit"  class="btn btn-success">Post Question</button>
				</form>
				</div>';	
}else{

			echo "Login to post a question to this forum";
}


?>


<!-- Displaying Threads from DB -->

<div class="container">
<h2 class="text-center my-5">Browse Threads</h2>

<?php

$threadlist ="SELECT * FROM thread WHERE thread_cat_id='$id'";
$result = mysqli_query($conn, $threadlist);
while($roww=mysqli_fetch_assoc($result)){
	$threadId = $roww['thread_id'];
	$threadTitle = $roww['thread_title'];
	$threadDesc = $roww['thread_description'];
	$threadUserId = $roww['thread_user_id'];
			$threadUser = "SELECT * FROM users WHERE user_id='$threadUserId'";
			$threadUserRx= mysqli_query($conn,$threadUser);
			$userR = mysqli_fetch_assoc($threadUserRx);


	echo '<div class="media my2">
  <img src="img/default_user.png" width="30px" class="mr-3" alt="...">
  <div class="media-body">
  	<p>'.$userR['name'].'</p>
    <h5 class="mt-2"><a href="threads.php?threadid='.$threadId.'">'.$threadTitle.'</a></h5>
    <p>'.$threadDesc.'</p>
  </div>
</div>';
}

 ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>