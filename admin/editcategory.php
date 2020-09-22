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

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-danger">Forum Categories</h5>
      <div class="card-body">
        <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Category Name" required>
            </div>
        <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control" name="desc" required></textarea>
            </div>     
        </div>
    </div>
  </div>   
  <!-- Content Row -->

  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>