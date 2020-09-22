<?php
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');
	
	if(isset($_POST['Add'])){
		$id = $_POST['id'];
		$file = $_FILES['file'];
		$notes = $_FILES['file']['name'];
		move_uploaded_file($file["tmp_name"],"../subjectnotes/" . $file["name"]);
		$location = "subjectnotes/$notes";
		$insert = "UPDATE subject SET notes='".$notes."',  pathname='$location' where ID = '$id'";
		mysqli_query($con, $insert);
		$del = "DELETE FROM notes WHERE Sub_ID='$id'";
		mysqli_query($con, $del);
		header('Location: notes.php?uploaded=1');
	}

	if(isset($_POST['Del'])){
		$id = $_POST['id'];
		$insert = "UPDATE subject SET notes='',  pathname='' where ID = '$id'";
		mysqli_query($con, $insert);
		header('Location: notes.php?deleted=1');
	}
?>