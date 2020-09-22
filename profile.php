<?php
    include 'checking.php';
    if(isset($_SESSION['userID']) ? $_SESSION['userID'] : null){
        $userID = $_SESSION['userID']; 
    }else{
        echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="login.php";</script>';
    }
    $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');
    $sql = "SELECT * from student WHERE Stud_ID = '$userID'";
    $result = mysqli_query($con, $sql);
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
        <?php
            echo "<table class='userTable' style='height:600px;'>";
            echo "<tr>";
            echo "<th colspan='2' id='tableTitle'><i class='fas fa-user'></i>"; echo " User Profile<br>"; echo "<a href='editprofile.php'><button type='button' class='editbtn' style='margin-top:10px;'><i class='fas fa-edit'></i> Change password</button></a>"; echo "</th>";
            echo "</tr>";
            if(mysqli_num_rows($result)==0){
                echo "You shouldn't be here.";
            }
            else
                {
                    while($row=mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td id='data'><b>"; echo "Profile Picture:"; echo "</b></td>";
                    echo "<td id='link'>"; 
                    if(!empty($row['image']) && $row['image'] !== NULL){
                        echo "<img src=profilepics/".$row['image']." width='200px' height='200px' style='margin-left:auto; margin-right:auto; display:block;'><br><a href='editprofile.php' style='font-size:12pt;'><i class='fas fa-edit'></i> Change</a>";
                    }else{
                        echo "<a href='editprofile.php'><button type='button' class='addbtn'><i class='fas fa-plus-circle'></i> Add a profile picture</button></a>";
                    }

                    echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td id='data'><b>"; echo "Student ID:"; echo "</b></td>";
                    echo "<td id='link'><b>"; echo $row['Stud_ID']; echo "</b><br></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td id='data'><b>"; echo "Student Name:"; echo "</b></td>";
                    echo "<td id='link'><b>"; echo $row['Stud_Name']; echo "</b></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td id='data'><b>"; echo "Student Status:"; echo "</b></td>";
                    echo "<td id='link'><b>"; echo $row['Stud_Status']; echo "</b></td>";
                    echo "</tr>";
                    if (strpos($row['Mentor_Name'],' ') !== false){
                    echo "<tr>";
                    echo "<td id='data'><b>"; echo "Mentor Name:"; echo "</b></td>";
                    $sql2 = "SELECT Mentor_ID from mentor WHERE Mentor_Name = '".$row['Mentor_Name']."' "; //this is for Mentor Email ID for Mentee Profile
                    $res3 = mysqli_query($con, $sql2);
                        while($row2=mysqli_fetch_assoc($res3)){
                            echo "<td id='link'><b>"; echo $row['Mentor_Name']; echo "</b><a href='mailto:".$row2['Mentor_ID']."@student.mmu.edu.my'> (Message)</a></td>";
                            echo "</tr>";
                            echo "</table>";
                        }
                    }
                    $mentor = "SELECT Mentee_Name from mentor WHERE Mentor_ID = '".$row['Stud_ID']."' "; //this is for While loop to check if Mentee Name is empty
                    $mentorsql = mysqli_query($con, $mentor);
                        while($mentorRow=mysqli_fetch_assoc($mentorsql)){
                            if(strpos($mentorRow['Mentee_Name'],' ') !== false){
                            echo "<tr>";
                            echo "<td id='data'><b>"; echo "Mentee Name:"; echo "</b></td>";
                            $sqlquery = "SELECT Mentee_Name from mentor WHERE Mentor_ID = '".$row['Stud_ID']."' "; //this is to get the Mentee Name from Mentor Table from the Mentor ID
                            $resultsql = mysqli_query($con, $sqlquery);
                                while($row2=mysqli_fetch_assoc($resultsql)){
                                    $sqlquery2 = "SELECT Stud_ID from student WHERE Stud_Name = '".$row2['Mentee_Name']."' "; //this is to get the Mentee Email ID for Mentor Profile
                                    $resultsql2 = mysqli_query($con, $sqlquery2);
                                    while($row3=mysqli_fetch_assoc($resultsql2)){
                                        echo "<td id='link'><b>"; echo $row2['Mentee_Name']; echo "</b><a href='mailto:".$row3['Stud_ID']."@student.mmu.edu.my'> (Message)</a></td>";
                                        echo "</tr>";
                                    }
                                }
                            
                            }
                        }
                }
                echo "</table>";
            }
        ?>
        </div>
        <?php
        $sql2 = "SELECT * from student WHERE Stud_ID = '$userID'";
        $result2 = mysqli_query($con, $sql2);
        while($row=mysqli_fetch_assoc($result2)){
            if($row['Stud_Status'] == 'Mentor'){
                echo '<div class="requestForm">';
                echo '<form action="revert.php" method="post" id="mForm" class="request">';
                echo '<div class="txt">';
                echo '<h2><i class="fas fa-pencil-ruler"></i> Revert to Mentee</h2></div>';
                echo '<div class="confirm">';
                echo "<input type='checkbox' class='confirm' name='status' value='Mentee' required><label> I hereby confirm that I want to revert to a Mentee again.</label></div>";
                echo '<input type="hidden" name="userid" value="'.$row['Stud_ID'].'" />';
                echo '<input type="submit" class="submit_btn" name="request" required></form></div>';
                }
            }
        ?>
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