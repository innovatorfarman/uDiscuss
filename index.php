<?php 

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

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/slider-1.jpg" width="1900px" height="500px" class="d-block w-100" alt="Image">
    </div>
    <div class="carousel-item">
      <img src="img/slider-2.jpg" width="1900px" height="500px" class="d-block w-100" alt="Image">
    </div>
    <div class="carousel-item">
      <img src="img/slider-3.jpg" width="1900px" height="500px" class="d-block w-100" alt="Image">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<h1 class="text-center my-4">Browse Categories</h1>
<div class="container">
<div class="row">

	<?php
	 include 'partials/db.php';
	 $category = "SELECT * FROM category";
	$result = mysqli_query($conn, $category);
	while($row = mysqli_fetch_assoc($result)){

		$cat_name = $row['category_name'];
		$cat_id = $row['category_id'];
		$cat_desc = $row['category_description'];

		echo '<div class="col-md-4 my-2 ">
		<div class="card" style="width: 18rem;">
  <img src="https://source.unsplash.com/1600x900/?'.$cat_name.',coding" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">'.$cat_name.'</h5>
    <p class="card-text">'.substr($cat_desc,0,50).'Some quick example text to build on the card title and make up the bulk of the cas content.</p>
    <a href="threadlist.php?catid='.$cat_id.'" class="btn btn-primary">View Threads</a>
  </div>
</div>
	</div>';

	}

	 ?>
	
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	

	

</body>
</html>