<?php 
	$con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');

	if(isset($_POST['Add'])){
		$catName = $_POST['name'];
		$catDesc = $_POST['desc'];

		$sql = "INSERT INTO forum_category (Category_Name, Category_Desc) VALUES ('$catName', '$catDesc')";
		mysqli_query($con, $sql);
		header('Location: forums.php?added=1');
	}

	if(isset($_POST['Del'])){
		$id = $_POST['id'];
		$sql = "DELETE from forum_category WHERE ID='$id'";
		mysqli_query($con, $sql);
		$sql2 = "DELETE from forum_topics WHERE Cat_ID='$id'";
		mysqli_query($con, $sql2);
		$sql3 = "DELETE from forum_posts WHERE Cat_ID='$id'";
		mysqli_query($con, $sql3);
		header('Location: forums.php?deleted=1');
	}

	if(isset($_POST['Edit'])){
		$id = $_POST['id'];
		$catName = $_POST['name'];
		$catDesc = $_POST['desc'];
		echo $catName;
		echo $catDesc;
		$sql = "UPDATE forum_category SET Category_Name='$catName', Category_Desc='$catDesc' WHERE ID= '$id'";
		mysqli_query($con, $sql);
	    header('Location: forums.php?edited=1');
	}
	
?>