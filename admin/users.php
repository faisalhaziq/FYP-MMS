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
    <h1 class="h3 mb-0 text-gray-800" style="margin-left:10px;">Users</h1>
  </div>

  <!-- Content Row -->
  <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-danger">User List 
    </h5>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Student Status</th>
          </tr>
        </thead>
        <tbody>
     
         <?php
          $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');
          $s = "SELECT Stud_ID, Stud_Name, Stud_Status FROM `student` WHERE 1 ORDER BY Stud_Name ASC";
          $result = mysqli_query($con, $s);
         while($row=mysqli_fetch_assoc($result))
        {
          echo "<tr>";
          echo "<td>"; echo $row['Stud_ID']; echo "</td>";
          echo "<td>"; echo $row['Stud_Name']; echo "</td>";
          echo "<td class='text-success'>"; 
          if(strpos($row['Stud_Status'], 'Mentor') !== FALSE){
            echo "<span class='text-danger'><b>"; echo $row['Stud_Status']; echo "</b></span>";
          }else{
            echo $row['Stud_Status'];
          }
          echo "</td>";
          echo "</tr>";
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