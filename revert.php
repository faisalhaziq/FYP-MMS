<?php
	$con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');

	if(isset($_POST['request'])){
		$userID = $_POST['userid'];
		$sql = "UPDATE student SET Stud_Status = 'Mentee' WHERE Stud_ID = '$userID'";
		mysqli_query($con, $sql);
		$sql2 = "DELETE from mentor WHERE Mentor_ID='$userID'";
		mysqli_query($con, $sql2);
		echo '<script language="javascript">alert("Student Status successfully reverted."); window.location.href="profile.php";</script>';
	}
?>