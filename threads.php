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

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	
</head>
<body> <div class="container my-2">

	<!-- Displaying the Thread(question) -->
<?php

	

	$id = $_GET['threadid'];

		$thread = "SELECT * FROM thread WHERE thread_id='$id' ";
		$result = mysqli_query($conn, $thread);
		$row = mysqli_fetch_assoc($result);

		$threadTitle = $row['thread_title'];
		$threadDesc = $row['thread_description'];
		$thread_user_id =$row['thread_user_id'];

		$userSql = "SELECT * FROM users WHERE user_id='$thread_user_id' ";
		$resultUser = mysqli_query($conn, $userSql);
		$userRow = mysqli_fetch_assoc($resultUser);
		$postedBy = $userRow['name'];

		echo'<div class="card">
    <div class="card-body">
    <h5 class="card-title">'.$threadTitle.'</h5>
    <p class="card-text">'.$threadDesc.'</p>
    <p><em>Posted by: '.$postedBy.' </em></p>
  </div>
</div>';

 ?></div>



 	 

 <!-- Submitting form data to DB -->
<?php 

if($_SERVER['REQUEST_METHOD']=="POST"){

	$comment =htmlspecialchars($_POST['comment']);
	$cUser =$_SESSION['userId'];
	$commentSql = "INSERT INTO comment(comment, comment_thread_id,comment_user_id) VALUES('$comment','$id','$cUser') ";
	$resComment = mysqli_query($conn, $commentSql);
	if($resComment){
		$showAlert="Comment added successfully";
	}else{
		$showErr ="Failed to add";
	}

}


?>

<!-- Displaying Discussion ( comments) -->

 <div class="container">
 	<h2 class="text-center my-4">Discussions</h2>
 <?php

		$commentSql= "SELECT * FROM comment WHERE comment_thread_id='$id' ";
		$commentResult = mysqli_query($conn, $commentSql);
		 $noResult = true;
		 
		while($row = mysqli_fetch_assoc($commentResult)){
							$noResult=false;

							$commentDisplay = $row['comment'];
							$commentUserId = $row['comment_user_id'];
								$commentUser = "SELECT * FROM users WHERE user_id='$commentUserId' ";
								$resultCommentUser =mysqli_query($conn, $commentUser);
								$uRow = mysqli_fetch_assoc($resultCommentUser);
								$commentPostedBy = $uRow['name'];

							echo'<div class="card">
					   		 <div class="card-body">
					   				 <h6 class="card-title">'.$commentPostedBy.'</h6>
					   				 <p class="card-text">'.$commentDisplay.'</p>
					  		</div>
						</div><br>';


		}
		if($noResult){
			echo '<p class="card-text">Be the first to comment</p>';
		}


 ?>

<?php 
// <!-- Displaying Form to add Comments -->

if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']==true){

 echo '
 	 <div class="container">
	 	 	<h3 class="text-center my-3">Post a Comment</h3>
			<form method="post" action="threads.php?threadid='.$id.'">
	  
			 	 <div class="mb-3">
			    <label for="problem" class="form-label">Enter your comment</label>
			    <textarea class="form-control" id="queDesc" name="comment" ></textarea>
			  </div>
	  <button type="submit"  class="btn btn-success">Post Comment</button>
			</form>
	 	 </div>
 </div>';

}else{
	echo '<br><p>Please login to post a comment</p>';
}

 ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>
</html>