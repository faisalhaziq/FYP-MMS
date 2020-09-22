<?php
session_start();
  if (!(isset($_SESSION['adminUser']) && $_SESSION['adminUser'] != '')) {

  header ("Location: adminlogin.php");
  }
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800" style="margin-left:10px;">Applications</h1>
  </div>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-danger">Manage Mentor Applications 
    </h5>
    <i class="fas fa-exclamation-circle text-warning"></i> Please verify their transcripts, and approve <span class="font-weight-bold"><u>ONLY</u></span> if CGPA >=3.50 <span class="font-weight-bold"><u>AND</u></span> chosen subject is A- or above.
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="9%">Student ID </th>
            <th>Student Name</th>
            <th width="27%">Subject Name</th>
            <th style="text-align:center;" width="15%">RESULTS TRANSCRIPT</th>
            <th style="text-align:center;">APPROVE</th>
            <th style="text-align:center;">DENY</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');
          $sql = "SELECT App_ID, Stud_ID, Stud_Name, Sub_Name, CGPA, `path` FROM mentorapp WHERE 1";
          $res = mysqli_query($con, $sql);
          if(mysqli_num_rows($res)==0){
            echo "<tr>";
            echo "<td><b>NULL</b></td>";
            echo "<td id='name'>NULL</td>";
            echo "<td>NULL</td>";
            echo "<td>NULL</td>";
            echo "<td>NULL</td>";
            echo "<td>NULL</td>";
            echo "</tr>";
            echo "</table>";
          }
          while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>"; echo $row['Stud_ID']; echo "</td>";
            echo "<td>"; echo $row['Stud_Name']; echo "</td>";
            echo "<td>"; echo $row['Sub_Name']; echo "</td>";
            echo "<td align=center>";?> <a download="<?php echo $row['path'];?>" href='../download.php?dow=<?php echo $row['path'];?>'><button type="submit" name="Accept" class="btn btn-primary"> <i class="fas fa-cloud-download-alt"></i> Download CGPA</button></a><?php echo "</td>";
            ?>
            <td align="center">
              <form action="processMentorApp.php?ID=<?php echo $row['Stud_ID'];?>" method="post">
              <input type="hidden" name="approve_id" value="">
              <button type="submit" name="Accept" class="btn btn-success"> <i class="fas fa-user-check"></i></button>
              </form>
            </td>
            
            <td align="center">
                <form action="processMentorApp.php?ID=<?php echo $row['Stud_ID'];?>" method="post">
                  <input type="hidden" name="deny_id" value="">
                  <button type="submit" name="Deny" class="btn btn-danger"><i class="fas fa-user-times"></i></button>
                </form>
            </td>
          </tr>
          <?php
          }
          ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

  <div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-danger">Manage Mentorship Applications 
    </h5>
    <i class="fas fa-exclamation-circle text-warning"></i> Please assign a suitable Mentor for each application.
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Application ID</th>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Subject Name</th>
            <th>Mentor Name</th>
            <th style="text-align:center;">ASSIGN</th>
            <th style="text-align:center;">DONE </th>
            <th style="text-align:center;">DELETE </th>
            
          </tr>
        </thead>
        <tbody>
     <?php 
          $con = NEW MySQLi('remotemysql.com', 'TyBWPKoHqN', 'zoxpqL6tTl','TyBWPKoHqN');
          $s = "SELECT App_ID, Stud_Name, Stud_ID, Sub_Name, Mentor_Name FROM `mentorshipapp` WHERE 1";
          $res = mysqli_query($con, $s);
          if(mysqli_num_rows($res)==0){
            echo "<tr>";
            echo "<td><b>NULL</b></td>";
            echo "<td id='name'>NULL</td>";
            echo "<td>NULL</td>";
            echo "<td>NULL</td>";
            echo "<td>NULL</td>";
            echo "<td>NULL</td>";
            echo "</tr>";
            echo "</table>";
          }
          while($row = mysqli_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>"; echo $row['App_ID']; echo "</td>";
            echo "<td>"; echo $row['Stud_ID']; echo "</td>";
            echo "<td>"; echo $row['Stud_Name']; echo "</td>";
            echo "<td>"; echo $row['Sub_Name']; echo "</td>";
            if($row['Mentor_Name'] == 'NONE' || $row['Mentor_Name'] == NULL ){
              echo "<form action='processMentorshipApp.php?sid=".$row['Stud_ID']."' method='post'>";
              echo '<td align="center"><select class="form-control" name="mentorid">';
              $sql2 = "SELECT Mentor_ID, Sub_Name FROM mentor";
              $res2 = mysqli_query($con, $sql2);
              while($row2 = mysqli_fetch_assoc($res2))
              {
                $sub = $row2['Sub_Name'];
                $mentorid = $row2['Mentor_ID'];
                echo "<option value='$mentorid' >$mentorid for $sub</option>";
              }
              echo '</select>';
              echo '</td>';
              echo '<td align="center">
              <button type="submit" name="Assign" class="btn btn-success"> <i class="fas fa-user-plus"></i></button>
              </form>
            </td>';
            }else{
              echo "<td>"; echo $row['Mentor_Name']; echo "</td>";
              echo '<td align="center">
              <button type="submit" name="Assign" class="btn btn-muted"> <i class="fas fa-user"></i></button>
              </form>
            </td>';
            }
            
            ?>
            <td align="center">
            <?php  
            $sql3 = "SELECT Mentor_ID FROM mentorshipapp WHERE App_ID = '".$row['App_ID']."' ";
            $res3 = mysqli_query($con, $sql3);
            while($row2 = mysqli_fetch_assoc($res3))
            {
              $mentorid = $row2['Mentor_ID'];  
              echo "<form action='processMentorshipApp.php?mID=$mentorid' method='post'>";
            }?>
                  <input type="hidden" name="appid" value="<?php echo $row['App_ID'];?>">
                  <button type="submit" name="Done" class="btn btn-warning"><i class="fas fa-user-minus"></i></button>
                </form>
            </td>

            <td align="center">
                <form action="processMentorshipApp.php" method="POST">
                  <input type="hidden" name="appid" value="<?php echo $row['App_ID'];?>">
                  <button type="submit" name="Delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
            
          </tr>
          <?php
          }
          ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>