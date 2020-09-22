<?php
    include '../checking.php';
    if (!(isset($_SESSION['userID']) && $_SESSION['userID'] != '')) {

    echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="../login.php";</script>';
    }
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'fyp');
    $cat_id= $_GET['cid'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Create Forum Topic</title>
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
                    echo '<b>'; echo $row['Stud_Name']; echo '</b> ';
                }
                ?>
                
                <hr style="margin-top:10px;">
            </span>
        </div>
        <div id="topics">
        <table width='58%' style='margin-left:auto; margin-right:auto; border-collapse:collapse;'>
        <tr style='background-color: #EA5555; text-align:center;'><td colspan='2'><?php echo "<a href='viewcategory.php?ID=".$cat_id."'>"; ?><i class='fas fa-arrow-circle-left'></i> Return to Topics</a> </td></tr>
        </table>
        </div>
        <div class="form" style="width:400px; height:450px;">
            <form action="create_topic_parse.php" method="POST" class="formInput">

            <h2 style="padding-top:20px; text-align:center;"><i class="fas fa-pen-fancy"></i> <u>Create Forum Post</u></h2>
            <?php
            $categorysql = "SELECT Category_Name from forum_category WHERE ID = '$cat_id'";
                $catres = mysqli_query($con, $categorysql);
                while ($catrow = mysqli_fetch_assoc($catres)){
                    echo "<br>Category: <u>".$catrow['Category_Name']." </u><br>";
                }
            ?>
            <span><br>Post Title:<br>
            <input type="text" name="topic_title" maxlength="150" id="inputfld" class="titleinput" size="30" style="padding:10px; font-family:QuicksandBold;"></span>

            <p style="padding-top:20px;">Post Content:</p>
            <textarea name="topic_content" rows="7" cols="30" style="font-family:Quicksand; padding:10px; font-size:12pt; resize:none;"></textarea>
            <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>" />
            <input type="submit" name="submit" class="submit_btn" value="Create Topic">
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