<?php
	session_start();
	if (!(isset($_SESSION['adminUser']) && $_SESSION['adminUser'] != '')) {

	header ("Location: adminlogin.php");
	}
	$con = NEW MySQLi('localhost', 'root', '','fyp');
	$resultSet = $con->query("SELECT ID FROM forum_category");
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Admin - Manage Forums
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
			$s = "SELECT * FROM `forum_category` WHERE 1";
			$result = mysqli_query($con, $s);
			echo "<table class='userTable' style='width:700px;'>";
			echo "<tr>";
			echo "<th colspan='3' id='tableTitle'>"; echo "Forum Categories";	echo "</th>";
			echo "</tr>";
			echo "<tr>";
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Category Name";	echo "</th>";
				echo "<th>"; echo "Category Desc";  echo "</th>";
			echo "</tr>";
			if(mysqli_num_rows($result)==0){
				echo "<tr>";
				echo "<td><b>NULL</b></td>";
				echo "<td id='name'>NULL</td>";
				echo "<td>NULL</td>";
				echo "</tr>";
				echo "</table>";
			}
			else
				{
					while($row=mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td><b>"; echo $row['ID']; echo "</b></td>";
					echo "<td><b>"; echo $row['Category_Name']; echo "</b></td>";
					echo "<td id='name'>"; echo $row['Category_Desc']; echo "</td>";
					echo "</tr>";
					}
					echo "</table>";
				}
			
		?>
	</div>
	<div class="formContainer">
		<form method="POST" action="processForums.php" class="updateForm">
			<div class="formgroup">
				<?php 
				if(mysqli_num_rows($result)!=0){
					echo '<label>ID</label>';
					echo '<select class="selector" name="id">';
						while($rows = $resultSet->fetch_assoc())
						{
							$id = $rows['ID'];
							echo "<option value='$id' >$id</option>";
						}
					echo '</select>';
				}
				?>
			</div>
			<div class="formgroup">
				<label>Category Name</label>
				<input type="text" name="name" class="form" placeholder="Enter Category Name">
			</div>
			<div class="formgroup">
				<label>Category Desc</label>
				<input type="text" name="desc" class="form" placeholder="Enter Category Desc">
			</div>
			<div class="formgroup" id=btn>
				<button type="submit" class="btn" id="subbtn" name="Add">Add</button>
				<button type="submit" class="btn" id="editbtn" name="Edit">Edit</button>
				<button type="submit" class="btn" id="delbtn" name="Del">Delete</button>
			</div>

		</form>
	<div class="footer">
<p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
</body>
</html>