<!DOCTYPE html>
<html>
<head>
	<title> DIT MMS - Admin Login</title>
	<link rel="stylesheet" type="text/css" href="../css/fontawesome-free-5.14.0-web/css/all.css">
	<link rel="stylesheet" href="../css/adminstyle.css">
</head>
<body>
	<nav>
		<a href="../index.php"><img src="../images\adminlogo.png" class="logo"></a>
		<hr>
	</nav>
	<div class = "form">
			<div class="buttons">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Login</button>
			</div>
			<div class = "txt">
				<div class="imgcontainer">
					<img src="../images/admin.png" alt="Adminlogo" class="Hat">
				</div>
				Please login to access dashboard
			</div>
			<form action="adminvalidation.php" method="post" id="login" class="input">
					<input type="text" name="adminUser" class="input_fld" placeholder="Admin Username" required>
					<input type="password" name="pw" class="input_fld" placeholder="Password" required>
					<input type="submit" class="submit_btn" value="Login">
			</form>
		</div>			
<div class="footer">
<p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
</body>
</html>