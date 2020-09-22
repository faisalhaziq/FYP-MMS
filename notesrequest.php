<?php
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');

	if(isset($_POST['request'])){
		$subID = $_POST['subID'];
		$subName = $_POST['subName'];

		$sql = "INSERT INTO notes (Sub_ID, Sub_Name) VALUES ('$subID', '$subName')";
		mysqli_query($con, $sql);
		echo '<script language="javascript">alert("Subject Requested! Notes will be uploaded soon."); window.location.href="notes.php";</script>';
	}
?>