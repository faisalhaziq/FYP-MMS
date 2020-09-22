<?php
	session_start();
	if (!(isset($_SESSION['adminUser']) && $_SESSION['adminUser'] != '')) {

	header ("Location: adminlogin.php");
	}
	$con = NEW MySQLi('localhost', 'root', '','fyp');
	$resultSet = $con->query("SELECT ID FROM subject");
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Admin - Manage Notes
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
			//Subject List
			$con = mysqli_connect('localhost', 'root', '');
			mysqli_select_db($con, 'fyp');
			$s = "SELECT * FROM `subject` WHERE 1";
			$result = mysqli_query($con, $s);
			echo "<table class='userTable' style='width:900px; '>";
			echo "<tr>";
			echo "<th colspan='4' id='tableTitle'>"; echo "Manage Notes";	echo "</th>";
			echo "</tr>";
			echo "<tr>";
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Subject ID";	echo "</th>";
				echo "<th>"; echo "Subject Name";  echo "</th>";
				echo "<th>"; echo "Notes File";  echo "</th>";
			echo "</tr>";
			if(mysqli_num_rows($result)==0){
				echo "takde benda";
			}
			else
				{
					while($row=mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td><b>"; echo $row['ID']; echo "</b></td>";
					echo "<td><b>"; echo $row['Sub_ID']; echo "</b></td>";
					echo "<td id='name'>"; echo $row['Sub_Name']; echo "</td>";
					echo "<td id='name'>"; echo $row['notes']; echo "</td>";
					echo "</tr>";
					}
					echo "</table>";
				}
			//Notes Requests
			$sql = "SELECT * FROM `notes` WHERE 1";
			$result2 = mysqli_query($con, $sql);
			echo "<table class='userTable' style='width:600px;'>";
			echo "<tr>";
			echo "<th colspan='2' id='tableTitle'>"; echo "Requested Notes";	echo "</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>"; echo "Subject ID";	echo "</th>";
			echo "<th>"; echo "Subject Name";  echo "</th>";
			echo "</tr>";
			if(mysqli_num_rows($result2)==0){
				echo "<tr>";
				echo "<td><b>NULL</b></td>";
				echo "<td id='name'>NULL</td>";
				echo "</tr>";
			}
			else
				{
					while($row=mysqli_fetch_assoc($result2)){
					echo "<tr>";
					echo "<td><b>"; echo $row['Sub_ID']; echo "</b></td>";
					echo "<td id='name'>"; echo $row['Sub_Name']; echo "</td>";
					echo "</tr>";
					}
					echo "</table>";
				}
		?>
	</div>

	<?php require_once 'processSubject.php'; ?>
	<div class="formContainer">
		<form method="POST" action="processNotes.php" class="updateForm" enctype="multipart/form-data">
			<div class="formgroup">
				<label>ID</label>
				<select class="selector" name='id'>
					<?php
						while($rows = $resultSet->fetch_assoc())
						{
							$id = $rows['ID'];
							echo "<option value='$id' >$id</option>";
						}
					  ?>
				</select>
			</div>
			<div class="formgroup">
				<label>Subject Notes (.zip)<br></label>
				<br><input type="file" name="file" class="input_fld" accept=".zip">
			</div>
			<br>
			<div class="formgroup" id=btn>
				<button type="submit" class="btn" id="subbtn" name="Add">Add</button>
				<button type="submit" class="btn" id="delbtn" name="Del">Del</button>
			</div>
		</form>
	</div>

	<div class="footer">
<p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
</body>
</html>