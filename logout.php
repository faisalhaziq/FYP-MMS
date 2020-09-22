<?php
	session_start();
	unset($_SESSION['userID']);
	echo '<script language="javascript">alert("Logged Out Successfully!\nThank you for using MMS!"); window.location.href="index.php";</script>';
?>