<?php
    include 'checking.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Contact</title>
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
<div class="content" style="height:100vh;">
        <div class='aboutcontainer' style="margin-top:30px; margin-left:auto; margin-right:auto; text-align:center;background-color:#EA5555; max-width:315px;">
            <button class='about' onclick='admins()'>Admins</button>
            <button class='about' onclick='aboutus()'>About Us</button>
            </div>
        
        <div class="card-container" id="card1">
             <div class="upper-container">
                <img src="images\a_faisal.png" style="width: 100%; height: 100%;"/>
             </div>
             <div class="lower-container" >
                <div id="namecontainer">
                   <h3>Muhammad Faisalhaziq Bin Rusman</h3>
                   <h4><br>1181202442</h4>
                </div>
                <div>
                   <p><br>Contact No: 
                    <span class="num">0167783072</span><br>
                    E-mail: <a href="mailto:1181202442@student.mmu.edu.my" class="email">1181202442@student.mmu.edu.my</a>
                   </p>
                </div>
             </div>
        </div>

        
        <div class="card-container" id="card2" style="margin-left:-400px;">
             <div class="upper-container">
                  <img src="images\a_amin.png" style="width: 100%; height: 100%;"/>
             </div>
             <div class="lower-container">
                <div id="namecontainer">
                   <h3>Amin Saifullah Bin Amiruddin</h3>
                   <h4><br>1181202433</h4>
                </div>
                <div>
                   <p><br>Contact No: 
                    <span class="num">0175904632</span><br>
                        E-mail:  <a href="mailto:1180202433@student.mmu.edu.my" class="email">1181202433@student.mmu.edu.my</a>
                   </p>
                </div>
             </div>
        </div>

        <div class="card-container" id="card3" style="margin-left:400px;">
             <div class="upper-container">
                <img src="images\a_zaref.png" style="width: 100%; height: 100%;" />
             </div>
             <div class="lower-container">
                <div id="namecontainer">
                   <h3>Zaref Feisal Bin Zairul Hisham</h3>
                   <h4><br>1181202530</h4>
                </div>
                <div>
                   <p><br>Contact No: 
                    <span class="num">0123885674</span><br>
                        E-mail:  <a href="mailto:1181202530@student.mmu.edu.my" class="email">1181202530@student.mmu.edu.my</a>
                   </p>
                </div>
             </div>
        </div>

        <div class="card-container" id="card4" style="display:none;">
             <div class="upper-container">
                <img src="images\about.png" style="width: 100%; height: 100%;"/>
             </div>
             <div class="lower-container" style="font-family:Quicksand;">
                <div>
                   <h3 style="font-size:13pt;">MMS was built and designed <br><br> to be convenient for students.</h3>
                </div>
                <div>
                   <p style="text-align:center; padding-top:15px;padding-right:20px; font-size:13pt; font-family:FuturaLight;">Our website is a place where students can help and connect with each other in one place.
                   </p>
                </div>
             </div>
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
    var w = document.getElementById("card4");
    var x = document.getElementById("card1");
    var y = document.getElementById("card2");
    var z = document.getElementById("card3");

    function aboutus(){
        x.style.left = "-900px";
        y.style.left = "-955px";
        z.style.left = "-910px";
        w.style.display= "";
        w.style.opacity= "1";
    }
    function admins(){
        w.style.opacity= "0";
        x.style.left = "";
        y.style.left = "";
        z.style.left = "";

    }
</script>
</body>
</html>