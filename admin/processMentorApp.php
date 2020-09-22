<?php 
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');

	if(isset($_POST['Accept'])){
		$studID = $_GET['ID'];
		$sqlquery = "SELECT * FROM mentorapp where Stud_ID='$studID'";
		$res = mysqli_query($con, $sqlquery);

		while ($row=mysqli_fetch_assoc($res)){
			$sql = "INSERT INTO mentor (Mentor_ID, Mentor_Name, Sub_Name) VALUES ('$studID', '".$row['Stud_Name']."', '".$row['Sub_Name']."')";
			mysqli_query($con, $sql);
			$sql2 = "DELETE from mentorapp where Stud_ID='$studID'";
			mysqli_query($con, $sql2);
			$sql3 = "UPDATE student SET Stud_Status='Mentor' where Stud_ID='$studID'";
			mysqli_query($con, $sql3);
		}
		
		header('Location: applications.php');
	}

	if(isset($_POST['Deny'])){
		$studID = $_GET['ID'];
		$sql = "DELETE from mentorapp WHERE Stud_ID='$studID'";
		mysqli_query($con, $sql);
		header('Location: applications.php');
	}
?>