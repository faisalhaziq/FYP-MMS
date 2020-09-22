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
    <h1 class="h3 mb-0 text-gray-800" style="margin-left:10px;">Mentors </h1>
  </div>

  <!-- Content Row -->
  <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-danger">Mentor List
    </h5>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Mentor ID</th>
            <th>Mentor Name</th>
            <th>Subject</th>
            <th>Mentoring</th>
          </tr>
        </thead>
        <tbody>
     
         <?php
          $con = mysqli_connect('localhost', 'root', '');
          mysqli_select_db($con, 'fyp');
          $s = "SELECT Mentor_ID, Mentor_Name, Sub_Name, Mentee_Name FROM `mentor` ORDER BY Mentor_Name ASC";
          $result = mysqli_query($con, $s);
          if(mysqli_num_rows($result)==0){
              echo "<tr>";
              echo "<td>NULL</td>";
              echo "<td>NULL</td>";
              echo "<td>NULL</td>";
              echo "<td>NULL</td>";
              echo "</tr>";
              echo "</table>";
            }else{
          while($row=mysqli_fetch_assoc($result))
          {
            echo "<tr>";
            echo "<td>"; echo $row['Mentor_ID']; echo "</td>";
            echo "<td>"; echo $row['Mentor_Name']; echo "</td>";
            echo "<td class='text-primary'>"; echo $row['Sub_Name']; echo "</td>";
            echo "<td>"; echo $row['Mentee_Name']; echo "</td>";
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
  <!-- Content Row -->

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>