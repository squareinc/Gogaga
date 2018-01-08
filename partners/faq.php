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

    $sno = "";
    $district = "";
    $state = "";

    //get the sno of the partner
    switch ($type) {
      case "salespartner":
        $sql = "SELECT sno, district, state FROM salespartners WHERE email = '$userid'";
        $res = $conn->query($sql);
         if ($res->num_rows) 
         {  
           if($row = $res->fetch_assoc()){
            $sno = $row["sno"];
            $district = $row["district"];
            $state = $row["state"];
           }
        } 
        break;

       case "holidaypartner":
        $sql = "SELECT sno, district, state FROM holidaypartners WHERE email = '$userid'";
        $res = $conn->query($sql);
         if ($res->num_rows) 
         {  
           if($row = $res->fetch_assoc()){
            $sno = $row["sno"];
            $district = $row["district"];
            $state = $row["state"];
           }
        } 
        break;

      case "superpartner":
        $sql = "SELECT sno, district, state FROM superpartners WHERE email = '$userid'";
        $res = $conn->query($sql);
         if ($res->num_rows) 
         {  
           if($row = $res->fetch_assoc()){
            $sno = $row["sno"];
            $district = $row["district"];
            $state = $row["state"];
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
    $("#sidebar-faq").addClass("active");
  </script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <center>
      <h1><strong>
         FAQ  
      </strong></h1>
      </center>
 
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--
        | Your Page Content Here |
       -->

      <div class="row">

        
          <div class="col-md-12">

      
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <iframe src="https://docs.google.com/document/d/e/2PACX-1vTYmwp_2kx1TyqnQ7U31im40LieO1SaPM3eC6_oW_iAOIZndqz0StHSFbPI0y5xfKSVYvaJAtZgscfZ/pub?embedded=true" width="1024" height="1024"></iframe>
              
               

                                 
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
       
              
      </div>
       </div>

      
        
      </div><!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    
   
  </script>

<?php

include "admin-footer.php";

?>

