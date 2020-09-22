<?php
	session_start();
	if (!(isset($_SESSION['adminUser']) && $_SESSION['adminUser'] != '')) {

	header ("Location: adminlogin.php");
	}
	$con = NEW MySQLi('localhost', 'root', '','fyp');
	$resultSet = $con->query("SELECT Stud_ID FROM student");
	include 'processUsers.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Admin - Manage Users
	</title>
	<link rel="stylesheet" type="text/css" href="../css/fontawesome-free-5.14.0-web/css/all.css">
	<link rel="stylesheet" href="../css/manage.css">
</head>
<body>
	<div class = "top">
	<nav>
		<a href="admindashboard.php"><img src="../images/adminlogo.png" class="logo"></a>
	</nav>
		<hr>
	</div>
	<div class="tableContainer">
		<?php
			$con = mysqli_connect('localhost', 'root', '');
			mysqli_select_db($con, 'fyp');
			$s = "SELECT ID, Stud_ID, Stud_Name, Stud_Status FROM `student` WHERE 1";
			$result = mysqli_query($con, $s);
			echo "<table class='userTable' style='width:900px;'>";
			echo "<tr>";
			echo "<th colspan='3' id='tableTitle'>"; echo "Users List";	echo "</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<th colspan='3'>"; echo "<p id='response'></p>";	echo "</th>";
			echo "</tr>";
			echo "<tr>";
				echo "<th>"; echo "Student ID";	echo "</th>";
				echo "<th>"; echo "Student Name";  echo "</th>";
				echo "<th>"; echo "Student Status";  echo "</th>";
			echo "</tr>";
			while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr>";
					echo "<td><b>"; echo $row['Stud_ID']; echo "</b></td>";
					echo "<td id='name'>"; echo $row['Stud_Name']; echo "</td>";
					echo "<td><b>"; echo $row['Stud_Status']; echo "</b></td>";
					echo "</tr>";
				}
			echo "</table>";
		?>
	</div>
	<div class="footer">
<p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
<script type="text/javascript">
	function edit(){
		alert("Student Status successfully changed!")
	}
	function del(){
		alert("Student successfully deleted!")
	}
</script>
</body>
</html>