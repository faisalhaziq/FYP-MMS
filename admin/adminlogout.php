<?php
	session_start();
	unset($_SESSION['adminUser']);
	header("Location: adminlogin.php");
?>