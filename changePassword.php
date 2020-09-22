<?php
	include 'checking.php';
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'fyp');
    if(isset($_GET['ID']) && $_GET['ID'] !== NULL){
        $userid = $_GET['ID'];
    }else{
        echo '<script language="javascript">alert("You are not allowed to be here!"); window.location.href="index.php";</script>';
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Change Password</title>
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
        		<tr><th colspan="2" id="tableTitle"><i class="fas fa-edit"></i> Change Password<br> <p style="font-size:12pt; margin-top:5px; font-weight:normal;">An email will be sent to you to change your password.</p></th></tr>
        		<form action="changePasswordProcess.php" method="POST">
                <tr><td style="text-align:center;" id="data">New Password</td>
                    <td style="text-align:center;" id="data"><input type="password" name="newPW" style="padding:5px;" pattern="(?=.*\d)(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase letter, and at least 8 or more characters" required></td>
                </tr>
                <tr><td style="text-align:center;" id="data">Confirm Password</td>
                    <td style="text-align:center;" id="data"><input type="password" name="conPW" style="padding:5px;" pattern="(?=.*\d)(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase letter, and at least 8 or more characters" required></td>
                </tr>
                <tr><td style="text-align:center;" id="data" colspan="2">
                    <input type="hidden" name="userid" value="<?php echo $userid; ?>"><button type="submit" class="submit_btn" style="margin:0; margin-left:auto; margin-right:auto;">Submit</button></td></tr>
                </form>
       		</table>
        </div>
</header>
<div class="footer">
  <p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
</body>
</html>