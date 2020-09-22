<?php
	include 'checking.php';
    require ('PHPMailer/PHPMailerAutoload.php');
    $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');
    if (isset($_POST['forget'])){
        $userid = $_POST['userid'];
        $sql = "SELECT * FROM student where Stud_ID = '$userid'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);

        if ($userid == $row['Stud_ID']){
            $email = $row['Stud_ID']."@student.mmu.edu.my";
            $url = "changePassword.php?ID=".$userid;
            $output = "Here is your password reset link! <a href='".$url."'>Click here</a>";
            $mail = new PHPMailer;
            //$mail->SMTPDebug = 3;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'mentorementeesystem@gmail.com';                 // SMTP username
            $mail->Password = 'Mentor1234!';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom('mentorementeesystem@gmail.com', 'MMS');
            $mail->addAddress($email, $row['Stud_Name']);     // Add a recipient
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'MMS - Password Reset';
            $mail->Body    = $output;

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                $error=1;
            } else {
                echo '<script language="javascript">alert("Email has been sent! Check your spam folder :)");</script>';
                $success = 1;
            }
         }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Forgot Password</title>
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
        		<tr><th colspan="2" id="tableTitle"><i class="fas fa-edit"></i> Forgot Password<br> <p style="font-size:12pt; margin-top:5px; font-weight:normal;">An email will be sent to you to change your password.</p></th></tr>
        		<form action="forgotPass.php" method="POST">
                    <tr><td style="text-align:center;" id="data">MMU ID</td>
                    <td style="text-align:center;" id="data"><input type="text" name="userid" style="padding:5px;" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required></td>
                </tr>
       			<tr><td style="text-align:center;" id="data" colspan="2">
       				<button type="submit" name="forget" class="submit_btn" style="margin:0; margin-left:auto; margin-right:auto;">Submit</button></td></tr>
       			</form>
       		</table>
        </div>
</header>
<div class="footer">
  <p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
</body>
</html>