<?php
	session_start();
	if (!(isset($_SESSION['userID']) && $_SESSION['userID'] != '')) {

	echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="login.php";</script>';
	}
	$con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');
	$studID = $_POST['studID'];
	$fullname = $_POST['fName'];
	$subject = $_POST['subject'];
    $file = $_FILES['file'];
    $cgpa = $_FILES['file']['name'];
	move_uploaded_file($file["tmp_name"],"admin/transcripts/".$studID."_". $file["name"]);
	$location = "admin/transcripts/".$studID."_$cgpa";

	$insert = "insert into mentorapp(Stud_ID, Stud_Name, Sub_Name, CGPA, path) values ('$studID', '$fullname', '$subject', '".$cgpa."', '$location')";
	mysqli_query($con, $insert);
	echo '<script language="javascript">alert("Application Success, '.$fullname.' \nYour application will be reviewed in 1-2 days."); window.location.href="apply.php";</script>';
?>