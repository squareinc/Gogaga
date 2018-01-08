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


      <?php

       $current_yr=date('Y');

          $tot_itq1=$tot_itq2=$tot_itq3=$tot_itq4=$tot_itq5=$tot_itq6=$tot_itq7=$tot_itq8=$tot_itq9=$tot_itq10=$tot_itq11=$tot_itq12=0;
          $tot_itc1=$tot_itc2=$tot_itc3=$tot_itc4=$tot_itc5=$tot_itc6=$tot_itc7=$tot_itc8=$tot_itc9=$tot_itc10=$tot_itc11=$tot_itc12=0;
          $tot_ivq1=$tot_ivq2=$tot_ivq3=$tot_ivq4=$tot_ivq5=$tot_ivq6=$tot_ivq7=$tot_ivq8=$tot_ivq9=$tot_ivq10=$tot_ivq11=$tot_ivq12=0;
          $tot_ivc1=$tot_ivc2=$tot_ivc3=$tot_ivc4=$tot_ivc5=$tot_ivc6=$tot_ivc7=$tot_ivc8=$tot_ivc9=$tot_ivc10=$tot_ivc11=$tot_ivc12=0;



      $sql= "SELECT * FROM user_monthly_data WHERE userid = '".$sno."' AND year = ".$current_yr."  ";
     $res = $conn->query($sql);
      if ($res->num_rows) 
      {     
        if($row = $res->fetch_assoc()) 
         {  
           

            $present_month = date('m');


           $total_itineraries_quoted =  $row["itq".$present_month];
           $total_itineraries_converted =  $row["itc".$present_month];
           $total_volume_quoted =  $row["ivq".$present_month];
           $total_volume_converted =  $row["ivc".$present_month];
           


        


                 $tot_itq1 =$row['itq01'];$tot_itc1 =$row['itc01'];$tot_ivq1 =$row['ivq01'];$tot_ivc1 =$row['ivc01'];
                 $tot_itq2 =$row['itq02'];$tot_itc2 =$row['itc02'];$tot_ivq2 =$row['ivq02'];$tot_ivc2 =$row['ivc02'];
                 $tot_itq3 =$row['itq03'];$tot_itc3 =$row['itc03'];$tot_ivq3 =$row['ivq03'];$tot_ivc3 =$row['ivc03'];
                 $tot_itq4 =$row['itq04'];$tot_itc4 =$row['itc04'];$tot_ivq4 =$row['ivq04'];$tot_ivc4 =$row['ivc04'];
                 $tot_itq5 =$row['itq05'];$tot_itc5 =$row['itc05'];$tot_ivq5 =$row['ivq05'];$tot_ivc5 =$row['ivc05'];
                 $tot_itq6 =$row['itq06'];$tot_itc6 =$row['itc06'];$tot_ivq6 =$row['ivq06'];$tot_ivc6 =$row['ivc06'];
                 $tot_itq7 =$row['itq07'];$tot_itc7 =$row['itc07'];$tot_ivq7 =$row['ivq07'];$tot_ivc7 =$row['ivc07'];
                 $tot_itq8 =$row['itq08'];$tot_itc8 =$row['itc08'];$tot_ivq8 =$row['ivq08'];$tot_ivc8 =$row['ivc08'];
                 $tot_itq9 =$row['itq09'];$tot_itc9 =$row['itc09'];$tot_ivq9 =$row['ivq09'];$tot_ivc9 =$row['ivc09'];
                 $tot_itq10 =$row['itq10'];$tot_itc10 =$row['itc10'];$tot_ivq10 =$row['ivq10'];$tot_ivc10 =$row['ivc10'];
                 $tot_itq11 =$row['itq11'];$tot_itc11 =$row['itc11'];$tot_ivq11 =$row['ivq11'];$tot_ivc11 =$row['ivc11'];
                 $tot_itq12 =$row['itq12'];$tot_itc12 =$row['itc12'];$tot_ivq12 =$row['ivq12'];$tot_ivc12 =$row['ivc12'];



        


         }
      }

      
            $dataPoints_itineraries_quoted = "[
                                          { x: new Date(".$current_yr.", 0, 1), y: ".$tot_itq1." },
                                          { x: new Date(".$current_yr.", 1, 1), y: ".$tot_itq2." },
                                          { x: new Date(".$current_yr.", 2, 1), y: ".$tot_itq3." },
                                          { x: new Date(".$current_yr.", 3, 1), y: ".$tot_itq4."},
                                          { x: new Date(".$current_yr.", 4, 1), y: ".$tot_itq5." },
                                          { x: new Date(".$current_yr.", 5, 1), y: ".$tot_itq6." },
                                          { x: new Date(".$current_yr.", 6, 1), y: ".$tot_itq7." },
                                          { x: new Date(".$current_yr.", 7, 1), y: ".$tot_itq8." },
                                          { x: new Date(".$current_yr.", 8, 1), y: ".$tot_itq9." },
                                          { x: new Date(".$current_yr.", 9,1), y: ".$tot_itq10." },
                                          { x: new Date(".$current_yr.", 10,1), y: ".$tot_itq11." },
                                          { x: new Date(".$current_yr.", 11,1), y: ".$tot_itq12." }
                                          ]";

          $dataPoints_itineraries_converted = "[
                                          { x: new Date(".$current_yr.", 0, 1), y: ".$tot_itc1." },
                                          { x: new Date(".$current_yr.", 1, 1), y: ".$tot_itc2." },
                                          { x: new Date(".$current_yr.", 2, 1), y: ".$tot_itc3." },
                                          { x: new Date(".$current_yr.", 3, 1), y: ".$tot_itc4."},
                                          { x: new Date(".$current_yr.", 4, 1), y: ".$tot_itc5." },
                                          { x: new Date(".$current_yr.", 5, 1), y: ".$tot_itc6." },
                                          { x: new Date(".$current_yr.", 6, 1), y: ".$tot_itc7." },
                                          { x: new Date(".$current_yr.", 7, 1), y: ".$tot_itc8." },
                                          { x: new Date(".$current_yr.", 8, 1), y: ".$tot_itc9." },
                                          { x: new Date(".$current_yr.", 9,1), y: ".$tot_itc10." },
                                          { x: new Date(".$current_yr.", 10,1), y: ".$tot_itc11." },
                                          { x: new Date(".$current_yr.", 11,1), y: ".$tot_itc12." }
                                          ]";
                                              
          $dataPoints_volume_quoted = "[
                                          { x: new Date(".$current_yr.", 0, 1), y: ".$tot_ivq1." },
                                          { x: new Date(".$current_yr.", 1, 1), y: ".$tot_ivq2." },
                                          { x: new Date(".$current_yr.", 2, 1), y: ".$tot_ivq3." },
                                          { x: new Date(".$current_yr.", 3, 1), y: ".$tot_ivq4."},
                                          { x: new Date(".$current_yr.", 4, 1), y: ".$tot_ivq5." },
                                          { x: new Date(".$current_yr.", 5, 1), y: ".$tot_ivq6." },
                                          { x: new Date(".$current_yr.", 6, 1), y: ".$tot_ivq7." },
                                          { x: new Date(".$current_yr.", 7, 1), y: ".$tot_ivq8." },
                                          { x: new Date(".$current_yr.", 8, 1), y: ".$tot_ivq9." },
                                          { x: new Date(".$current_yr.", 9,1), y: ".$tot_ivq10." },
                                          { x: new Date(".$current_yr.", 10,1), y: ".$tot_ivq11." },
                                          { x: new Date(".$current_yr.", 11,1), y: ".$tot_ivq12." }
                                          ]";
                                        

          $dataPoints_volume_converted = "[
                                          { x: new Date(".$current_yr.", 0, 1), y: ".$tot_ivc1." },
                                          { x: new Date(".$current_yr.", 1, 1), y: ".$tot_ivc2." },
                                          { x: new Date(".$current_yr.", 2, 1), y: ".$tot_ivc3." },
                                          { x: new Date(".$current_yr.", 3, 1), y: ".$tot_ivc4."},
                                          { x: new Date(".$current_yr.", 4, 1), y: ".$tot_ivc5." },
                                          { x: new Date(".$current_yr.", 5, 1), y: ".$tot_ivc6." },
                                          { x: new Date(".$current_yr.", 6, 1), y: ".$tot_ivc7." },
                                          { x: new Date(".$current_yr.", 7, 1), y: ".$tot_ivc8." },
                                          { x: new Date(".$current_yr.", 8, 1), y: ".$tot_ivc9." },
                                          { x: new Date(".$current_yr.", 9,1), y: ".$tot_ivc10." },
                                          { x: new Date(".$current_yr.", 10,1), y: ".$tot_ivc11." },
                                          { x: new Date(".$current_yr.", 11,1), y: ".$tot_ivc12." }
                                          ]";


