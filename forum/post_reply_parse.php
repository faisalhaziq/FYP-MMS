<?php
	include '../checking.php';
    if (!(isset($_SESSION['userID']) && $_SESSION['userID'] != '')) {

    echo '<script language="javascript">alert("Please login to view this page!"); window.location.href="../login.php";</script>';
    }
    $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');

    if (isset($_POST['submit'])){
    	$author = $_SESSION['userID'];
    	$cid = $_POST['cat_id'];
    	$tid = $_POST['tid'];
    	$reply_content = $_POST['reply_content'];
    	$sql = "INSERT INTO forum_posts (Cat_ID, Topic_ID, Post_Creator, Post_Content) VALUES ('".$cid."', '".$tid."', '".$author."', '".$reply_content."')";
    	$res = mysqli_query($con, $sql);
    	$sql2 = "UPDATE forum_topics SET Topic_Last_User='".$author."' WHERE ID='".$tid."' LIMIT 1";
    	$res2 = mysqli_query($con, $sql2);

    	if (($res) && ($res2)){
    		echo "<script language='javascript'>alert('Reply Success!'); window.location.href='view_topic.php?cid=".$cid."&tid=".$tid."';</script>";
    	}else{
    		echo "<script language='javascript'>alert('Error in replying to the post!'); window.location.href='view_topic.php?cid=".$cid."&tid=".$tid."';</script>";
    	}
    }

?>