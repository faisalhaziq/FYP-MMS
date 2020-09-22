<?php
	include 'checking.php';
	if(isset($_SESSION['userID']) ? $_SESSION['userID'] : null){
        $userID = $_SESSION['userID']; 
    }else{
        echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="login.php";</script>';
    }
    $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');


	$userid = $_POST['userid'];
	$file = $_FILES['file'];
	$images = $_FILES['file']['name'];
	move_uploaded_file($file["tmp_name"],"profilepics/".$userid."_". $file["name"]);

	$location = "".$userid."_".$images."";
	$insert = "UPDATE student SET image='".$location."' where Stud_ID = '$userid'";
	
	mysqli_query($con, $insert);
	echo '<script language="javascript">alert("Success! Profile Picture added!"); window.location.href="profile.php";</script>';
?>