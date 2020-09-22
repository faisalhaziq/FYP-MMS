<?php
    include '../checking.php';
    if (!(isset($_SESSION['userID']) && $_SESSION['userID'] != '')) {

    echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="../login.php";</script>';
    }

    $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');
    global $topics;
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Forum Topics</title>
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
                    &bull; Viewing Topics
                    </span>';
                }
                ?>
                
                <hr style="margin-top:10px;">
            </span>
        </div>
        <div id="topics">
        <?php
            $cat_id= $_GET['ID'];
            if (isset($_SESSION['userID'])){
                $logged = "  <a href='create_topic.php?cid=".$cat_id."'> | <i class='fas fa-edit'></i> Create Post </a>";
            }else{
                $logged = " | Please login to post a topic.";
            }

            $sql = "SELECT (ID) FROM forum_category WHERE ID='".$cat_id."' LIMIT 1";
            $queryresult = mysqli_query($con, $sql);

            if (mysqli_num_rows($queryresult) ==1){
                $sql2 = "SELECT * FROM forum_topics WHERE Cat_ID='".$cat_id."'";
                $queryresult2 = mysqli_query($con, $sql2);
                $topics = " ";
                if (mysqli_num_rows($queryresult2) > 0)
                {   
                    echo $topics .= "<table width='100%' style='border-collapse:collapse;'>";
                    $topics .= "<tr style='background-color: #EA5555; text-align:center;'><td colspan='2'><a href='forumindex.php'><i class='fas fa-home'></i> Return to Forum Index</a>".$logged."</td></tr>";
                    $topics .= "<tr>
                    <td style='color:black; text-align:center;'><b>Post Titles</b></td>
                    <td style='color:black; padding-top:10px; text-align:center;'><b>Posted By</b></td>
                    </tr>
                    <tr><td colspan='2'><hr></td></tr>";
                    while ($row=mysqli_fetch_assoc($queryresult2)){
                        $tid = $row['ID'];
                        $title = $row['Topic_Title'];
                        $creator = $row['Topic_Author'];
                        $topics.= "<tr><td style='color:black; margin-bottom:5px;'><a id='tableLinks'  href='view_topic.php?cid=".$cat_id."&tid=".$tid."'><i class='fas fa-envelope' style='color:black; padding-right:5px;'></i>".$title."</a></td>

                       <td style='text-align:center;'><span class='postinfo'><i class='fas fa-user'></i> ".$creator."</span></td></tr>";
                        $topics .= "<tr><td colspan='2'> <hr> </td></tr>";
                    }
                  echo $topics .= "</table>";
                }else{
                    echo "<p class='cat_links' style='text-align:center; color: #FF5733;'><a href='forumindex.php'><i class='fas fa-home'></i> Return Home ".$logged." </a><br> Error: There are no posts in this category yet."; echo"</p>"; 
                }
            }else{
                echo "<p class='cat_links' style='text-align:center; color: #FF5733;'><a href='forumindex.php'><i class='fas fa-home'></i> Return Home |</a> Error: This category does not exist.</p>";
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