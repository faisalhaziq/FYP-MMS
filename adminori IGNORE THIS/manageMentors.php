<?php
	session_start();
	if (!(isset($_SESSION['adminUser']) && $_SESSION['adminUser'] != '')) {

	header ("Location: adminlogin.php");
	}
	$con = NEW MySQLi('localhost', 'root', '','fyp');
	$resultSet = $con->query("SELECT Mentor_ID FROM mentor");
	include 'processUsers.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Admin - Manage Mentors
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
			$s = "SELECT Mentor_ID, Mentor_Name, Sub_Name, Mentee_Name FROM `mentor`";
			$result = mysqli_query($con, $s);
			echo "<table class='userTable' style='width:900px;'>";
				echo "<tr>";
				echo "<th colspan='4' id='tableTitle'>"; echo "Mentors List";	echo "</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<th>"; echo "Mentor ID";	echo "</th>";
				echo "<th>"; echo "Mentor Name";  echo "</th>";
				echo "<th>"; echo "Subject";  echo "</th>";
				echo "<th>"; echo "Currently Mentoring";  echo "</th>";
				echo "</tr>";
		if(mysqli_num_rows($result)==0){
				echo "<tr>";
				echo "<td><b>NULL</b></td>";
				echo "<td id='name'>NULL</td>";
				echo "<td>NULL</td>";
				echo "<td>NULL</td>";
				echo "</tr>";
				echo "</table>";
			}
		else{
			while($row=mysqli_fetch_assoc($result))
				{
						echo "<tr>";
						echo "<td><b>"; echo $row['Mentor_ID']; echo "</b></td>";
						echo "<td id='name'>"; echo $row['Mentor_Name']; echo "</td>";
						echo "<td><b>"; echo $row['Sub_Name']; echo "</b></td>";
						echo "<td><b>"; echo $row['Mentee_Name']; echo "</b></td>";
						echo "</tr>";
				}
				echo "</table>";
		}
				
		?>
	</div>
	<div class="formContainer">
		<form method="POST" action="processMentors.php" class="updateForm">
			<div class="formgroup">
				<div class="txt">
                <h3 align=center><i class="fas fa-pencil-ruler"></i> Mark as Done</h3><br>
            </div>
				<label>Mentor ID</label>
				<select class="selector" name='mentorID'>
					<?php
						echo "<option>Choose Mentor:</option>";
						while($rows = $resultSet->fetch_assoc())
						{
							$id = $rows['Mentor_ID'];

							echo "<option value='$id' >$id</option>";
						}
					  ?>
				</select>
			</div>
			<div class="formgroup" id=btn>
				<button type="submit" class="btn" id="subbtn" onclick="done()"name="Done">Done</button>
			</div>
		</form>
	</div>
	<div class="footer">
<p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
<script type="text/javascript">
	function done(){
		alert("Marked as Done!")
	}
</script>
</body>
</html>