<?php

session_start();

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'fyp');

$userid = $_POST['userID'];
$fullname = $_POST['fname'];
$pass = $_POST['pw'];
$conpass = $_POST['conpw'];
$s = "select * from student where Stud_ID = '$userid'";
$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);
if($num == 1)
{
	echo '<script language="javascript">alert("ID has already been registered!"); window.location.href="login.php";</script>';
}
else{
	if($conpass!==$pass){
		echo '<script language="javascript">alert("Passwords do not match!"); window.location.href="login.php";</script>';
	}else{
		$reg = "insert into student(Stud_ID, Stud_Name, Stud_PW) values ('$userid', '$fullname', '$pass')";
	mysqli_query($con, $reg);
	echo '<script language="javascript">alert("Successfully Registered!\nPlease login with your credentials..."); window.location.href="login.php";</script>';
	}
}
?>