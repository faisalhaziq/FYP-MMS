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
    <h1 class="h3 mb-0 text-gray-800" style="margin-left:10px;">Dashboard</h1>
    <!-- Clock -->
    <div class="col-md-3">
    <div class="card bg-danger text-white">
    <h3 class="card-title text-center">
    <div class="d-flex flex-wrap justify-content-center mt-2">
      <a><span class="badge">Time: </span></a>
    <a><span class="badge hours"></span></a>:
    <a><span class="badge min"></span></a>:
    <a><span class="badge sec"></span></a> 
    </div>
    </h3>
    </div>
    </div>
    <!-- End Clock -->
  </div>

  <!-- Content Row -->
  <div class="row col d-flex justify-content-center" style="margin-top:100px;">

  <!-- Admin Card -->
    <div class="col-xl-3 col-md-6 mb-4 ">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Total Admins</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

               <h4>
               <?php
                $con = mysqli_connect("localhost","root","","fyp");
                $sql = "SELECT COUNT(ID) as total from admin";
                $res = mysqli_query($con,$sql);

                while($row = mysqli_fetch_assoc($res)){
                echo $row["total"];
                }
              ?></h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-danger"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Mentors Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">Total Mentors</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <h4> 
              <?php
              $con = mysqli_connect("localhost","root","","fyp");
                $sql = "SELECT COUNT(ID) as total from mentor";
                $res = mysqli_query($con,$sql);

                while($row = mysqli_fetch_assoc($res)){
                echo $row["total"];
                }
              ?>
                
              </h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-graduate fa-2x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- User Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl; font-weight-bold text-success text-uppercase mb-1">Total Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <h4>
              <?php
              $con = mysqli_connect("localhost","root","","fyp");
                $sql = "SELECT COUNT(ID) as total from student";
                $res = mysqli_query($con,$sql);

                while($row = mysqli_fetch_assoc($res)){
                echo $row["total"];
                }
              ?>
                
              </h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Subjects Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">Total Subjects</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <h4> 
              <?php
              $con = mysqli_connect("localhost","root","","fyp");
                $sql = "SELECT COUNT(ID) as total from subject";
                $res = mysqli_query($con,$sql);

                while($row = mysqli_fetch_assoc($res)){
                echo $row["total"];
                }
              ?>
                
              </h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-book fa-2x text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Subjects Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Total Forum Categories</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <h4> 
              <?php
              $con = mysqli_connect("localhost","root","","fyp");
                $sql = "SELECT COUNT(ID) as total from forum_category";
                $res = mysqli_query($con,$sql);

                while($row = mysqli_fetch_assoc($res)){
                echo $row["total"];
                }
              ?>
                
              </h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-danger"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Subjects Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">Active Mentorships</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <h4> 
              <?php
              $con = mysqli_connect("localhost","root","","fyp");
                $sql = "SELECT COUNT(ID) as total from student WHERE Mentor_Name != 'NULL'";
                $res = mysqli_query($con,$sql);

                while($row = mysqli_fetch_assoc($res)){
                if($row["total"]==0){
                  echo "NONE";
                }else{
                echo $row["total"];
                }
              }
              ?>
                
              </h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mentor App Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-success text-uppercase mb-1">New Mentor Applications</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <h4> 
              <?php
              $con = mysqli_connect("localhost","root","","fyp");
                $sql = "SELECT COUNT(App_ID) as total from mentorapp";
                $res = mysqli_query($con,$sql);

                while($row = mysqli_fetch_assoc($res)){
                if($row["total"]==0){
                  echo "NONE";
                }else{
                echo $row["total"];
                }
                }
              ?>
                
              </h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-plus fa-2x text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mentor App Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">New Mentorship Applications</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

              <h4> 
              <?php
              $con = mysqli_connect("localhost","root","","fyp");
                $sql = "SELECT COUNT(App_ID) as total from mentorshipapp";
                $res = mysqli_query($con,$sql);

                while($row = mysqli_fetch_assoc($res)){
                if($row["total"]==0){
                  echo "NONE";
                }else{
                echo $row["total"];
                }
                }
              ?>
                
              </h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-plus fa-2x text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- Content Row -->

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>