<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');

	$userid = $_POST['userID'];
	$pass = $_POST['pw'];

	$s = "select * from student where Stud_ID = '$userid' && Stud_PW = '$pass' ";
	$result = mysqli_query($con, $s);
	$num = mysqli_num_rows($result);
	
	if($num == 1)
	{
		$_SESSION['userID'] = $userid;
		$_SESSION['login'] = "1";
		echo '<script language="javascript">alert("Login Success! Welcome back, '.$userid.'!"); setTimeout(window.location.href="index.php",2000);</script>';
	}
	else{
		$_SESSION['login'] = "";
		echo '<script language="javascript">alert("Login Error!"); window.location.href="login.php";</script>';
	}
?>