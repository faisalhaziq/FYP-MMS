<?php
	include 'checking.php';
    $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');

	$userid = $_POST['userid'];
	$newPW = $_POST['newPW'];
	$conPW = $_POST['conPW'];
	$sql = "SELECT * FROM student where Stud_ID = '$userid'";
	$res = mysqli_query($con, $sql);
	if ($conPW!==$newPW){
		echo '<script language="javascript">alert("Error! Passwords do not match!"); window.location.href="changePassword.php?ID='.$userid.'";</script>';
	}else{
		while($row = mysqli_fetch_assoc($res)){
		$sql2 = "UPDATE student SET Stud_PW='$newPW' WHERE Stud_ID='$userid'";
		mysqli_query($con, $sql2);
		echo '<script language="javascript">alert("Password has been changed! Login with your new password!"); window.location.href="login.php";</script>';
	}
	}
	
?>