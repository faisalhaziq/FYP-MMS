<?php
	session_start();
	if (!(isset($_SESSION['adminUser']) && $_SESSION['adminUser'] != '')) {

	header ("Location: adminlogin.php");
	}
?>
<html>
<head>
	<title> Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/fontawesome-free-5.14.0-web/css/all.css">
	<link rel="stylesheet" href="../css/admindash.css">
</head>
<body>
	<div class = "top">
	<nav>
		<a href="admindashboard.php"><img src="../images/adminlogo.png" class="logo"></a>
	</nav>
		<hr>
	</div>
	<div class="tableContainer">
		<h2 align=center style='padding-top:30px'>Welcome <?php echo $_SESSION['adminUser']?>!</h2>
		<form>
			<table class="menuTable">
				<tr>
					<td>
						<input type="button" onclick="window.location.href='manageUsers.php';" class="menu" name="staff" value="Manage Users">
					</td>
				</tr>
				<tr>
					<td>
						<input type="button" onclick="window.location.href='manageMentors.php';" class="menu" value="Manage Mentors">
					</td>
				</tr>
				<tr>
					<td>
						<input type="button" onclick="window.location.href='manageApps.php';" class="menu" value="Manage Applications">
					</td>
				</tr>
				<tr>
					<td>
						<input type="button" onclick="window.location.href='manageSubjects.php';" class="menu" value="Manage Subjects">
					</td>
				</tr>
				<tr>
					<td>
						<input type="button" onclick="window.location.href='manageNotes.php';" class="menu" value="Manage Notes">
					</td>
				</tr>
				<tr>
					<td>
						<input type="button" onclick="window.location.href='manageForums.php';" class="menu" value="Manage Forums">
					</td>
				</tr>
				<tr>
					<td>
						<input type="button" onclick="logout()" class="menu" value="Logout">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div class="footer">
<p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
<script>
function logout(){
	window.alert("See you soon, Admin!");
	window.location.href='../logout.php';
}
</script>
</body>
</html>