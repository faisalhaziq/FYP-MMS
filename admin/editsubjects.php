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
    <h1 class="h3 mb-0 text-gray-800">/ Editing</h1>
  </div>

  <div class="card shadow mb-4" style="width: 400px;">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-danger">Edit Subject</h5>
      <div class="card-body">
      <?php
        $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');
        if(isset($_POST['edit'])){
          $ID = $_POST['id'];
          $sql = "SELECT * FROM subject where ID='$ID'";
          $res = mysqli_query($con,$sql);
          foreach($res as $row)
          {
            ?>
        <form action="processSubject.php" method="post">
        <div class="form-group">
                <label>Subject ID</label>
                <input type="hidden" name="id" value="<?php echo $row['ID']?>">
                <input type="text" name="sub_id" value="<?php echo $row['Sub_ID']?>"class="form-control" placeholder="Enter Subject ID" required>
            </div>
            <div class="form-group">
                <label>Subject Name</label>
                <input type="text" name="name" value="<?php echo $row['Sub_Name']?>" class="form-control" placeholder="Enter Subject Name" required>
            </div>         
            <?php
          }
        }
      ?> 
      <a href="subjects.php" class="btn btn-danger" style="float:right;">Cancel</a>
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