<?php
    session_start();
    if (!(isset($_SESSION['userID']) && $_SESSION['userID'] != '')) {

    echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="login.php";</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Notes</title>
    <link rel="stylesheet" type="text/css" href="css/fontawesome-free-5.14.0-web/css/all.css">
    <link rel="stylesheet" href="css/style.css">
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
        <?php
            $con = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($con, 'fyp');
            $s = "SELECT * FROM `subject` WHERE 1 ORDER BY Sub_Name ASC";
            $result = mysqli_query($con, $s);
            echo "<table class='userTable' style='width:800px;'>";
            echo "<tr>";
            echo "<th colspan='3' id='tableTitle'><i class='fas fa-book-open'></i>"; echo " Subjects List <span id='subtext'>Updated Daily</span>";  echo "</th>";
            echo "</tr>";
            echo "<tr>";
                echo "<th>"; echo "Subject ID"; echo "</th>";
                echo "<th>"; echo "Subject Name";  echo "</th>";
                echo "<th>"; echo "Download Notes";  echo "</th>";
            echo "</tr>";
            if(mysqli_num_rows($result)==0){
                echo "NULL";
            }
            else
                {
                    while($row=mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td id='link'><b>"; echo $row['Sub_ID']; echo "</b></td>";
                    echo "<td id='name'>"; echo $row['Sub_Name']; echo "</td>";
                    if(empty($row['pathname'])){
                        echo "<td style='color:red; font-weight:bold;'>Not Uploaded</td>";
                    }else{
                        echo "<td>";?> <a download="<?php echo $row['pathname'];?>" href='downloadnotes.php?dow=<?php echo $row['pathname'];?>'><i class="fas fa-cloud-download-alt"></i> Download</a><?php echo "</td>";
                    }
                    echo "</tr>";
                    }
                    echo "</table>";
                }
        ?>
        </div>
    <div class="requestForm">
        <form action="notesrequest.php" method="post" id="mForm" class="request">
            <div class="txt">
                <h2><i class="fas fa-pencil-ruler"></i> Request Notes </h2>
            </div>                
                <input type="text" name="subID" class="input_fld" placeholder="Subject ID" pattern="[A-Za-z]{3}[0-9]{4}"required maxlength="7" title="Enter Valid Subject Code! EG: DCS5198">
                <input type="text" name="subName" class="input_fld" placeholder="Subject Name" required>
                <input type="submit" class="submit_btn" name="request" required>
            </form>
    </div>
</header>
<div class="footer">
  <p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
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