<?php
	session_start();
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');

	$adminUser = $_POST['adminUser'];
	$pass = $_POST['pw'];

	$s = "select * from admin where Admin_Username = '$adminUser' && Admin_PW = '$pass' ";
	$result = mysqli_query($con, $s);
	$num = mysqli_num_rows($result);
	
	if($num == 1)
	{
		$_SESSION['adminUser'] = $adminUser;
		$_SESSION['login'] = "1";
		$_SESSION['message'] = "Welcome back, <b>$adminUser! </b> <br>Redirecting to dashboard...";
		header("Refresh:1; url=admindashboard.php");
	}
	else{
		$_SESSION['message'] = "<b>Uh oh! Did you type that correctly? </b> <br>Returning to login...";
		$_SESSION['login'] = "";
		header("Refresh:1; url=adminlogin.php");
	}
?>
<html>
<head>
	<title> Admin Validation</title>
	<link rel="stylesheet" href="../css/adminvalidation.css">
</head>
<body>
	<div class = "top">
	<nav>
		<img src="../images/adminlogo.png" class="logo">
	</nav>
		<hr>
		<div class = "form">
			<div class = "error_msg">
			<?= $_SESSION['message'] ?>
			</div>
		</div>
	</div>
	<div class="footer">
<p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
</body>
</html>