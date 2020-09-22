<?php
    session_start();
    if (!(isset($_SESSION['userID']) && $_SESSION['userID'] != '')) {

    echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="login.php";</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Apply</title>
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
    
        <div class="card-container" id="mentorcard">
         <div class="apply-container">
            <a href="applymentor.php"><img src="images\mentor.png" style="width: 100%; height: 100%;"/></a>
         </div>
        </div>

        <div class="card-container" id="mentorship">
         <div class="apply-container">
            <a href="applymentorship.php"><img src="images\mentorship.png" style="width: 100%; height: 100%;"/></a>
         </div>

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