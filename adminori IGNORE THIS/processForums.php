<?php 
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'fyp');

	if(isset($_POST['Add'])){
		$id = $_POST['id'];
		$catName = $_POST['name'];
		$catDesc = $_POST['desc'];

		$sql = "INSERT INTO forum_category (ID ,Category_Name, Category_Desc) VALUES (NULL, '$catName', '$catDesc')";
		mysqli_query($con, $sql);
		echo '<script language="javascript">alert("Category successfully added!"); setTimeout(window.location.href="manageForums.php",2000);</script>';
	}

	if(isset($_POST['Del'])){
		$id = $_POST['id'];
		$sql = "DELETE from forum_category WHERE ID='$id'";
		mysqli_query($con, $sql);
		$sql2 = "DELETE from forum_topics WHERE Cat_ID='$id'";
		mysqli_query($con, $sql2);
		$sql3 = "DELETE from forum_posts WHERE Cat_ID='$id'";
		mysqli_query($con, $sql3);
		echo '<script language="javascript">alert("Category successfully deleted!"); setTimeout(window.location.href="manageForums.php",2000);</script>';
	}

	if(isset($_POST['Edit'])){
		$id = $_POST['id'];
		$catName = $_POST['name'];
		$catDesc = $_POST['desc'];

		$sql = "UPDATE forum_category SET Category_Name='$catName', Category_Desc='$catDesc' WHERE ID= '$id'";
		mysqli_query($con, $sql);
		echo '<script language="javascript">alert("Category successfully edited!"); setTimeout(window.location.href="manageForums.php",2000);</script>';
	}
	
?>