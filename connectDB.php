<?php
	// $con = mysqli_connect('localhost', 'root');
	// mysqli_select_db($con,'danh_ba');
	// $con->set_charset("utf8");
	// if($con) {
	// 	// echo 'Connect susscess';
	// }
	// else {
	// 	echo 'Not Connect';
	// }


	$con = new mysqli("localhost", "root", "", "Bookmanager", "3306");
	$con->set_charset("utf8");
	if ($con->connect_error) {
		die("ket noi that bai. chi tiet" . $con->connect_error);
	}
	return $con;
 ?>