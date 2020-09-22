<?php 
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');

	if(isset($_POST['Add'])){
		$id = $_POST['id'];
		$subName = $_POST['name'];
		$subID = $_POST['subid'];

		$sql = "INSERT INTO subject (Sub_ID, Sub_Name) VALUES ('$subID', '$subName')";
		mysqli_query($con, $sql);
		header('Location: manageSubjects.php');
	}

	if(isset($_POST['Del'])){
		$id = $_POST['id'];
		$subName = $_POST['name'];
		$subID = $_POST['subid'];

		$sql = "DELETE from subject WHERE id='$id'";

		mysqli_query($con, $sql);
		header('Location: manageSubjects.php');
	}

	if(isset($_POST['Edit'])){
		$id = $_POST['id'];
		$subName = $_POST['name'];
		$subID = $_POST['subid'];

		$sql = "UPDATE subject SET Sub_Name='$subName', Sub_ID='$subID' WHERE ID= '$id'";
		mysqli_query($con, $sql);
		header('Location: manageSubjects.php');
	}
	
?>