<?php 
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');
	
	if(isset($_POST['Add'])){
		$studID = $_POST['studid'];
		$status = $_POST['status'];

		$sql = "INSERT INTO student (Stud_ID, Stud_Name, Stud_Status) VALUES ('$studID', '$studName', '$status')";
		mysqli_query($con, $sql);
		header('Location: manageUsers.php');
	}

	if(isset($_POST['Del'])){
		$studID = $_POST['studid'];
		$status = $_POST['status'];

		$sql = "DELETE from student WHERE Stud_ID='$studID'";

		mysqli_query($con, $sql);
		header('Location: manageUsers.php');
	}

	if(isset($_POST['Edit'])){
		$studID = $_POST['studid'];
		$status = $_POST['status'];

		$sql = "UPDATE student SET Stud_Status='$status' WHERE Stud_ID= '$studID' ";
		mysqli_query($con, $sql);
		header('Location: manageUsers.php');
	}
	
?>