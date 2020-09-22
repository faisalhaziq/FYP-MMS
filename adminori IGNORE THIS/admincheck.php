<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');
	
	$adminUser = isset($_POST['adminUser']) ? $_POST['adminUser'] : null;
	$pass= isset($_POST['pw']) ? $_POST['pw'] : null;
	
	if(isset($_SESSION['adminUser']) ? $_SESSION['adminUser'] : null){
		$_SESSION['login'] = "1";
		$_SESSION['message'] = "Welcome,  <b>$_SESSION[adminUser]<b>!";	
	}else{
	$_SESSION['login'] = '';
	header("Refresh:1; url=index.php");
	}
?>