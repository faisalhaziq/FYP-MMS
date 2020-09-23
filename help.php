<?php
    include 'checking.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Help</title>
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
    <div class="accordion">
            <div class="title"><h2>Frequently Asked Questions (FAQ)</h2></div>
                <div>
                    <input type="checkbox" name="accordion" id="faq1" class="accordion__input">
                    <label for="faq1" class="accordion__label">Why can't I view any pages?</label>
                    <div class="accordion__content">
                        <p>&bull; Please check and see if you're logged in first.</p>
                    </div>
                </div>
                <div>
                    <input type="checkbox" name="accordion" id="faq2" class="accordion__input">
                    <label for="faq2" class="accordion__label">What are the requirements to be a Mentor?</label>
                    <div class="accordion__content">
                        <p><b>MMS only recruits Students who are scholars.</b></p>
                        <hr>
                        &bull; We only approve applicants who have a <b>CGPA of 3.80</b> and above.
                    </div>
                </div>
                <div>
                    <input type="checkbox" name="accordion" id="faq3" class="accordion__input">
                    <label for="faq3" class="accordion__label">How do I apply for a Mentorship?</label>
                    <div class="accordion__content">
                        <p><b>Click the Apply Tab and click 'Learn', fill in your details and choose the subject you wish to be taught. </b></p>
                        <hr>
                        &bull; Mentors will be assigned to you in 1-2 days. Thank you for your patience.

                    </div>
                </div>
                <div>
                    <input type="checkbox" name="accordion" id="faq4" class="accordion__input">
                    <label for="faq4" class="accordion__label">How do I apply to become a Mentor?</label>
                    <div class="accordion__content">
                        <p><b>Click the Apply Tab and click 'Teach', fill in your details, upload your MMU Results Transcript and choose the subject you wish to teach. </b></p>
                        <hr>
                        &bull; Applications take 1-2 days to be reviewed. You can check your Student status in your Profile page to see if your application has been accepted. Thank you for your patience.

                    </div>
                </div>
                <div>
                    <input type="checkbox" name="accordion" id="faq5" class="accordion__input">
                    <label for="faq5" class="accordion__label">How do I download notes?</label>
                    <div class="accordion__content">
                        <p><b>Click the Notes Tab, find the subject you're looking for, and click Download!</b></p>
                        <hr>
                        <img src="images/Help/Notes.png" width="660">
                        <hr>
                        &bull; If the subject you're looking for isn't listed, you can request the subject through the Request Notes form.

                    </div>
                </div>
                <div>
                    <input type="checkbox" name="accordion" id="faq6" class="accordion__input">
                    <label for="faq6" class="accordion__label">I'm a Mentor, how do I revert back to Mentee?</label>
                    <div class="accordion__content">
                        <p><b>Go to your Profile page, then in the Revert Form, confirm that you want to revert back to Mentee, and submit!</b></p>
                        <hr>
                        <img src="images/Help/Revert.png" width="660">
                        <hr>
                        &bull; Once you revert back to Mentee, you have to reapply to regain your Mentor status.
                    </div>
                </div>
                <div>
                    <input type="checkbox" name="accordion" id="faq7" class="accordion__input">
                    <label for="faq7" class="accordion__label">I have an issue but there's no FAQ for it!</label>
                    <div class="accordion__content">
                        <p><b>Report the issue to the Admins in the Contact page.</b></p>
                        <hr>
                        &bull; We will try to fix your issue as soon as possible. We apologise for the inconvenience and thank you for reporting the bug to us!
                    </div>
                </div>
<!-- Forum FAQ -->
            <div class="title"><h2>Forum FAQ</h2></div>
                <div>
                    <input type="checkbox" name="accordion" id="forumfaq1" class="accordion__input">
                    <label for="forumfaq1" class="accordion__label">How do I post a topic?</label>
                    <div class="accordion__content">
                        <p><b>Choose a category, click 'Create Post' and fill in your Post Title & Post Content!</b></p>
                        <hr>
                        &bull; Please choose the proper category when posting.
                    </div>
                </div>
                <div>
                    <input type="checkbox" name="accordion" id="forumfaq2" class="accordion__input">
                    <label for="forumfaq2" class="accordion__label">How do I post a reply?</label>
                    <div class="accordion__content">
                        <p><b>Choose a topic post, click 'Reply' and fill in your Reply Content!</b></p>
                        <hr>
                        &bull; Please be civil and respect others when replying posts.
                    </div>
                </div>
                <div>
                    <input type="checkbox" name="accordion" id="forumfaq3" class="accordion__input">
                    <label for="forumfaq3" class="accordion__label">How do I delete a topic?</label>
                    <div class="accordion__content">
                        <p><b>Sorry, MMS v1.0 does not have that function yet.</b></p>
                        <hr>
                        &bull; We are updating our system to serve you the best experience, apologies for the inconvenience.
                    </div>
                </div>
                <div>
                    <input type="checkbox" name="accordion" id="forumfaq4" class="accordion__input">
                    <label for="forumfaq4" class="accordion__label">How do I delete a reply?</label>
                    <div class="accordion__content">
                        <p><b>Sorry, MMS v1.0 does not have that function yet.</b></p>
                        <hr>
                        &bull; We are updating our system to serve you the best experience, apologies for the inconvenience.
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
</script>
</body>
</html>