<?php

include_once "connectDB.php";
	$ma = $_GET['ma'];
	$q = "DELETE FROM `data` WHERE ma=$ma " ;
	mysqli_query($con,$q);
	header('location:Home.php');
 ?>