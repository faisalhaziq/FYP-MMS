<?php
    session_start();
    if (!(isset($_SESSION['userID']) && $_SESSION['userID'] != '')) {

    echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="login.php";</script>';
    }
    
    $con = NEW MySQLi('localhost', 'root', '','fyp');
    $resultSet = $con->query("SELECT Sub_ID, Sub_Name FROM subject");
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Apply for Mentorship</title>
    <link rel="stylesheet" type="text/css" href="css/fontawesome-free-5.14.0-web/css/all.css">
    <link rel="stylesheet" href="css/mentorship.css">
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

            <div class = "form">
            <div class="buttons">
                <div id="btn"></div>
                <button type="button" class="toggle-btn">&nbsp; Apply for Mentorship</button>
            </div>
            <div class = "txt" style="padding-top:10px;">
                <div class="imgcontainer">
                    <img src="images/man.png" alt="worker" class="picture" style="width:80px; height:80px;">
                </div>
                <br>
                <span ><b>Need to be Mentored? Apply now!</b></span>
            </div>
            <form action="menteeApplicationSubmitted.php" method="post" id="mForm" class="input">
                    <input type="text" name="userID" class="input_fld" placeholder="MMU ID" maxlength="10" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required value="<?php echo $_SESSION['userID'] ?>">
                    <input type="text" name="fName" class="input_fld" placeholder="Full Name" required value="<?php 

                    $sql = "SELECT Stud_Name from student WHERE Stud_ID=".$_SESSION['userID']." ";
                    $res = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($res)){
                        echo $row['Stud_Name'];
                    }
                     ?>">
                    <select name="subject" class="sub" required>
                      <option>Choose Subject:</option>
                      <?php
                        while($rows = $resultSet->fetch_assoc())
                        {
                            $subjectID = $rows['Sub_ID'];
                            $subjectName = $rows['Sub_Name'];
                            echo "<option value='$subjectName'>$subjectID $subjectName</option>";
                        }
                      ?>
                    </select>
                    <input type="submit" class="submit_btn" value="Submit">
                </form>
        </div>
        </div>
        
</header>

<script>
    var open = document.getElementById('hamburger');
    var changeIcon = true;
    open.addEventListener("click", function(){
    var overlay = document.querySelector('.overlay');
    var nav = document.querySelector('nav');
    var icon = document.querySelector('.menu-toggle i');
    overlay.classList.toggle("menu-open");
    nav.classList.toggle("menu-open");
    if (changeIcon) {
        icon.classList.remove("fa-bars");
        icon.classList.add("fa-times");

        changeIcon = false;
    }
    else {
        icon.classList.remove("fa-times");
        icon.classList.add("fa-bars");
        changeIcon = true;
    }
});
</script>
</body>
</html>