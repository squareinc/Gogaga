<?php 
include "../config.php";
session_start();

if(!isset($_SESSION["userid"]))
{
  header('Location:../index.php');
}else{
    $userid = $_SESSION["userid"];
    $username = $_SESSION['username'];
    $password = $_SESSION["password"];
    $type = $_SESSION["type"];

      $msg = "";
      $class = "";

    //get the sno of the partner
    switch ($type) {
      case "salespartner":
        $sql = "SELECT * FROM salespartners WHERE email = '$userid'";
        $res = $conn->query($sql);
         if ($res->num_rows) 
         {  
           if($row = $res->fetch_assoc()){
            $sno = $row["sno"];
            $district = $row["district"];
            $state = $row["state"];
            $bankac = $row["bankac"];
            $bankname = $row["bankname"];
            $phone = $row["phone"];
            $name = $row["name"];
           }
        } 
        break;

       case "holidaypartner":
        $sql = "SELECT * FROM holidaypartners WHERE email = '$userid'";
        $res = $conn->query($sql);
         if ($res->num_rows) 
         {  
           if($row = $res->fetch_assoc()){
            $sno = $row["sno"];
            $district = $row["district"];
            $state = $row["state"];
            $bankac = $row["bankac"];
            $bankname = $row["bankname"];
            $phone = $row["phone"];
            $name = $row["name"];
           }
        } 
        break;

      case "superpartner":
        $sql = "SELECT * FROM superpartners WHERE email = '$userid'";
        $res = $conn->query($sql);
         if ($res->num_rows) 
         {  
           if($row = $res->fetch_assoc()){
            $sno = $row["sno"];
            $district = $row["district"];
            $state = $row["state"];
            $bankac = $row["bankac"];
            $bankname = $row["bankname"];
            $phone = $row["phone"];
            $name = $row["name"];
           }
        } 
        break;
          
      default:
        # code...
        break;
    }
}

include "admin-header.php";
include "admin-sidebar.php";


?>

<script>
    //$("#sidebar-tools").addClass("active");
</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
 
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--
        | Your Page Content Here |
       -->

       <?php

         if(isset($_POST["update"])){
          //update the details
          $name = $_POST["name"];
          $phone = $_POST["phone"];
          $bankac = $_POST["bankac"];
          $bankname = $_POST["bankname"];
          $district = $_POST["district"];
          $state = $_POST["state"];
          


          switch ($type) {
                      case "salespartner":
                        //insert into salespartner
                          $sql = "UPDATE salespartners SET name = '$name', phone = '$phone', bankac = '$bankac', bankname = '$bankname', district = '$district', state = '$state'";
                                          
                            //echo $sql;
                          if($conn->query($sql) == true)
                          {
                            //success
                            
                            $sql = "UPDATE login SET username = '$name', contact = '$phone' WHERE userid = '$userid'";
                          

                          if($conn->query($sql) == true){
                             //success
                            $class = "alert-success";
                            $msg .= "Successfully updated!";
                            }else{
                            $class = "alert-danger";
                            $msg .= "Error updating!";
                            }
                          }else{
                            $class = "alert-danger";
                            $msg .= "Error updating!";
                            }

                        break;

                      case "holidaypartner":
                        //insert into salespartner
                          $sql = "UPDATE holidaypartners SET name = '$name', phone = '$phone', bankac = '$bankac', bankname = '$bankname', district = '$district', state = '$state'";

                          if($conn->query($sql) == true)
                          {
                             $sql = "UPDATE login SET username = '$name', contact = '$phone' WHERE userid = '$userid'";
                          

                          if($conn->query($sql) == true){
                             //success
                            $class = "alert-success";
                            $msg .= "Successfully updated!";
                            }else{
                            $class = "alert-danger";
                            $msg .= "Error updating!";
                            }
                          }else{
                            $class = "alert-danger";
                            $msg .= "Error updating!";

                          }

                        break;

                      case "superpartner":
                        //insert into salespartner
                          $sql = "UPDATE superpartners SET name = '$name', phone = '$phone', bankac = '$bankac', bankname = '$bankname', district = '$district', state = '$state'";

                          if($conn->query($sql) == true)
                          {
                             $sql = "UPDATE login SET username = '$name', contact = '$phone' WHERE userid = '$userid'";
                          

                          if($conn->query($sql) == true){
                             //success
                            $class = "alert-success";
                            $msg .= "Successfully updated!";
                            }else{
                            $class = "alert-danger";
                            $msg .= "Error updating!";
                            }
                          }else{
                            $class = "alert-danger";
                            $msg .= "Error updating!";

                          }

                        break;
                      
                      default:
                        # code...
                        break;
                    }

         }


       ?>

        <div class="row">
        <div class="col-md-6 col-md-push-1">
          
          <div class="alert <?php echo $class; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                
               <?php echo $msg ?>
          </div>
          <div class="box box-primary">
            
            <div class="box-header with-border"><h3>Profile</h3></div>

            <div class="box-body">
            	
            <form method="POST">
              
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" value='<?php if(isset($name)){ echo $name; } ?>' class="form-control">
                </div>
                <div class="form-group">
                  <label for="name">User ID</label>
                  <input type="text" name="uid" value='<?php if(isset($userid)){ echo $userid; } ?>' class="form-control" disabled>
                </div>

                <div class="form-group">
                  <label for="name">Phone</label>
                  <input type="text" name="phone" value='<?php if(isset($phone)){ echo $phone; } ?>' class="form-control">
                </div>
                <div class="form-group">
                  <label for="bankac">Bank A/C No.</label>
                  <input type="text" name="bankac" value='<?php if(isset($bankac)){ echo $bankac; } ?>' class="form-control">
                </div>
                <div class="form-group">
                  <label for="bankname">Bank Name</label>
                  <input type="text" name="bankname" value='<?php if(isset($bankname)){ echo $bankname; } ?>' class="form-control">
                </div>
                <div class="form-group">
                  <label for="district">District</label>
                  <input type="text" name="district" value='<?php if(isset($district)){ echo $district; } ?>' class="form-control">
                </div>
                <div class="form-group">
                  <label for="state">State</label>
                  <input type="text" name="state" value='<?php if(isset($state)){ echo $state; } ?>' class="form-control">
                </div>

                <button class="btn btn-success" name="update">Update Details</button>


            </form>


            	
            </div>
      
        
          </div> <!--/box-->
       </div>
        <!-- /.col -->
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

include "admin-footer.php";

?>
