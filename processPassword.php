<?php
	include 'checking.php';
    $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');

	$userid = $_POST['userid'];
	$currentPW = $_POST['currentPW'];
	$newPW = $_POST['newPW'];

	$sql = "SELECT * FROM student where Stud_ID = '$userid'";
	$res = mysqli_query($con, $sql);

	while($row = mysqli_fetch_assoc($res)){
		if($currentPW === $row['Stud_PW'] ){
			$sql2 = "UPDATE student SET Stud_PW='$newPW' WHERE Stud_ID='$userid'";
			mysqli_query($con, $sql2);
			echo '<script language="javascript">alert("Password changed!\nPlease login with your new password..."); window.location.href="login.php";</script>';
		}
		else{
			echo '<script language="javascript">alert("Error! Are you sure that password is correct?"); window.location.href="forgotPass.php";</script>';
		}
	}
?>