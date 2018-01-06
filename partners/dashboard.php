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

    $intersum = 0;
    $domsum = 0;
    $totReceived = 0;

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

    $_SESSION["partnersno"] = $sno;


}

include "admin-header.php";
include "admin-sidebar.php";

?>

   <script>
    $("#sidebar-dashboard").addClass("active");
  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard  
      </h1>
 
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--
        | Your Page Content Here |
       -->

        <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Itineraries Requested</span>
              <?php
              //get number of requested itineraries

              $sql1= "SELECT COUNT(ref_num) AS requested FROM agent_form_data
                   WHERE sales_partner_name ='".$sno."' and formstatus = 'pending'  
                  ORDER BY ref_num DESC ";

                 $res = $conn->query($sql1) ;
                    if ($res->num_rows)
                    {    
                      if($row = $res->fetch_assoc()){
                        $requested = $row["requested"];
                      }
                    }


              ?>
              <span class="info-box-number"><?php if($requested != ""){ echo $requested; } ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Itineraries Received</span>

               <?php
              //get number of submitted itineraries

              $sql1= "SELECT COUNT(ref_num) AS submitted FROM agent_form_data
                   WHERE sales_partner_name ='".$sno."' and formstatus = 'submitted'  
                  ORDER BY ref_num DESC ";

                 $res = $conn->query($sql1) ;
                    if ($res->num_rows)
                    {    
                      if($row = $res->fetch_assoc()){
                        $submitted = $row["submitted"];
                      }
                    }


              ?>
              <span class="info-box-number"><?php if($submitted != ""){ echo $submitted; } ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total itineraries Confirmed</span>
                     <?php
              //get number of confirmed itineraries

              $sql1= "SELECT COUNT(ref_num) AS confirmed FROM agent_form_data
                   WHERE sales_partner_name ='".$sno."' and formstatus = 'confirmed'  
                  ORDER BY ref_num DESC ";

                 $res = $conn->query($sql1) ;
                    if ($res->num_rows)
                    {    
                      if($row = $res->fetch_assoc()){
                        $confirmed = $row["confirmed"];
                      }
                    }


              ?>
       
              <span class="info-box-number"><?php if($confirmed != ""){ echo $confirmed; } ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Volume Converted</span>

                      <?php
              //get volume of submitted itineraries

               //firstly get the domestic amount count and then international amount count
               //and then add them to get total
               //based on type of partner

               switch ($type) {
                 case "salespartner":
                   $sql1= "SELECT SUM(it.totcostfl) AS intersum FROM itinerary_inter it
                      INNER JOIN agent_form_data a ON (a.ref_num = it.ghrno)
                      WHERE it.salname ='".$sno."' AND a.formstatus = 'confirmed'";

                 $res = $conn->query($sql1) ;
                    if ($res->num_rows)
                    {    
                      if($row = $res->fetch_assoc()){
                        $intersum = (int)$row["intersum"];
                        //echo $intersum;


                      }
                    }


                    $sql2= "SELECT SUM(id.totcostfl) AS domsum FROM itinerary_domestic id
                      INNER JOIN agent_form_data a ON (a.ref_num = id.ghrnno)
                      WHERE id.salname ='".$sno."' AND a.formstatus = 'confirmed'";

                      $res2 = $conn->query($sql2) ;
                    if ($res2->num_rows)
                    {    
                      if($row2 = $res2->fetch_assoc()){
                        $domsum = (int)$row2["domsum"];
                        //echo "domsum:".$domsum;

                      }
                    }

                    $totReceived = $intersum + $domsum;

                   break;

                case "holidaypartner":
                   $sql1= "SELECT SUM(it.totcostfl) AS intersum FROM itinerary_inter it
                      INNER JOIN agent_form_data a ON (a.ref_num = it.ghrno)
                      WHERE it.holiname ='".$sno."' AND a.formstatus = 'confirmed'";

                 $res = $conn->query($sql1);
                    if ($res->num_rows)
                    {    
                      if($row = $res->fetch_assoc()){
                        $intersum = (int)$row["intersum"];
                        //echo $intersum;
                      }
                    }


                      $sql2 = "SELECT SUM(id.totcostfl) AS domsum FROM itinerary_domestic id
                      INNER JOIN agent_form_data a ON (a.ref_num = id.ghrnno)
                      WHERE id.holiname ='".$sno."' AND a.formstatus = 'confirmed'";

                      $res2 = $conn->query($sql2) ;
                    if ($res2->num_rows)
                    {    
                      if($row2 = $res2->fetch_assoc()){
                        $domsum = (int)$row2["domsum"];
                        //echo "domsum:".$domsum;

                      }
                    }

                    $totReceived = $intersum + $domsum;

                   break;


                case "superpartner":
                   $sql1= "SELECT SUM(it.totcostfl) AS intersum FROM itinerary_inter it
                      INNER JOIN agent_form_data a ON (a.ref_num = it.ghrno)
                      WHERE it.supname ='".$sno."' AND a.formstatus = 'confirmed'";

                 $res = $conn->query($sql1) ;
                    if ($res->num_rows)
                    {    
                      if($row = $res->fetch_assoc()){
                        $intersum = (int)$row["intersum"];
                        //echo $intersum;
                      }
                    }

                      $sql2= "SELECT SUM(id.totcostfl) AS domsum FROM itinerary_domestic id
                      INNER JOIN agent_form_data a ON (a.ref_num = id.ghrnno)
                      WHERE id.supname ='".$sno."' AND a.formstatus = 'confirmed'";

                      $res2 = $conn->query($sql2) ;
                    if ($res2->num_rows)
                    {    
                      if($row2 = $res2->fetch_assoc()){
                        $domsum = (int)$row2["domsum"];
                        //echo "domsum:".$domsum;

                      }
                    }

                    $totReceived = $intersum + $domsum;

                   break;
                 
                 default:
                   # code...
                   break;
               }

              


              ?>


              <span class="info-box-number"><?php echo $totReceived; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
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