?>
  
  <div class='row'>

      <div class='col-md-10 col-md-push-1'>

      <div id="chartContainer" style="height: 420px; width: 100%;"></div>
      </div>

  </div>

  <br></br>

   <div class='row'>

      <div class='col-md-10 col-md-push-1'>

      <div id="chartContainer1" style="height: 420px; width: 100%;"></div>
      </div>

  </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>

$(document).ready(function(){



var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Itineraries"
  },
  axisX:{
    valueFormatString: "MMM YYYY",
    crosshair: {
      enabled: true,
      snapToDataPoint: true
    }
  },
  axisY: {
    crosshair: {
      enabled: true
    }
  },
  toolTip:{
    shared:true
  },  
  legend:{
    cursor:"pointer",
    verticalAlign: "bottom",
    horizontalAlign: "left",
    dockInsidePlotArea: true,
    itemclick: toogleDataSeries
  },
  data: [{
    type: "column",
    showInLegend: true,
    name: "Total Itineraries Received",
    markerType: "square",
    xValueFormatString: "DD MMM, YYYY",
    color: "#0275d8",
    dataPoints: <?php echo "$dataPoints_itineraries_quoted";?>
  },
  {
    type: "column",
    showInLegend: true,
    name: "Total Itineraries Confirmed",
    lineDashType: "dash",
    color: "#d9534f",
    dataPoints: <?php echo "$dataPoints_itineraries_converted";?>
  }]
});
chart.render();

