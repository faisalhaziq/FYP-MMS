<?php 
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');

	if(isset($_POST['Assign'])){
		$studID = $_POST['id'];
		$mentorID = $_POST['mentorid'];
		$sqlquery = "SELECT Mentor_Name FROM mentor where Mentor_ID='$mentorID'";
		$res = mysqli_query($con, $sqlquery);

		while ($row=mysqli_fetch_assoc($res)){
			$sql = "UPDATE mentorshipapp SET Mentor_Name='".$row['Mentor_Name']."' WHERE Stud_ID='$studID'";
			mysqli_query($con, $sql);

			$sqlquery2 = "SELECT Stud_Name FROM mentorshipapp where Stud_ID='$studID'";
			$res2 = mysqli_query($con, $sqlquery2);
			while($row2=mysqli_fetch_assoc($res2)){
				$sql2 = "UPDATE mentor SET Mentee_Name='".$row2['Stud_Name']."' WHERE Mentor_ID='$mentorID'";
				mysqli_query($con, $sql2);

				$sql3 = "UPDATE student SET Mentor_Name='".$row['Mentor_Name']."' WHERE Stud_ID='$studID'";
				mysqli_query($con, $sql3);

			}
		}
		
		header('Location: manageApps.php');
	}
	if (isset($_POST['Delete'])){
		$appid = $_POST['id'];
		$sqlquery2 = "DELETE FROM mentorshipapp where App_ID='$appid'";
		$res = mysqli_query($con, $sqlquery2);
		header('Location: manageApps.php');
	}
?>