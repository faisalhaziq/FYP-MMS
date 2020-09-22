<?php
	session_start();
	if (!(isset($_SESSION['userID']) && $_SESSION['userID'] != '')) {

	echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="login.php";</script>';
	}
	$con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');

	$fullname = $_POST['fName'];
	$userid = $_POST['userID'];
	$subject = $_POST['subject'];

	$insert = "insert into mentorshipapp(Stud_Name, Stud_ID, Sub_Name) values ('$fullname', '$userid', '$subject')";
	mysqli_query($con, $insert);
	echo '<script language="javascript">alert("Application Success, '.$fullname.' \nA mentor will be assigned to you in 1-2 days."); window.location.href="apply.php";</script>';
?>