<?php
	$con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');

	if(isset($_POST['Clear'])){
		$insert = "DELETE FROM notes";
		mysqli_query($con, $insert);
		echo '<script language="javascript">alert("Requests successfully cleared!"); window.location.href="subjects.php";</script>';
	}
?>