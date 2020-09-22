<?php 
	$con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');

	if(isset($_POST['Done'])){
		$mentorID = $_POST['mentorID'];
		$sql = "UPDATE mentor SET Mentee_Name='NONE' where Mentor_ID='$mentorID'";
		mysqli_query($con, $sql);
		$sqlquery = "SELECT Mentor_Name FROM mentorshipapp";
		$res = mysqli_query($con, $sqlquery);
		while($row=mysqli_fetch_assoc($res)){
			$sql2 = "UPDATE mentorshipapp SET Mentor_Name='NONE' where Mentor_Name='".$row['Mentor_Name']."'";
			mysqli_query($con, $sql2);
			$sql3 = "UPDATE student SET Mentor_Name=NULL where Mentor_Name='".$row['Mentor_Name']."'";
			mysqli_query($con, $sql3);
			
		}
		
		header('Location: manageMentors.php');
	}
	
?>