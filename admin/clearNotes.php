<?php
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');

	if(isset($_POST['Clear'])){
		$insert = "DELETE FROM notes";
		mysqli_query($con, $insert);
		echo '<script language="javascript">alert("Requests successfully cleared!"); window.location.href="subjects.php";</script>';
	}
?>