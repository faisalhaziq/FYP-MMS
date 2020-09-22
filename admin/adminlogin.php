<?php
session_start();
include('includes/header.php'); 
?>

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-5 col-lg-5 col-md-5" style="margin-top:200px;">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <img src="../images/adminlogo.png" class="mb-3" style="width:80%;">
                <h1 class="h4 text-gray-900 mb-4 pb-4">Login to access Dashboard!</h1>
              </div>

                <form class="user" action="adminvalidation.php" method="POST">
                    <div class="form-group">
                    <input type="text" name="adminUser" class="form-control form-control-user" placeholder="Username" autocomplete=off>
                    </div>
                    <div class="form-group">
                    <input type="password" name="pw" class="form-control form-control-user" placeholder="Password">
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-danger btn-user btn-block"> Login </button>
                    <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('includes/scripts.php'); 
?>