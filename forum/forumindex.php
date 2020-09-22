<?php
    include '../checking.php';
    if (!(isset($_SESSION['userID']) && $_SESSION['userID'] != '')) {

    echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="../login.php";</script>';
    }

    $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');

?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Forum Home</title>
    <link rel="stylesheet" type="text/css" href="../css/fontawesome-free-5.14.0-web/css/all.css">
    <link rel="stylesheet" href="../css/forumhome.css">
</head>
<body>
<header>
        <div class="menu-toggle" id="hamburger">
            <i class="fas fa-bars"></i>
        </div>
        <div class="overlay"></div>
        <div class="container">
            <nav>
                <a href="../index.php"><img src="../images/logo.png" class="logo"></a>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../apply.php">Apply</a></li>
                    <li><a href="../mentors.php">Mentors</a></li>
                    <li><a href="forumindex.php">Forum</a></li>
                    <li><a href="../notes.php">Notes</a></li>
                    <li><a href="../contact.php">Contact</a></li>
                    <li><a href="../help.php">Help</a></li>
                    <?php 
                    if($_SESSION['login'] == '1'){
                        echo '<li><a href="../profile.php"><i class="fas fa-user"></i> Profile</a></li>';
                        echo '<li><a href="../logout.php">Log Out <i class="fas fa-sign-out-alt"></i></a></li>';
                    }else{
                        echo '<li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login/Register</a></li>';
                    }
                    ?>
                    
                </ul>
            </nav>
        </div>
        <br>
        <div id="content">
            <span class="title">
                <i class="fas fa-user"></i> Logged in as <?php
                $student = "SELECT (Stud_Name) from student WHERE Stud_ID = ".$_SESSION['userID'].""; 
                $result = mysqli_query($con,$student);
                while($row=mysqli_fetch_assoc($result)){
                    echo '<b>'; echo $row['Stud_Name']; echo '</b>'; 
                    echo '<span class="titledesc">
                    &bull; Viewing Forum Home
                    </span>';
                }
                ?>
                <hr style="margin-top:10px;">
            </span>
        </div>
        <div id="content">
           <?php
                echo "<p class='cat_links' style='text-align:center; background-color: #EA5555;'>Forum Categories</p>";
                $sql = "SELECT * FROM forum_category ORDER BY Category_Name ASC";
                $res = mysqli_query($con,$sql);
                $categories = "";
                
                if (mysqli_num_rows($res) > 0){
                   while($row=mysqli_fetch_assoc($res)){
                    $id = $row['ID'];
                    $title = $row['Category_Name'];
                    $desc = $row['Category_Desc'];
                    $categories ="<a href='viewcategory.php?ID=".$id."' class='cat_links'><b>".$title." </b>- <font size='3'>".$desc."</font></a>";
                    echo $categories;
                   }
                }else{
                     echo "<p class='cat_links' style='text-align:center; color: #FF5733;'> There are no categories available yet.</p>";
                }
           ?>
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