<?php
session_start();
  if (!(isset($_SESSION['adminUser']) && $_SESSION['adminUser'] != '')) {

  header ("Location: adminlogin.php");
  }
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left:10px;">Editing</h1>
  </div>

  <div class="card shadow mb-4" style="width: 400px;">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-danger">Edit Forum Category</h5>
      <div class="card-body">
      <?php
        $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');
        if(isset($_POST['edit'])){
          $catid = $_POST['id'];
          $sql = "SELECT * FROM forum_category where ID='$catid'";
          $res = mysqli_query($con,$sql);
          foreach($res as $row)
          {
            ?>
        <form action="processForums.php" method="post">
        <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $catid?>">
                <label>Category Name</label>
                <input type="text" name="name" value="<?php echo $row['Category_Name']?>" class="form-control" placeholder="Enter Category Name" required>
            </div>
        <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control" name="desc" rows="7" required><?php echo $row['Category_Desc'] ?></textarea>
            </div>    
            <?php
          }
        }
      ?> 
      <a href="forums.php" class="btn btn-danger" style="float:right;">Cancel</a>
      <button type="submit" name="Edit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>   
  <!-- Content Row -->

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>