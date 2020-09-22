<?php
    include '../checking.php';
    if (!(isset($_SESSION['userID']) && $_SESSION['userID'] != '')) {

    echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="../login.php";</script>';
    }

    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'fyp');  
?>
<!DOCTYPE html>
<html>
<head>
    <title>MMS - Forum Post</title>
    <link rel="stylesheet" type="text/css" href="../css/fontawesome-free-5.14.0-web/css/all.css">
    <link rel="stylesheet" href="../css/forumhome.css">
</head>
<body>
<header style="height:150vh;">
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
                <i class="fas fa-user"></i> Logged in as  <?php
                $student = "SELECT (Stud_Name) from student WHERE Stud_ID = ".$_SESSION['userID'].""; 
                $result = mysqli_query($con,$student);
                while($row=mysqli_fetch_assoc($result)){
                    echo '<b>'; echo $row['Stud_Name']; echo '</b>';
                    echo '<span class="titledesc">
                    &bull; Viewing Post 
                    </span>';
                }
                ?>
                <hr style="margin-top:10px;">
            </span>
        </div>
        <div id="topics">
        <?php
            $cid = $_GET['cid'];
            $tid = $_GET['tid'];
            $sql = "SELECT * FROM forum_topics WHERE Cat_ID='".$cid."' AND ID='".$tid."' LIMIT 1";
            $res = mysqli_query($con, $sql);

            if(mysqli_num_rows($res)==1){
                while ($row = mysqli_fetch_assoc($res)){
                    $sql2 = "SELECT * FROM forum_posts WHERE Cat_ID='".$cid."' AND Topic_ID='".$tid."'";
                    $res2 = mysqli_query($con, $sql2);
                    echo "<table width='100%' style='border-collapse:collapse;'>";
                    echo "<tr style='background-color: #EA5555; text-align:center;'>
                    <td colspan='2'><a href='viewcategory.php?ID=".$cid."'><i class='fas fa-arrow-circle-left'></i> Return to Topics</a></td>
                    </tr>";
                    echo "<tr>
                    <td style='color:black; padding-top:10px; text-align:center;'>Post Title - <b>".$row['Topic_Title']."</b></td>
                    <td style='color:black; padding-top:10px; text-align:center;'><b>Posted By</b></td>
                    </tr>";
                    while($row2 = mysqli_fetch_assoc($res2)){
                        echo "<tr style='border-top:1px solid black; border-bottom:1px solid black;'><td style='background-color:#ddd; color:black; text-align:left; padding-left:30px; max-width:300px; overflow-wrap: break-word;'>".$row2['Post_Content']."</td>";
                        echo "<td style='background-color:#ddd; color:black; text-align:center;'><i class='fas fa-user fa-5x fa-border' style='padding-bottom:5px; color:#EA5555;'></i><br>".$row2['Post_Creator']."</td></tr>";
                    }
                    echo "<tr><td colspan='2' style='background-color:#EA5555; text-align:center;'><a href='post_reply.php?cid=".$cid."&tid=".$tid."'>Reply</a></td></tr></table>";
                    
                }          
            }else{
                echo "<p> This topic does not exist</p>";
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