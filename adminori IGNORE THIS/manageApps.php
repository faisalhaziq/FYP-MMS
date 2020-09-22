<?php
	session_start();
	if (!(isset($_SESSION['adminUser']) && $_SESSION['adminUser'] != '')) {

	header ("Location: adminlogin.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Admin - Manage Applications
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
			//mentor applications
			$con = mysqli_connect('localhost', 'root', '');
			mysqli_select_db($con, 'fyp');
			$sql = "SELECT App_ID, Stud_ID, Stud_Name, Sub_Name, CGPA, `path` FROM `mentorapp` WHERE 1";
			$res = mysqli_query($con, $sql);
			echo "<table class='userTable' style='width:1100px;'>";
			echo "<tr>";
			echo "<th colspan='5' id='tableTitle'>"; echo "Mentor Applications";	echo "</th>";
			echo "</tr>";
			echo "<tr>";
				echo "<th>"; echo "Student ID";	echo "</th>";
				echo "<th>"; echo "Student Name";  echo "</th>";
				echo "<th>"; echo "Subject Name";  echo "</th>";
				echo "<th>"; echo "CGPA";  echo "</th>";
			echo "</tr>";
			if(mysqli_num_rows($res)==0){
				echo "<tr>";
				echo "<td><b>NULL</b></td>";
				echo "<td id='name'>NULL</td>";
				echo "<td>NULL</td>";
				echo "<td>NULL</td>";
				echo "</tr>";
				echo "</table>";
			}
			else{
			while($row=mysqli_fetch_assoc($res))
				{
					echo "<tr>";
					echo "<td>"; echo $row['Stud_ID']; echo "</td>";
					echo "<td id='name'>"; echo $row['Stud_Name']; echo "</td>";
					echo "<td>"; echo $row['Sub_Name']; echo "</td>";
					echo "<td>";?> <a download="<?php echo $row['path'];?>" href='../download.php?dow=<?php echo $row['path'];?>'>Download CGPA</a><?php echo "</td>";
					echo "</tr>";
				}
			echo "</table>";
			}
		?>
		<div class="formContainer">
		<form method="POST" action="processMentorApp.php" class="updateForm">
			<div class="txt">
                <h3><i class="fas fa-pencil-ruler"></i> Manage Mentor Apps</h3><br>
            </div>        
			<div class="formgroup">
				<label>Student ID</label>
				<select class="selector" name='id'>
					<?php
					$con = NEW MySQLi('localhost', 'root', '','fyp');
					$resultSet = $con->query("SELECT Stud_ID FROM mentorapp");
						while($rows = $resultSet->fetch_assoc())
						{
							$id = $rows['Stud_ID'];
							echo "<option value='$id' >$id</option>";
						}
					  ?>
				</select>
			</div>
			<p style="font-size:11pt; font-style: italic; text-align:center; color:red;">ALERT: ONLY accept if CGPA is >= 3.80.</p>
			<div class="formgroup" id=btn>
				<button type="submit" class="btn" id="subbtn" name="Accept"><i class="fas fa-check-circle"></i></button>
				<button type="submit" class="btn" id="delbtn" name="Deny"><i class="fas fa-times-circle"></i></button>
			</div>
		</form>
		</div>
	<br>
	<div class="spacer" style="height:50px; width:100%; background-color:#EA5555;"></div>
	<br>
		<?php
			//mentorship applications
			$con = mysqli_connect('localhost', 'root', '');
			mysqli_select_db($con, 'fyp');
			$s = "SELECT App_ID, Stud_Name, Stud_ID, Sub_Name, Mentor_Name FROM `mentorshipapp` WHERE 1";
			$result = mysqli_query($con, $s);
			echo "<table class='userTable'  style='width:1100px;'>";
			echo "<tr>";
			echo "<th colspan='6' id='tableTitle' >"; echo "Mentorship Applications";	echo "</th>";
			echo "</tr>";
			echo "<tr>";
				echo "<th>"; echo "Application ID";	echo "</th>";
				echo "<th>"; echo "Student ID";  echo "</th>";
				echo "<th>"; echo "Student Name";  echo "</th>";
				echo "<th>"; echo "Subject Name";  echo "</th>";
				echo "<th>"; echo "Mentor Name";  echo "</th>";
			echo "</tr>";
			if(mysqli_num_rows($result)==0){
				echo "<tr>";
				echo "<td><b>NULL</b></td>";
				echo "<td id='name'>NULL</td>";
				echo "<td>NULL</td>";
				echo "<td>NULL</td>";
				echo "<td>NULL</td>";
				echo "</tr>";
				echo "</table>";
			}
			else{
			while($row=mysqli_fetch_assoc($result))
				{
					echo "<tr>";
					echo "<td>"; echo $row['App_ID']; echo "</td>";
					echo "<td>"; echo $row['Stud_ID']; echo "</td>";
					echo "<td id='name'>"; echo $row['Stud_Name']; echo "</td>";
					echo "<td>"; echo $row['Sub_Name']; echo "</td>";
					echo "<td>"; echo $row['Mentor_Name']; echo "</td>";
					echo "</tr>";
				}
			echo "</table>";
		}
		?>
		<br>
	<div class="spacer" style="height:50px; width:100%; background-color:#EA5555;"></div>
	<br>
		<div class="formContainer">
		<form method="POST" action="processMentorshipApp.php" class="updateForm">
			<div class="txt">
                <h3 align=center><i class="fas fa-pencil-ruler"></i> Assign Mentors</h3><br>
            </div>        
			<div class="formgroup">
				<label>Student ID</label>
				<select class="selector" name='id'>
					<?php
					$con = NEW MySQLi('localhost', 'root', '','fyp');
					$resultSet = $con->query("SELECT App_ID, Stud_ID FROM mentorshipapp");
						while($rows = $resultSet->fetch_assoc())
						{
							$appid= $rows['App_ID'];
							$id = $rows['Stud_ID'];
							echo "<option value='$id' >App ID [$appid] - $id</option>";
						}
					  ?>
				</select>
			</div>
			<div class="formgroup">
				<label>Mentor ID</label><br>
				<select class="selector" name='mentorid'>
					<?php
					$con = NEW MySQLi('localhost', 'root', '','fyp');
					$res2 = $con->query("SELECT Mentor_ID, Sub_Name FROM mentor");
						while($row2 = $res2->fetch_assoc())
						{
							$sub = $row2['Sub_Name'];
							$mentorid = $row2['Mentor_ID'];
							echo "<option value='$mentorid ' >$mentorid  for $sub</option>";
						}
					  ?>
				</select>
			</div>  
			<p style="font-size:11pt; font-style: italic; text-align:center; color:red;">ALERT: ASSIGN Mentors to the correct subject.</p>
			<div class="formgroup" id=btn>
				<button type="submit" class="btn" id="subbtn" name="Assign"><i class="fas fa-check-circle"></i> Assign</button>
			</div>
		</form>
		</div>
		<div class="formContainer">
		<form method="POST" action="processMentorshipApp.php" class="updateForm">
			<div class="txt">
                <h3 align=center><i class="fas fa-pencil-ruler"></i> Clear Mentorship Apps</h3><br>
            </div>        
			<div class="formgroup">
				<label>Student ID</label>
				<select class="selector" name='id'>
					<?php
					$con = NEW MySQLi('localhost', 'root', '','fyp');
					$resultSet = $con->query("SELECT App_ID, Stud_ID FROM mentorshipapp");
						while($rows = $resultSet->fetch_assoc())
						{
							$id = $rows['Stud_ID'];
							$appid= $rows['App_ID'];
							echo "<option value='$appid' >App ID [$appid] - $id</option>";
						}
					  ?>
				</select>
			</div>
			<p style="font-size:11pt; font-style: italic; text-align:center; color:red;">ALERT: ONLY clear when Mentor notifies as done.</p>
			<div class="formgroup" id=btn>
				<button type="submit" class="btn" id="delbtn" name="Delete"><i class="fas fa-times-circle"></i> Del</button>
			</div>
		</form>
		</div>
 	</div>

	<div class="footer">
<p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
</body>
</html>