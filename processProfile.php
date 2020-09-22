<?php
	include 'checking.php';
	if(isset($_SESSION['userID']) ? $_SESSION['userID'] : null){
        $userID = $_SESSION['userID']; 
    }else{
        echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="login.php";</script>';
    }
    $con = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($con, 'fyp');


	$userid = $_POST['userid'];
	$currentPW = $_POST['currentPW'];
	$newPW = $_POST['newPW'];

	$sql = "SELECT * FROM student where Stud_ID = '$userid'";
	$res = mysqli_query($con, $sql);

	while($row = mysqli_fetch_assoc($res)){
		if($currentPW === $row['Stud_PW']){
			$sql2 = "UPDATE student SET Stud_PW='$newPW' WHERE Stud_ID='$userid'";
			mysqli_query($con, $sql2);
			header('Location: editprofile.php?success=1');
		}
		else if (strpos($row['Stud_PW'], $currentPW) === false){
			header('Location: editprofile.php?error=1');
		}
	}
?>