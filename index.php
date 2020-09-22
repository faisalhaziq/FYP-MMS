<?php
    include 'checking.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Home</title>

    <link rel="stylesheet" type="text/css" href="css/fontawesome-free-5.14.0-web/css/all.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body onload="realtimeClock()">
<header >
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

            <marquee behavior="scroll" direction="right" scrollamount="9" width="27%" style="margin-left:43px;">
            <span id="response" style="font-size: 20px;color:white"><?php echo $_SESSION['message'];?></span></marquee>



        <div class="slidershow middle" id="slidershow">
              <div class="slides">
                <input type="radio" name="r" id="r1" checked>
                <input type="radio" name="r" id="r2">
                <input type="radio" name="r" id="r3">
                <div class="slide s1">
                  <img src="images/indexposter1.png" alt="">
                </div>
                <div class="slide">
                  <img src="images/indexposter2.png" alt="">
                </div>
                <div class="slide">
                  <img src="images/indexposter3.png" alt="">
                </div>
              </div>
              <div class="navigation">
                <label for="r1" class="bar"></label>
                <label for="r2" class="bar"></label>
                <label for="r3" class="bar"></label>
              </div> 
        </div>
        </div>
        
</header>

<div class="footer">
  <p><i class="far fa-copyright"></i> 2020 MMS. All rights reserved.<br></p>
</div>
<script>
    // Just for a mobile layout, not that important
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
        x.style.display = "none";
    }
    else {
        icon.classList.remove("fa-times");
        icon.classList.add("fa-bars");
        changeIcon = true;
        x.style.display = "block";
    }
    });
    
    //pretty buggy sometimes 3 will scroll 
    //back to 2 and then 1 instead of 3-1
    var a = setInterval(scroll1, 5000);
    var b = setInterval(scroll2, 8000);
    var c = setInterval(scroll3, 10000);

    function scroll1(){
        document.getElementById("r2").checked=true;
    }
    function scroll2(){
        document.getElementById("r3").checked=true;
    }
    function scroll3(){
        document.getElementById("r1").checked=true;
    }
</script>
</body>
</html>