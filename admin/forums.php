<?php
session_start();
  if (!(isset($_SESSION['adminUser']) && $_SESSION['adminUser'] != '')) {

  header ("Location: adminlogin.php");
  }
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Forum Category</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="processForums.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Category Name" required>
            </div>
            <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control" name="desc" required></textarea>
            </div>        
        </div>
        <div class="modal-footer">
            <button type="submit" name="Add" class="btn btn-success">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left:10px;">Forum</h1>
  </div>

  <!-- Content Row -->
  <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-danger">Forum Categories 
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addcategory">
              <i class="fas fa-plus"></i>&nbsp;Add Category
            </button>
    </h5>
    <i class="fas fa-exclamation-circle text-warning"></i> MMS v1.0 does not have the function to delete forum posts / replies.
  </div>
  <div class="card-body">
    <?php
    if (isset($_GET['added']) && $_GET['added'] == 1 )
    {
        echo     "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <i class='fas fa-check-circle'></i> 
                  Forum Category has been added!</div>";
    }else if(isset($_GET['deleted']) && $_GET['deleted'] == 1 ){
        echo     "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <i class='fas fa-exclamation-circle'></i> 
                  Forum Category has been deleted!</div>";
    }else if(isset($_GET['edited']) && $_GET['edited'] == 1 ){
        echo     "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <i class='fas fa-edit'></i> 
                  Forum Category has been edited!</div>";
    }
    ?>
    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Category Desc</th>
            <th style="text-align:center;">EDIT</th>
            <th style="text-align:center;">DELETE</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $con = mysqli_connect('localhost', 'root', '');
          mysqli_select_db($con, 'fyp');
          $s = "SELECT * FROM `forum_category` WHERE 1";
          $result = mysqli_query($con, $s);
          if(mysqli_num_rows($result)==0){
          echo "<tr>";
          echo "<td><b>NULL</b></td>";
          echo "<td id='name'>NULL</td>";
          echo "<td>NULL</td>";
          echo "</tr>";
          echo "</table>";
          }
          else
            {
              while($row=mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<td><b>"; echo $row['ID']; echo "</b></td>";
              echo "<td><b>"; echo $row['Category_Name']; echo "</b></td>";
              echo "<td id='name'>"; echo $row['Category_Desc']; echo "</td>";
              echo '<td align="center">
                        <form action="editforumcat.php" method="post">
                        <input type="hidden" name="id" value="'.$row['ID'].'">
                        <button type="submit" name="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                        </form>
                    </td>
                    <td align="center">
                        <form action="processForums.php" method="post">
                          <input type="hidden" name="id" value="'.$row['ID'].'">
                          <button type="submit" name="Del" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>';
              echo "</tr>";
              }
              echo "</table>";
            }
              
          ?>  
        </tbody>
      </table>

    </div>
  </div>
  <!-- Content Row -->

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>