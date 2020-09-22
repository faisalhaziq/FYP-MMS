<?php 
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');

	if(isset($_POST['Add'])){
		$subName = strtoupper($_POST['name']);
		$subID = $_POST['id'];

		$sqlExist = "SELECT * FROM subject WHERE Sub_ID = '$subID' ";
		$result = mysqli_query($con, $sqlExist);
		$checking = mysqli_num_rows($result);
		if($checking == 1){
			header('Location: subjects.php?failed=1');
		}else{
			$sql = "INSERT INTO subject (Sub_ID, Sub_Name) VALUES ('$subID', '$subName')";
			mysqli_query($con, $sql);
			header('Location: subjects.php?added=1');
		}
	}

	if(isset($_POST['Del'])){
		$id = $_POST['id'];

		$sql = "DELETE from subject WHERE ID='$id'";

		mysqli_query($con, $sql);
		header('Location: subjects.php?delete=1');
	}

	if(isset($_POST['Edit'])){
		$id = $_POST['id'];
		$subName = strtoupper($_POST['name']);
		$subID = $_POST['sub_id'];

		$sql = "UPDATE subject SET Sub_Name='$subName', Sub_ID='$subID' WHERE ID= '$id'";
		mysqli_query($con, $sql);
		header('Location: subjects.php?edited=1');
	}
	
?>