var chart1 = new CanvasJS.Chart("chartContainer1", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Volume"
  },
  axisX:{
    valueFormatString: "MMM YYYY",
    crosshair: {
      enabled: true,
      snapToDataPoint: true
    }
  },
  axisY: {
    crosshair: {
      enabled: true
    }
  },
  toolTip:{
    shared:true
  },  
  legend:{
    cursor:"pointer",
    verticalAlign: "bottom",
    horizontalAlign: "left",
    dockInsidePlotArea: true,
    itemclick: toogleDataSeries
  },
  data: [{
    type: "column",
    showInLegend: true,
    name: "Total Volume Received",
    markerType: "square",
    xValueFormatString: "DD MMM, YYYY",
    color: "#f1c40f",
    dataPoints: <?php echo "$dataPoints_volume_quoted";?>
  },
  {
    type: "column",
    showInLegend: true,
    name: "Total Volume Confirmed",
    lineDashType: "dash",
    color: "#5cb85c",
    dataPoints: <?php echo "$dataPoints_volume_converted";?>
  }]
});
chart1.render();

function toogleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  } else{
    e.dataSeries.visible = true;
  }
  chart.render();
}




});


</script>


<!--<script src='js/dashboard.js'></script>-->
   
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<?php

include "admin-footer.php";

?>