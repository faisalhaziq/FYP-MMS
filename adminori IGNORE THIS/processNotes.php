<?php
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');

	$id = $_POST['id'];
	$file = $_FILES['file'];
	$notes = $_FILES['file']['name'];
	move_uploaded_file($file["tmp_name"],"../subjectnotes/" . $file["name"]);
	$location = "subjectnotes/$notes";

	
	if(isset($_POST['Add'])){
		$insert = "UPDATE subject SET notes='".$notes."',  pathname='$location' where ID = '$id'";
		mysqli_query($con, $insert);
		$del = "DELETE FROM notes WHERE Sub_ID='$id'";
		mysqli_query($con, $del);
		echo '<script language="javascript">alert("Notes successfully uploaded!"); window.location.href="manageNotes.php";</script>';
	}
	if(isset($_POST['Del'])){
		$insert = "UPDATE subject SET notes='',  pathname='' where ID = '$id'";
		mysqli_query($con, $insert);
		echo '<script language="javascript">alert("Notes successfully deleted!"); window.location.href="manageNotes.php";</script>';
	}
?>