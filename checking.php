<?php
	session_start();
	$con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');
	
	$userid = isset($_POST['userID']) ? $_POST['userID'] : null;
	$pass= isset($_POST['pw']) ? $_POST['pw'] : null;
	
	if(isset($_SESSION['userID']) ? $_SESSION['userID'] : null){
		$_SESSION['login'] = "1";
		$_SESSION['message'] = "Logged in as <b>$_SESSION[userID]<b>!";	
	}else{
		$_SESSION['login'] = '';
		$_SESSION['message'] =  "<b>Login to view other pages</b>";
	}
?>