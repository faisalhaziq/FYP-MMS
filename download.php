<?php
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');

	if (isset($_GET['dow'])){
		$path = $_GET['dow'];
		$res = mysqli_query("SELECT * FROM mentorapp WHERE (`path`) = '$path'");
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename"'.basename($path).'"');
		header('Content-Length: '. filesize($path));
		readfile($path);

	}
?>
