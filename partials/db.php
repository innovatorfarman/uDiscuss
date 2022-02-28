<?php 

$server = "localhost";
$username ="root";
$password = "";
$dbname ="udiscuss";


$conn = mysqli_connect($server,$username,$password, $dbname);
if(!$conn){
	die("Failed to connect to database".mysqli_connect_error($conn));
}


?>