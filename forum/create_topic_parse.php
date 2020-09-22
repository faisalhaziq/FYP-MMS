<?php
    include '../checking.php';
    if (!(isset($_SESSION['userID']) && $_SESSION['userID'] != '')) {

    echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="../login.php";</script>';
    }
    $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');

    if (isset($_POST['submit'])){
        if (($_POST['topic_title'] == "") && ($_POST['topic_content']== "")){
            echo '<script language="javascript">alert("You did not fill in both fields, returning to Forum Index."); window.location.href="forumindex.php";</script>';
        }else{
            $cid = $_POST['cat_id'];
            $title = $_POST['topic_title'];
            $content = $_POST['topic_content'];
            $author = $_SESSION['userID'];
            $sql = "INSERT INTO forum_topics (Cat_ID, Topic_Title, Topic_Author, Topic_Last_User) VALUES ('".$cid."', '".$title."', '".$author."', '".$author."')";
            $result = mysqli_query($con, $sql);
            $latest_id = $con->insert_id;

            $sql2 = "INSERT INTO forum_posts (Cat_ID, Topic_ID, Post_Creator, Post_Content) VALUES ('".$cid."', '".$latest_id."', '".$author."', '".$content."')";
            $result2 = mysqli_query($con, $sql2);
            if (($result) && ($result2)){
                header("Location: view_topic.php?cid=".$cid."&tid=".$latest_id."");
            }else{
                echo "Error in creating topic. <a href='forumindex.php'>Return to index.</a>";
            }
        }
    }
?>