<?php
	include 'checking.php';
	if(isset($_SESSION['userID']) ? $_SESSION['userID'] : null){
        $userID = $_SESSION['userID']; 
    }else{
        echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="login.php";</script>';
    }
    $con = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($con, 'fyp');
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Profile <?php echo $userID?></title>
    <link rel="stylesheet" type="text/css" href="css/fontawesome-free-5.14.0-web/css/all.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<header>
        <div class="menu-toggle" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
        <div class="overlay"></div>
        <div class="container">
            <nav>
                <a href="index.php"><img src="images/logo.png" class="logo"></a>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="apply.php">Apply</a></li>
                    <li><a href="mentors.php">Mentors</a></li>
                    <li><a href="forum/forumindex.php">Forum</a></li>
                    <li><a href="notes.php">Notes</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="help.php">Help</a></li>
                    <?php 
                    if($_SESSION['login'] == '1'){
                        echo '<li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>';
                        echo '<li><a href="logout.php">Log Out <i class="fas fa-sign-out-alt"></i></a></li>';
                    }else{
                        echo '<li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login/Register</a></li>';
                    }
                    ?>
                    
                </ul>
            </nav>
        </div>

        <div class="tableContainer">
        	<table class="userTable" style="height:100px; width:400px; margin-top:50px;">
        		<?php if(isset($_GET['success']) && $_GET['success'] == 1){
        			echo '<tr><th colspan="2" style="background-color:#1cc88a;"><i class="fas fa-check-circle"></i> Success</th></tr>';
        		}else if(isset($_GET['error']) && $_GET['error'] == 1){
        			echo '<tr><th colspan="2" style="background-color:#e74a3b;"><i class="fas fa-exclamation-circle"></i> Error</th></tr>';
        		}
        		?>
        		<tr><th colspan="2" id="tableTitle"><i class="fas fa-edit"></i> Update Password</th></tr>
        		<form action="processProfile.php" method="POST">
       			<tr><td style="text-align:center;" id="data">Current Password</td>
       				<td style="text-align:center;" id="data"><input type="password" name="currentPW" style="padding:5px;" required></td>
       			</tr>
       			<tr><td style="text-align:center;" id="data">New Password</td>
       				<td style="text-align:center;" id="data"><input type="password" name="newPW" style="padding:5px;" pattern="(?=.*\d)(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase letter, and at least 8 or more characters" required></td>
       			</tr>
       			<tr><td style="text-align:center;" id="data" colspan="2">
       				<input type="hidden" name="userid" value="<?php echo $_SESSION['userID']; ?>"><button type="submit" class="submit_btn" style="margin:0; margin-left:auto; margin-right:auto;">Submit</button></td></tr>
       			</form>
       		</table>


            <table class="userTable" style="height:100px; width:400px; margin-top:50px;">
                <tr><th colspan="2" id="tableTitle"><i class="fas fa-edit"></i> Edit Profile Picture</th></tr>
                <form action="processPicture.php" method="POST" enctype="multipart/form-data">
                <tr><td style="text-align:center;" id="data">Upload File</td>
                    <td style="text-align:center;" id="data"><input type="file" name="file" accept="image/x-png,image/gif,image/jpeg"></td>
                </tr>
                <tr><td style="text-align:center;" id="data" colspan="2">
                    <input type="hidden" name="userid" value="<?php echo $_SESSION['userID']; ?>">
                    <button type="submit" name="editPic" class="submit_btn" style="margin:0; margin-left:auto; margin-right:auto;">Submit</button></td></tr>
                </form>
            </table>
        </div>
</header>
<div class="footer">
  <p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
</body>
</html>