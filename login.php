<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Login</title>
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
                </ul>
            </nav>
        </div>
        <div class = "form">
            <div class="buttons">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" id="loginbtn" onclick="login()">&nbsp Login</button>
                <button type="button" class="toggle-btn" id="regbtn" onclick="reg()">&nbspRegister</button>
            </div>
            <div class = "txt">
                Welcome to <br>DIT Mentor Mentee System!
                </div>
            <form action="validate.php" method="post" id="login" class="input" style="margin-top:10px;">
                    <input type="text" name="userID" class="input_fld" placeholder="MMU ID" maxlength="10" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required autocomplete=off>
                    <input type="password" name="pw" class="input_fld" placeholder="Password" required>
                    <a href="admin/adminlogin.php" target="_blank" class="admin">Are you an admin?</a>
                    <a href="forgotPass.php" target="_blank" style="color:blue; text-decoration:underline;">Forgot password?</a>
                    <input type="submit" class="submit_btn" value="Login">
                </form>
            <form action="register.php" method="post" id="reg" class="input">
                    <input type="text" name="userID" class="input_fld" placeholder="MMU ID" maxlength="10" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                    <input type="text" name="fname" class="input_fld" placeholder="Full Name" required>
                    <input type="password" name="pw" class="input_fld" placeholder="Password" pattern="(?=.*\d)(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase letter, and at least 8 or more characters"required>

                    <input type="password" name="conpw" class="input_fld" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[A-Z]).{8,}"  title="Must contain at least one number and one uppercase letter, and at least 8 or more characters"required>
                    <input type="submit" class="submit_btn" name="register_btn" value="Register">
            </form>
        </div>
</header>

<script>
    var open = document.getElementById('hamburger');
    var changeIcon = true;
    open.addEventListener("click", function(){
    var overlay = document.querySelector('.overlay');
    var nav = document.querySelector('nav');
    var icon = document.querySelector('.menu-toggle i');
    var x = document.getElementById('slidershow');
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
    document.getElementById("loginbtn").style.color = "#FFF";
    var x = document.getElementById("login");
    var y = document.getElementById("reg");
    var z = document.getElementById("btn");

    function reg(){
        document.getElementById("regbtn").style.color = "#FFF";
        document.getElementById("loginbtn").style.color = "#000";
        x.style.left = "-400px";
        y.style.left = "55px";
        z.style.left = "110px";
    }
    function login(){
        document.getElementById("loginbtn").style.color = "#FFF";
        document.getElementById("regbtn").style.color = "#000";
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0px";
    }
</script>
</body>
</html>