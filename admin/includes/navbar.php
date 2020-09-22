   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-text mx-3 "><img src="img/logo.png" style="width:100%; height:50%;"></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Manage
</div>
<li class="nav-item">
  <a class="nav-link" href="applications.php">
    <i class="fas fa-user-plus" ></i>
    <span>Applications</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="users.php">
    <i class="fas fa-users" ></i>
    <span>Users</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="mentors.php">
    <i class="fas fa-users" ></i>
    <span>Mentors</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="forums.php">
    <i class="fas fa-comments" ></i>
    <span style="margin-left:2px;">Forums</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="subjects.php">
    <i class="fas fa-book" ></i>
    <span style="margin-left:2px;">&nbsp;Subjects</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="notes.php">
    <i class="fas fa-book-open" ></i>
    <span style="margin-left:2px;">Notes</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
<hr class="sidebar-divider d-none d-md-block">
<p class="nav-item" style="font-size:10pt; color:white; text-align:center;"><i class="far fa-copyright"></i> 2020 MMS. <br>All rights reserved.<br></p>
</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-danger small" >
                  
               <?php echo "Hello, <b>"; echo $_SESSION['adminUser']; echo "!</b>"; ?>
                  
                </span>
                <i class="fas fa-user"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" onMouseOver="this.style.color='red'" onMouseOut="this.style.color=''">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="adminlogout.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-danger">Logout</button>

          </form>


        </div>
        
      </div>
    </div>
  </div>
