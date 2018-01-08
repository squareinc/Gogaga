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

    $iframeUrl = "";


    //get the sno of the partner
    switch ($type) {
      case "salespartner":
        $iframeUrl = "https://docs.google.com/document/d/e/2PACX-1vSNbm0a9k96P25-jLV0P8Trj1gvvPCZRjN-eA3NOBjlLlazmUVE901ANJS4L_L3y-oS2_uRpo26iffs/pub?embedded=true";
        break;

       case "holidaypartner":
        $iframeUrl = "https://docs.google.com/document/d/e/2PACX-1vRLrGnqKzhDXkQ645cnc3rVSguoJbuGs2vezyetVUnGkmUlVk_Tm5FH341X59bi7sh0IeTYaZq7iDp6/pub?embedded=true";
        break;

      case "superpartner":
        $iframeUrl = "https://docs.google.com/document/d/e/2PACX-1vT0u6M51pnjIdVv8xOixxguvssWtZ9qOxur9PtBmmt3fmhOnh1p3qfmwp7VDT_NGES4jP-qER7JqDR2/pub?embedded=true";
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
    $("#sidebar-terms-conditions").addClass("active");
  </script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <center>
      <h1><strong>
         Terms &amp; Conditions  
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
                  <iframe src="<?php echo $iframeUrl; ?>" width="1024" height="1024"></iframe>
              
               

                                 
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

