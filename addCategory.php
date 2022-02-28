<?php 
$showAlert = "";
$showErr = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
include 'partials/db.php';

$catName = $_POST['category_name'];
$catDesc = $_POST['category_desc'];
$addCategory = "INSERT INTO category(category_name,category_description) VALUES('$catName', '$catDesc') ";
$result = mysqli_query($conn, $addCategory);

if($result){
	$showAlert = "Category Addedd Successfully!";
}else{
	$showErr = "Failed to add Category";
}

}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>uDiscuss - Coding Forum</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<?php

include 'partials/header.php';

?>

	<center><h2>Add Category</h2></center>

	<?php if($showAlert){
		echo '<div class="alert alert-success" role="alert">'.$showAlert.'</div>';
	}

	?>

	<?php if($showErr){
		echo '<div class="alert alert-danger" role="alert">'.$showErr.'</div>';
	}


	?> 
	<form style="width:50%; margin:auto;" action="addCategory.php" method="post">
  <div class="mb-3">
    <label for="category_name" class="form-label">Category Name</label>
    <input type="text" class="form-control" id="category_name" name="category_name"  aria-describedby="emailHelp" required>
    </div>

  <div class="mb-3">
    <label for="category_desc" class="form-label">Category Description</label>
    <textarea row="4" column="200" class="form-control" id="category_desc" name="category_desc">
  </textarea></div>

  <div class="mb-3">    
  <button type="submit" class="btn btn-primary">Add Category</button></div>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>
</html>