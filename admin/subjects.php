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
        <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="processSubject.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label>Subject ID</label>
                <input type="text" name="id" class="form-control" placeholder="Enter Subject ID" maxlength="7" autocomplete=off required>
                <small id="passwordHelpBlock" class="form-text text-danger">
        Subject ID MUST follow the format. </small>
            </div>
            <div class="form-group">
                <label>Subject Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Subject Name" autocomplete=off required>
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
    <h1 class="h3 mb-0 text-gray-800" style="margin-left:10px;">Subjects </h1>
  </div>

  <!-- Content Row -->
  <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-danger">Subject List&nbsp; 
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addsubject">
              <i class="fas fa-plus"></i>&nbsp;Add Subject
            </button>
    </h5>
  </div>

  <div class="card-body">
    <?php
    if (isset($_GET['added']) && $_GET['added'] == 1 )
    {
        echo     "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <i class='fas fa-check-circle'></i> 
                  Subject has been added!</div>";
    }else if(isset($_GET['delete']) && $_GET['delete'] == 1 ){
        echo     "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <i class='fas fa-exclamation-circle'></i> 
                  Subject has been deleted!</div>";
    }else if(isset($_GET['edited']) && $_GET['edited'] == 1 ){
        echo     "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <i class='fas fa-edit'></i> 
                  Subject has been edited!</div>";
    }else if(isset($_GET['failed']) && $_GET['failed'] == 1 ){
        echo     "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <i class='fas fa-exclamation-circle'></i> 
                  Subject already exists!</div>";
    }
    ?>
    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Subject ID</th>
            <th>Subject Name</th>
            <th style="text-align:center;">EDIT</th>
            <th style="text-align:center;">DELETE</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $con = mysqli_connect('localhost', 'root', '');
          mysqli_select_db($con, 'fyp');
          $s = "SELECT * FROM subject";
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
              echo '<td align="center">
                    <form action="editsubjects.php" method="post">
                        <input type="hidden" name="id" value="'.$row['ID'].'">
                        <button type="submit" name="edit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                        </form>
                    </td>
                    <td align="center">
                        <form action="processSubject.php" method="post">
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
</div>
<div class="card shadow mb-4" style="margin-left:auto; margin-right:auto; width:30%;">
  <div class="card-header py-3">
    <form action="clearNotes.php" method="POST">
    <h5 class="m-0 font-weight-bold text-danger">Manage Subject Requests
    <button type="submit" name="Clear" class="btn btn-warning ml-1">
              <i class="fas fa-trash-alt"></i>&nbsp;Clear
            </button></h5>
    </form>
    <i class="fas fa-exclamation-circle text-warning"></i> Please ensure subjects & notes are updated daily!
  
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Subject ID</th>
            <th>Subject Name</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $con = mysqli_connect("localhost","root","","fyp");
          $sql = "SELECT Sub_ID, Sub_Name from notes";
          $res = mysqli_query($con, $sql);
          if(mysqli_num_rows($res)==0){
            echo "<tr>";
            echo "<td>NULL</td>";
            echo "<td>NULL</td>";
            echo "</tr>";
            echo "</table>";
          }
          while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>"; echo $row['Sub_ID']; echo "</td>";
            echo "<td>"; echo $row['Sub_Name']; echo "</td>";
            ?>
          </tr>
          <?php
          }
          ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>
  <!-- Content Row -->

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>