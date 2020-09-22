<?php
session_start();
  if (!(isset($_SESSION['adminUser']) && $_SESSION['adminUser'] != '')) {

  header ("Location: adminlogin.php");
  }
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<!-- ADD MODAL -->
<div class="modal fade" id="addsubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="processNotes.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label>Subject #</label>
                <select class="form-control" name='id'>
          <?php
            $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');
            $resultSet = $con->query("SELECT ID, Sub_Name FROM subject");
            while($rows = $resultSet->fetch_assoc())
            {
              $id = $rows['ID'];
              $subname = $rows['Sub_Name'];
              echo "<option value='$id'>$id - $subname</option>"
;            }
            ?>
        </select>
            </div>
            <div class="custom-file">
            <input type="file" name="file" accept=".zip" class="custom-file-input" id="inputGroupFile01">
            <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
          </div>
       <!--   <div class="form-group">
                <label>Notes File</label>
                <input type="file" name="file" class="form-control p-1" accept=".zip">
            </div>   -->     
        </div>
        <div class="modal-footer">
            <button type="submit" name="Add" class="btn btn-success">Upload</button>
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
    <h1 class="h3 mb-0 text-gray-800" style="margin-left:10px;">Notes</h1>
  </div>

  <!-- Content Row -->
  <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-danger">Notes List&nbsp; 
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addsubject">
             <i class="fas fa-upload"></i>&nbsp;Upload Notes
            </button>
    </h5>
  </div>
  <div class="card-body">
    <?php
    if (isset($_GET['uploaded']) && $_GET['uploaded'] == 1 )
    {
        echo     "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <i class='fas fa-check-circle'></i> 
                  Notes have been uploaded!</div>";
    }else if(isset($_GET['deleted']) && $_GET['deleted'] == 1 ){
        echo     "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <i class='fas fa-exclamation-circle'></i> 
                  Notes have been deleted!</div>";
    }
    ?>
    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Subject ID</th>
            <th>Subject Name</th>
            <th>File Name</th>
            <th style="text-align:center;">DELETE</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');
          $s = "SELECT * FROM `subject` WHERE 1";
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
              echo "<td><b>"; echo $row['Sub_ID']; echo "</b></td>";
              echo "<td id='name'>"; echo $row['Sub_Name']; echo "</td>";
              echo "<td id='name'>"; 
              if($row['notes']!==NULL){
                echo $row['notes']; echo "</td>";
              }
              else{
                echo "Empty"; echo "</td>";
              }
              echo '<td align="center">
                        <form action="processNotes.php" method="post">
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