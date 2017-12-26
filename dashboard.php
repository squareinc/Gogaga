<?php

include "config.php";
session_start();

if(!isset($_SESSION["userid"]))
{
  header('Location:index.php');
}
else
{
    $userid = $_SESSION["userid"];
    $username = $_SESSION['username'];
    $password = $_SESSION["password"];
    $type = $_SESSION["type"];
    $handle_type =$_SESSION["handle_type"];

      if($handle_type=="Both")
    {
        header("location:admin/dashboard.php");
    }



      $current_yr=date('Y');

          $tot_itq1=$tot_itq2=$tot_itq3=$tot_itq4=$tot_itq5=$tot_itq6=$tot_itq7=$tot_itq8=$tot_itq9=$tot_itq10=$tot_itq11=$tot_itq12=0;
          $tot_itc1=$tot_itc2=$tot_itc3=$tot_itc4=$tot_itc5=$tot_itc6=$tot_itc7=$tot_itc8=$tot_itc9=$tot_itc10=$tot_itc11=$tot_itc12=0;
          $tot_ivq1=$tot_ivq2=$tot_ivq3=$tot_ivq4=$tot_ivq5=$tot_ivq6=$tot_ivq7=$tot_ivq8=$tot_ivq9=$tot_ivq10=$tot_ivq11=$tot_ivq12=0;
          $tot_ivc1=$tot_ivc2=$tot_ivc3=$tot_ivc4=$tot_ivc5=$tot_ivc6=$tot_ivc7=$tot_ivc8=$tot_ivc9=$tot_ivc10=$tot_ivc11=$tot_ivc12=0;


      $total_itineraries_quoted =$total_itineraries_converted=$total_volume_quoted=$total_volume_converted=0;

          $profile_totiq =  $profile_totic = $profile_totvq= $profile_totvc=0;

     $sql= "SELECT * FROM user_monthly_data WHERE userid = '".$userid."' AND year = ".$current_yr."  ";
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
           


            
           for ($i=1; $i <=12 ; $i++) { 
             $profile_totiq = $profile_totiq + (int)$row['itq'.$i];
             $profile_totic = $profile_totic + (int)$row['itc'.$i];
             $profile_totvq = $profile_totvq + (int)$row['ivq'.$i];
             $profile_totvc = $profile_totvc + (int)$row['ivc'.$i];
           }


                 $tot_itq1 =$row['itq1'];$tot_itc1 =$row['itc1'];$tot_ivq1 =$row['ivq1'];$tot_ivc1 =$row['ivc1'];
                 $tot_itq2 =$row['itq2'];$tot_itc2 =$row['itc2'];$tot_ivq2 =$row['ivq2'];$tot_ivc2 =$row['ivc2'];
                 $tot_itq3 =$row['itq3'];$tot_itc3 =$row['itc3'];$tot_ivq3 =$row['ivq3'];$tot_ivc3 =$row['ivc3'];
                 $tot_itq4 =$row['itq4'];$tot_itc4 =$row['itc4'];$tot_ivq4 =$row['ivq4'];$tot_ivc4 =$row['ivc4'];
                 $tot_itq5 =$row['itq5'];$tot_itc5 =$row['itc5'];$tot_ivq5 =$row['ivq5'];$tot_ivc5 =$row['ivc5'];
                 $tot_itq6 =$row['itq6'];$tot_itc6 =$row['itc6'];$tot_ivq6 =$row['ivq6'];$tot_ivc6 =$row['ivc6'];
                 $tot_itq7 =$row['itq7'];$tot_itc7 =$row['itc7'];$tot_ivq7 =$row['ivq7'];$tot_ivc7 =$row['ivc7'];
                 $tot_itq8 =$row['itq8'];$tot_itc8 =$row['itc8'];$tot_ivq8 =$row['ivq8'];$tot_ivc8 =$row['ivc8'];
                 $tot_itq9 =$row['itq9'];$tot_itc9 =$row['itc9'];$tot_ivq9 =$row['ivq9'];$tot_ivc9 =$row['ivc9'];
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




}
 $count_pending = 0;
$sql1= "SELECT COUNT(*) as cntt FROM agent_form_data
        WHERE holi_type ='".$handle_type."' and formstatus = 'pending' ";
 $res = $conn->query($sql1);
  
      if($res->num_rows) 
      {
        if($row = $res->fetch_assoc())
        {   
            $count_pending = $row["cntt"];
        } 
      }

 $count_smashed = 0;
$sql1= "SELECT COUNT(*) as cntt FROM agent_form_data
        WHERE holi_type ='".$handle_type."' and formstatus = 'smashed' ";
 $res = $conn->query($sql1);
  
      if($res->num_rows) 
      {
        if($row = $res->fetch_assoc())
        {   
            $count_smashed = $row["cntt"];
        } 
      }
      









?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--CSS Tags-->
  <link rel="icon" href="images/logo_icon.png"/>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
  

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="css/gallery.css">
   <!--   <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>-->
  <!--Script Tags-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script> 

<!-- fancybox CSS library -->
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css">


<link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/paper/bootstrap.min.css">

<!-- fancybox JS library -->
<script src="js/jquery.fancybox.js"></script>

<script type="text/javascript">
  $('#notifbut').click(function(e)
  {

    alert("clicked");

  });



</script>



 <style type="text/css">

.gallery img {
    width: 20%;
    height: auto;
    border-radius: 5px;
    cursor: pointer;
    transition: .3s;
}

.gallery a, .gallery a:focus, .gallery a:active{ outline:none; width: 60%;
    margin-right: -540px;}



.progress{
    width: 150px;
    height: 150px;
    line-height: 150px;
    background: none;
    margin: 0 auto;
    box-shadow: none;
    position: relative;
}
.progress:after{
    content: "";
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 12px solid #fff;
    position: absolute;
    top: 0;
    left: 0;
}
.progress > span{
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}
.progress .progress-left{
    left: 0;
}
.progress .progress-bar{
    width: 100%;
    height: 100%;
    background: none;
    border-width: 12px;
    border-style: solid;
    position: absolute;
    top: 0;
}
.progress .progress-left .progress-bar{
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left;
}
.progress .progress-right{
    right: 0;
}
.progress .progress-right .progress-bar{
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transform-origin: center right;
    animation: loading-8 1.8s linear forwards;
}
.progress .progress-value{
    width: 90%;
    height: 90%;
    border-radius: 50%;
    background: #44484b;
    font-size: 24px;
    color: #fff;
    line-height: 135px;
    text-align: center;
    position: absolute;
    top: 5%;
    left: 5%;
}

@media only screen and (max-width: 990px){
    .progress{ margin-bottom: 20px; }
}

#container1 {
  margin: 20px;
  width: 200px;
  height: 200px;
}
</style>

</head><!--#F3EDE9-->
<body ng-app='myApp' ng-controller="DashboardController" style='background-color:#FAF7F6;'>
 <!--Top Nav Bar-->

     <?php

      include "navbar.php";

     ?>


          
<!-- Main Content -->

<div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar-offcanvas" id="sidebar">
              <div class="list-group">
                    <a href="dashboard1.php"  id='sample' class="list-group-item"><span class='glyphicon glyphicon-home' style='padding-right:15px;' aria-hidden='true'></span>Dashboard</a> 
                    <a href="javascript:void(0):#itinerary5" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu"><span class='glyphicon glyphicon-tasks' style='padding-right:15px;' aria-hidden='true'></span>Itineraries<span class="caret" style='position:absolute;top:17px;right:30px;'></span></a>
                            <div class="collapse" id="itinerary5">
                              <a href="#/itsubmitted" class="list-group-item list-group-item" style='padding-left:30px;'>Submitted</a>
                              <a href="#/itpending" class="list-group-item list-group-item" style='padding-left:30px;'>Pending <span class="badge"><?php echo "$count_pending";?></span> </a>
                              <a href="#/itsmashed" class="list-group-item list-group-item" style='padding-left:30px;'>Deleted <span class="badge"><?php echo "$count_smashed";?></span> </a>
                            </div>
                    

                      <a href="javascript:void(0):#tool5" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu"><span class='glyphicon glyphicon-cog' style='padding-right:15px;' aria-hidden='true'></span>Tools<span class="caret" style='position:absolute;top:17px;right:30px;'></span></a>
                            <div class="collapse" id="tool5">
                            <a href="#/pricecalc" class="list-group-item" style='padding-left:30px;'>Price Calculator</a>
                            <a href="#/currencyconv" class="list-group-item" style='padding-left:30px;'>Currency Converter</a>

                          </div>

                        <a href="#/case" class="list-group-item"><span class='glyphicon glyphicon-file' style='padding-right:15px;' aria-hidden='true'></span>Case Status</a>
                         
                          <a href="javascript:void(0):#partners" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu"><span class='glyphicon glyphicon-user' style='padding-right:15px;' aria-hidden='true'></span>Partners<span class="caret" style='position:absolute;top:17px;right:30px;'></span></a>
                            <div class="collapse" id="partners">
                            <a href="#/superpartner" class="list-group-item" style='padding-left:30px;'>Super Partners</a>
                            <a href="#/holidaypartner" class="list-group-item" style='padding-left:30px;'>Holiday Partners</a>
                            <a href="#/salespartner" class="list-group-item" style='padding-left:30px;'>Sales Partners</a>

                          </div>

                         <a href="#/clients" class="list-group-item"><span class='glyphicon glyphicon-briefcase' style='padding-right:15px;' aria-hidden='true'></span>Clients</a>
                        <a href="#/voucher" class="list-group-item"><span class='glyphicon glyphicon-search' style='padding-right:15px;' aria-hidden='true'></span>Vouchers</a>
                        <a href="#/gallery" class="list-group-item"><span class='glyphicon glyphicon-picture' style='padding-right:15px;' aria-hidden='true'></span>Gallery</a>            
                        <a href="https://www.google.co.in/maps" target='_blank' class="list-group-item"><span class='glyphicon glyphicon-map-marker' style='padding-right:15px;' aria-hidden='true'></span>Maps</a>
                            


              </div>
        </div><!--/.sidebar-offcanvas-->


          <!--Page Content -->
        <div class="col-md-10 sm-10 col-md-push-0">
              <div ng-view></div>

        </div><!--/.col-xs-12.col-sm-9-->

        


 
       
      </div><!--/row-->


<script type="text/ng-template" id="pages/dashboard.php">

<div class='container'>

<div class='row'>

<!--First row-->
      <div class="card card-inverse" style="float:left;padding:5px 10px 0px 17px;margin:10px;background-color:#563d7c;height:140px;border-radius:0px;width:250px; border-color: #333;">
        <div class="card-block">
          <h3 class="card-title" style="color: white;"><?php echo "$total_itineraries_quoted";?></h3>
           <hr/>
          <p class="card-text"  style="color: white;">Total Itineraries Quoted</p>
         
        </div>
      </div>

       <div class="card card-inverse" style="float:left;padding:5px 10px 0px 17px;margin:10px;background-color:#0275d8;height:140px;border-radius:0px;width:250px; border-color:2px solid white;">
        <div class="card-block">
          <h3 class="card-title" style="color: white;"><?php echo "$total_itineraries_converted";?></h3>
           <hr/>
          <p class="card-text"  style="color: white;">Total Itineraries Converted</p>
         
        </div>
      </div>

       <div class="card card-inverse" style="float:left;padding:5px 10px 0px 17px;margin:10px;background-color:#5cb85c;height:140px;border-radius:0px;width:250px; border-color: #333;">
        <div class="card-block">
          <h3 class="card-title" style="color: white;"><?php echo "$total_volume_quoted";?></h3>
           <hr/>
          <p class="card-text"  style="color: white;">Total Volume Quoted</p>
         
        </div>
      </div>

       <div class="card card-inverse" style="float:left;padding:5px 10px 0px 17px;margin:10px;background-color:#d9534f;height:140px;border-radius:0px;width:250px; border-color: #333;">
        <div class="card-block">
          <h3 class="card-title" style="color: white;"><?php echo "$total_volume_converted";?></h3>
           <hr/>
          <p class="card-text"  style="color: white;">Total Volume Converted</p>
         
        </div>
      </div>

  </div>

<br>
<!--Second row-->

<div class='col-md-11'>

<div class ='row'>               
<div class='col-md-3'></div> 
  <div class='col-md-6 col-md-push-1' style='font-weight:bold;font-size:20px;'>LIST OF RECENT ITINERARIES</div>
  <div class='col-md-3 col-md-push-1'><a href='dashboard.php#/itsubmitted'>View All</a></div> 

  
  </div>
<br>
                 <?php
                    if($handle_type == "International")
                     $sql = "SELECT * FROM agent_form_data AS a INNER JOIN itinerary_inter AS i
                                ON i.ghrno = a.ref_num
                                WHERE i.workedby = '".$userid."'
                                LIMIT 6";
                     elseif($handle_type == "Domestic")
                     $sql = "SELECT * FROM agent_form_data AS a INNER JOIN itinerary_domestic AS i
                                ON i.ghrnno = a.ref_num
                                WHERE i.workedby = '".$userid."'
                                LIMIT 6";
                    else
                      {}
                    $res = $conn->query($sql);
                    if ($res->num_rows) 
                    {     echo "<table class='table table-hover table-bordered table-responsive' style='background-color: white;'>
                                  <tr>
                                    <th>GHRN number</th>
                                    <th>Customer Name</th>
                                    <th>Destination</th>
                                    <th>Itinerary Created</th>
                                    <th>Status</th>
                                    <th></th>
                                  </tr>";
                                  
                      while($row = $res->fetch_assoc()) 
                          {
                              $formstatus = $row["formstatus"];

                              echo " <tr>
                                 
                                  <td>GHRN".(5000+(int)$row["ref_num"] )."</td>
                                  <td>".$row["cust_firstname"]." ".$row["cust_lastname"]." </td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["itcreated"]."</td>
                                  <td>".$formstatus."</td>";

                              
                                if($formstatus == "pending")
                                   echo " 
                                  <td><a class='btn btn-danger btn-sm' role='button' target='_blank' href='view_itinerary.php?q=".$row["ref_num"]."'><b>View Form Details</b></a></td>
                                  </tr>";
                                 elseif($formstatus == "submitted")
                                   echo " 
                                  <td><a class='btn btn-warning btn-sm' role='button' target='_blank' href='itinerary_submitview.php?q=".$row["ref_num"]." &r=".$row["holi_type"]."'><b>View Submitted Itinerary</b></a></td>
                                  </tr>";
                                  if($formstatus == "confirmed")
                                   echo " 
                                  <td><a class='btn btn-success btn-sm' role='button' target='_blank' href='casestatus.php?q=".$row["ref_num"]."&r=".$row["holi_type"]."'><b>View Case Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></a></td>
                                  </tr>"; 


                          }
                          echo "</table><br><br>";
                    }
                    else
                       echo "<table class='table table-hover table-responsive' style='background-color: white;'>
                                  <tr>
                                    <th>GHRN number</th>
                                    <th>Customer Name</th>
                                    <th>Destination</th>
                                    <th>Itinerary Created</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                  
                                  </tr>

                                  </table>
                                  <h4 style='text-align:center;'>No Previous Itineraries found</h4>
                                  <br><br>";
                              
                       
                    ?>

</div>


<!--Third row-->


<div class='row'>

<div class='col-md-9'>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>





 <div class="col-md-3 col-sm-4">


    <div class='progress_bar' style='background-color:white;margin-left:10px; width:200px;border-radius:5px;height:365px;position:relative;right:35px;padding:10px;'>
    <h4 style='font-weight:bold;text-align:center;'></h4>

            <div class="progress blue">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value"> <?php
                              date_default_timezone_set('Asia/Kolkata');
                              echo "  <h3 style='padding-top:25px;text-align:center;'>" . date("h:i a")."</h3>";
                              ?></div>
            </div>
            <h5 style='text-align:center;'>
            
            </h5>


<br>

    </div
   

</div>





</div>
<br><br>

<div class='row'>
<br><br>
<div class='col-md-11'>
<div id='chartContainer1' style='margin-top:15px;height: 370px; width: 100%;'></div>


</div>

</div>
<br>
<br>
<br>
<br>



</script>
<script type="text/ng-template" id="pages/clients.php"> 
              <h2>Client Base</h2>

<div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-9">
      <input type="text" placeholder='Search Client...' size='300' name ='search_param_client' class="form-control" aria-label="...">
      </div>

      <div class="col-md-3">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Search</button>
        </span>

      
      </div>
    
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
   

</div><br><br>

                 <?php
                       if(isset($_GET["search_param_client"]))
                        {   
                          $search_param_client = $_GET["search_param_client"];
                          $sql = "SELECT * FROM agent_form_data 
                          WHERE cust_firstname  LIKE '%".$search_param_client."%'  
                          or cust_lastname LIKE '%".$search_param_client."%' 
                          or contact_phone LIKE '%".$search_param_client."%' 
                          or cust_email LIKE '%".$search_param_client."%' 
                          or cust_addr LIKE '%".$search_param_client."%' 
                          or holi_type LIKE '%".$search_param_client."%' 
                          or holi_dest LIKE '%".$search_param_client."%' 
                          ORDER BY holi_dest";   
                        }
                      else
                      {
                      $sql= "SELECT * FROM agent_form_data ORDER BY holi_dest";
                      unset($_GET["search_param_client"]);
                      }
                    
                    $res = $conn->query($sql);
                    if ($res->num_rows) 
                    {     echo "<table class='table table-hover table-responsive' style='background-color: white;'>
                                  <tr>
                                    <th>Client Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Holiday Type</th>
                                    <th>Destination</th>
                                    <th>Status</th>
                                  </tr>";
                                  $color = "";
                      while($row = $res->fetch_assoc()) 
                          {
                              
                            if($row["formstatus"] == "confirmed"){
                                $color = "#2ecc71";
                              }else if($row["formstatus"] == "pending"){
                                $color = "#e74c3c";
                              }else if($row["formstatus"] == "submitted"){
                                $color = "#3498db";
                              }else if($row["formstatus"] == "smashed"){
                                $color = "#f1c40f";
                              }


                              echo " <tr style='background-color: $color; color: #fff;'>
                                 
                                  <td>".$row["cust_firstname"] ." ". $row["cust_lastname"]."</td>
                                  <td>".$row["contact_phone"]." </td>
                                  <td>".$row["cust_email"]."</td>
                                  <td>".$row["cust_addr"]."</td>
                                  <td>".$row["holi_type"]."</td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["formstatus"]."</td>
                                  

                                </tr>";

                          }
                    }
                    else
                      echo "No results found";
                              
                       
                    ?>




</script>

<script type="text/ng-template" id="pages/casestatus.php"> 
              <h2>Case</h2>
              
              
<br>
<div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-9">
      <input type="text" placeholder='Search by GHRN number...' size='300' name ='search_case' class="form-control" aria-label="...">
      <br>
      </div>

      <div class="col-md-3">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Search</button>
        </span>

      
      </div>
    
    </div><!-- /input-group -->
  </div><!-- /.col-md-9 -->

</div><br><br>


   <?php
                                        
                        if(isset($_GET["search_case"]))
                        {   
                          $search_case = $_GET["search_case"];
                          $sql1 = "SELECT * FROM agent_form_data WHERE
                          formstatus = 'confirmed' and holi_type = '$handle_type' and ref_num LIKE '%$search_case%' 
                          ORDER BY ref_num DESC";   
                        }
                      else
                      {
                        $sql1= "SELECT * FROM agent_form_data
                        WHERE formstatus = 'confirmed'  and holi_type = '$handle_type'
                        ORDER BY payment_status ASC";
                        unset($_GET["search_case"]);
                      }



                      $res = $conn->query($sql1) ;
                    if ($res->num_rows)


                    {     echo " <div class='table-responsive'> <table class='table table-hover table-bordered table-list' style='background-color: white;'>
                                  <tr>
                                  <th>GHRN NO</th>
                                  <th>Client Name</th>
                                  <th>Destination</th>
                                  <th>Payment Status</th>
                                  <th>Voucher Status</th>
                                  <th>Agent Commission</th>
                                 
                                </tr>";
                               
                      while($row = $res->fetch_assoc()) 
                          {
                             

                              $pst = $row["payment_status"];
                              if($pst == "paid")
                              {
                                $pst = "<b style='color:green'>Paid</b>";
                              }
                              elseif($pst == "unpaid")
                              {
                                $pst = "<b style='color:red'>Unpaid</b>";
                              }
                              //For vouchers
                              $vst = $row["voucher_status"];
                              if($vst == "Vouchered")
                              {
                                $vst = "<b style='color:green'>Vouchered</b>";
                              }
                              elseif($vst == "Pending")
                              {
                                $vst = "<b style='color:red'>Pending</b>";
                              }

                               //For Agent commisions
                              $acom = $row["agent_com"];
                              if($acom == "confirmed")
                              {
                                $acom = "<b style='color:green'>Confirmed</b>";
                              }
                              elseif($acom == "pending")
                              {
                                $acom = "<b style='color:red'>Pending</b>";
                              }





                              echo " <tr>
                                  <td>GHRN".(5000+$row["ref_num"])."</td>
                                  <td>".$row["cust_firstname"]." ".$row["cust_lastname"]."</td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$pst."</td>
                                  <td>".$vst."</td>
                                  <td>".$acom."</td>
                                  
                                </tr>";

                              

                          }
                          echo "</table></div>";
                    }
                    else
                      echo " No results found";
                              
                       



                      ?>


</script>

<script type="text/ng-template" id="pages/superpartner.php"> 
              <h2>Super Partners</h2>
<br>
<div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-9">
      <input type="text" placeholder='Search Partner...' size='300' name ='search_sup' class="form-control" aria-label="...">
      </div>

      <div class="col-md-3">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Search</button>
        </span>

      
      </div>
    
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->

</div><br><br>

                 <?php
                    
                        if(isset($_GET["search_sup"]))
                        {   
                          $search_sup = $_GET["search_sup"];
                          $sql = "SELECT * FROM superpartner 
                          WHERE name  LIKE '%".$search_sup."%'  
                          or phone LIKE '%".$search_sup."%' 
                          or email LIKE '%".$search_sup."%' 
                          or suppartnercode LIKE '%".$search_sup."%' 
                          ORDER BY name";   
                        }
                      else
                      {
                        $sql= "SELECT * FROM superpartner ORDER BY name";
                        unset($_GET["search_sup"]);
                      }
                    
                      $res = $conn->query($sql) ;
                    if ($res->num_rows) 
                    {     echo "<table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                    <th>S.no</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th></th>
                                  </tr>";
                                  $cnt_var=1;
                      while($row = $res->fetch_assoc()) 
                          {
                              
                              echo " <tr>
                                  <td>".$cnt_var++."</td>
                                  <td>".$row["suppartnercode"]."</td>
                                  <td>".$row["name"]." </td>
                                  <td>".$row["phone"]."</td>
                                  <td>".$row["email"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='view_superpartner.php?q=".$row["suppartnercode"]."'>View</a></td>
                                </tr>";

                          }
                    }
                    else
                      echo "No results found";
                              
                       
                    ?>
</script>


<script type="text/ng-template" id="pages/holidaypartner.php"> 
              <h2>Holiday Partners</h2>

            <br>
 <div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-9">
      <input type="text" placeholder='Search Partner...' size='300' name ='search_holp' class="form-control" aria-label="...">
      </div>

      <div class="col-md-3">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Search</button>
        </span>

      
      </div>
    
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->

</div><br><br>

                 <?php
                    
                        if(isset($_GET["search_holp"]))
                        {   
                          $search_holp = $_GET["search_holp"];
                          $sql = "SELECT * FROM holidaypartner 
                          WHERE nameoncard  LIKE '%".$search_holp."%'  
                          or contact LIKE '%".$search_holp."%' 
                          or email LIKE '%".$search_holp."%' 
                          or holipartner LIKE '%".$search_holp."%' 
                          ORDER BY nameoncard";   
                        }
                      else
                      {
                        $sql= "SELECT * FROM holidaypartner ORDER BY nameoncard";
                        unset($_GET["search_holp"]);
                      }
                    
                      $res = $conn->query($sql) ;
                    if ($res->num_rows) 
                    {     echo "<table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                    <th>S.no</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th></th>
                                  </tr>";
                                  $cnt_var=1;
                      while($row = $res->fetch_assoc()) 
                          {
                              
                              echo " <tr>
                                  <td>".$cnt_var++."</td>
                                  <td>".$row["holipartner"]."</td>
                                  <td>".$row["nameoncard"]." </td>
                                  <td>".$row["contact"]."</td>
                                  <td>".$row["email"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='view_holipartner.php?q=".$row["holipartner"]."'>View</a></td>
                                </tr>";

                          }
                    }
                    else
                      echo "No results found";
                              
                       
                    ?> 
            
</script>

<script type="text/ng-template" id="pages/salespartner.php"> 
              <h2>Sales Partners</h2>
 <br>
<div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-9">
      <input type="text" placeholder='Search Partner...' size='300' name ='search_sale' class="form-control" aria-label="...">
      </div>

      <div class="col-md-3">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Search</button>
        </span>

      
      </div>
    
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->

</div><br><br>

                    <?php
                    
                        if(isset($_GET["search_sale"]))
                        {   
                          $search_sale = $_GET["search_sale"];
                          $sql = "SELECT * FROM salespartner 
                          WHERE salpartnercode  LIKE '%".$search_sale."%'  
                          or persmail LIKE '%".$search_sale."%' 
                          or salpartnername LIKE '%".$search_sale."%' 
                          or phone LIKE '%".$search_sale."%' 
                          ORDER BY salpartnercode DESC";   
                        }
                      else
                      {
                        $sql= "SELECT * FROM salespartner ORDER BY salpartnercode DESC";
                        unset($_GET["search_sale"]);
                      }
                    
                      $res = $conn->query($sql) ;
                    if ($res->num_rows) 
                    {     echo "<table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                    <th>S.no</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th></th>
                                  </tr>";
                                  $cnt_var=1;
                      while($row = $res->fetch_assoc()) 
                          {
                              
                              echo " <tr>
                                  <td>".$cnt_var++."</td>
                                   <td>".$row["salpartnercode"]." </td>
                                  <td>".$row["salpartnername"]." </td>
                                  <td>".$row["phone"]."</td>
                                  <td>".$row["persmail"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='view_salespartner.php?q=".$row["salpartnercode"]."'>View</a></td>
                                </tr>";

                          }
                    }
                    else
                      echo "No results found";
                              
                       
                    ?>          
            
            
</script>



<script type="text/ng-template" id="pages/profile.php"> 
              <h2>Profile</h2>
             

    <?php

     $sql= "SELECT * FROM login WHERE userid = '".$userid."'  ";
     $res = $conn->query($sql);
      if ($res->num_rows) 
      {     
        if($row = $res->fetch_assoc()) 
         {
          $dob = date_format(date_create($row["DOB"]),"d-M-Y");
          $joindate = date_format(date_create($row["joindate"]),"d-M-Y");
          $notif_count = $row["notif_count"];
          $user_contact = $row["contact"];
          $userref =  $row["refnums"];
          $mailid = $row["mailid"];
          $profilepath = $row["profilepath"];
         }
      }   


?>
      
<div class='row'>
        <div class='col-md-3'>
                <div class="panel panel-default">
                <div class="panel-body">
                  
                    <?php echo " <img  src='profile/".$profilepath."' width='100%' height='50%'>";?>
                </div>
              </div>
               <div class="panel panel-default">
                <div class="panel-body">
                  
                    <h4 style='text-align:center;'><?php echo "$username";?></h4>
                </div>
              </div>



        </div>  

        <div class='col-md-9'>              
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Employee Details</h3>
              </div>
              <div class="panel-body">

                 <?php





                echo "<table class='table table-responsive'>
                    <tr>
                        <td>Total Itineraries Quoted</td>
                        <td>".$profile_totiq."</td>
                    </tr>
                    <tr>
                        <td>Total Itineraries Converted</td>
                        <td>".$profile_totic."</td>
                    </tr>
                    <tr>
                        <td>Total Volume Quoted</td>
                        <td>".$profile_totvq."</td>
                    </tr>
                    <tr>
                        <td>Total Volume Converted</td>
                        <td>".$profile_totvc."</td>
                    </tr>
                    <tr>
                        <td>Performance</td>
                        <td>None</td>
                    </tr>
                     <tr>
                        <td>Rank</td>
                        <td>None</td>
                    </tr>

                </table> ";
               ?>


              </div>
            </div>
        </div>    
</div>

         
<div class='row'>
  

        <div class='col-md-12'>              
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Personal Details</h3>
              </div>
              <div class="panel-body">
              <?php 
                echo "<table class='table table-responsive'>
                    <tr>
                        <td>Role</td>
                        <td>Employee</td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>".$handle_type."</td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>".$dob."</td>
                    </tr>
                    <tr>
                        <td>Contact Number</td>
                        <td>".$user_contact."</td>
                    </tr>
                    <tr>
                        <td>Reference Number(s)</td>
                        <td>".$userref."</td>
                    </tr>

                    <tr>
                        <td>Email ID</td>
                        <td>".$mailid."</td>
                    </tr>
                     <tr>
                        <td>Working Since</td>
                        <td>".$joindate."</td>
                    </tr>
                   

                </table> ";
               ?>

              </div>
            </div>
        </div>    
</div>


</script>


<script type="text/ng-template" id="pages/settings.php"> 
              <h2>Settings</h2>
  
<div class='container'>

<div class='col-md-6'>

              <form method='POST' action='settings.php' enctype="multipart/form-data">

              <div class="form-group">
               <div class='alert alert-info' role='alert'>
                  <strong>Note</strong>: Only Entered Fields will be reflected.
              </div>
              <div class="form-group">
              <label for="transnumber">User name </label>
              <input type="text" class="form-control" name='newusername' placeholder="Enter Username" id="newusername">
              </div>
              <div class="form-group">
              <label for="fileToUpload">Profile Picture : </label>
              <input type="file" class="form-control" name='fileToUpload' id="fileToUpload">
              </div>
              <div class="form-group">
                <label for="newpwd">User password </label>
                <input type="password" class="form-control" name='newpwd' placeholder="Enter password" id="newpwd">
              </div>
              <div class="form-group">
                <label for="newpwd1">Re-enter password </label>
               <input type="password" class="form-control" name='newpwd1' placeholder="Re-Enter password" id="newpwd1">
              </div>

              <div class="form-group">
              <label for="contactno">Contact number </label>
                <input type="text" class="form-control" name='contactno' placeholder="Enter Contact number" id="contactno">
              </div>

              <div class="form-group">
                <label for="refnums">GHRN number(s) </label>
                <input type="text" class="form-control" name='refnums' placeholder="Enter GHRN NO(s)" id="refnums">
              </div>
               
               <div class="form-group">
              <label for="dob">Date of Birth</label><br>
               <select name="dateset" style='height:40px;'> 
                                           <?php 
                                                $x=1;
                                                echo "<option value='a'></option>";
                                                
                                              while($x <= 31) 
                                              {
                                                echo "<option>".$x."</option>";
                                                $x++;
                                              } 
                                            ?>       
                                  </select> 
                        
                                  <select name="monset" style='height:40px;'> 
                                            <?php
                                                $y=array("Jan", "Feb", "Mar", "Apr",
                                                "May","Jun","Jul","Aug","Sept","Oct","Nov","Dec");
                                                         echo "<option value='a'></option>";
                                                  for ($i=0; $i <12; $i++) { 
                                                        echo "<option value ='".($i+1)."'>".$y[$i]."</option>";    
                                                     }
                                                     
                                            ?>         
                                  </select>  
                        
                                  <select name="yearset" style='height:40px;'> 
                                            
                                              <?php 
                                                $x=date("1950");
                                                $y=date("Y");
                                               echo "<option value='a'></option>";
                                              while($x <= $y) 
                                              {
                                                echo "<option>".$x."</option>";
                                                $x++;
                                              } 
                                            ?>

                                         

                                  </select>
              </div>

              <div class="form-group">
                <label for="emailnew">Email ID</label>
                <input type="text" class="form-control" name='emailnew'  placeholder="Enter Email ID" id="emailnew">
              </div>

               <div class="form-group">
              <label for="ws">Working Since</label><br>
               <select name="datews" style='height:40px;'> 
                                           <?php 
                                                $x=1;
                                                echo "<option value='a'></option>";
                                                
                                              while($x <= 31) 
                                              {
                                                echo "<option>".$x."</option>";
                                                $x++;
                                              } 
                                            ?>       
                                  </select> 
                        
                                  <select name="monws" style='height:40px;'> 
                                            <?php
                                                $y=array("Jan", "Feb", "Mar", "Apr",
                                                "May","Jun","Jul","Aug","Sept","Oct","Nov","Dec");
                                                         echo "<option value='a'></option>";
                                                  for ($i=0; $i <12; $i++) { 
                                                        echo "<option value ='".($i+1)."'>".$y[$i]."</option>";    
                                                     }
                                                     
                                            ?>         
                                  </select>  
                        
                                  <select name="yearws" style='height:40px;'> 
                                            
                                              <?php 
                                                $x=date("2000");
                                                $y=date("Y");
                                               echo "<option value='a'></option>";
                                              while($x <= $y) 
                                              {
                                                echo "<option>".$x."</option>";
                                                $x++;
                                              } 
                                            ?>

                                         

                                  </select>
              </div>

             
                  <br>
              <button type="submit" name='settingssubmit' class="btn btn-primary">Edit Profile</button>
              <br><br><br><br><br>
          </form>
</div>
<div class='col-md-2'>
         

</div>

<div class='col-md-4'>
         

</div>
</div>

</script>

<script type="text/ng-template" id="pages/voucher.php"> 
              <h2>Vouchers</h2>
 
<br>
<div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-9">
      <input type="text" placeholder='Search by GHRN number...' size='300' name ='search_voucher' class="form-control" aria-label="...">
      <br>
      </div>

      <div class="col-md-3">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Search</button>
        </span>

       
      </div>
    
    </div><!-- /input-group -->
  </div><!-- /.col-md-9 -->

</div><br><br>


   <?php
                                        
                        if(isset($_GET["search_voucher"]))
                        {   
                          $search_voucher = $_GET["search_voucher"];
                          $sql1 = "SELECT * FROM vouchertable WHERE
                          ref_num LIKE '%$search_voucher%' 
                          ORDER BY ref_num DESC";   
                        }
                      else
                      {
                        $sql1= "SELECT * FROM vouchertable v INNER JOIN agent_form_data a ON v.ref_num=a.ref_num ORDER BY v.ref_num DESC

                          ";
                        unset($_GET["search_voucher"]);
                      }

                      $res = $conn->query($sql1) ;
                    if ($res->num_rows)

                    {     echo " <div class='table-responsive'> <table class='table table-hover table-bordered table-list' style='background-color: white;'>
                                  <tr>
                                  <th>GHRN NO</th>
                                  <th>Customer Name</th>
                                  <th>Destination</th>
                                  <th>Travel Start Date</th>
                                  <th>Issued By</th>
                                  <th>Date of Issue</th>
                                  <th>Status</th>
                                  <th></th>
                                </tr>";
                               
                      while($row = $res->fetch_assoc()) 
                          {
                              $dateissued = date_create($row["issuedon"]);
                              $dateissued = date_format($dateissued,"d-M-Y");
                              $todaydate = date("d-M-Y");
                              if($dateissued == $todaydate)
                              {
                                $dateissued = "<b style='color:green;'>TODAY</b>";
                              }
                              // FOr user recog
                                $issueduser = $row["userid"];
                                if($issueduser == $userid)
                                {
                                  $issueduser = "<b style='color:RED;'>".$issueduser."</b>";
                                }



                              echo " <tr>
                                  <td>GHRN".(5000+$row["ref_num"])."</td>
                                  <td>".$row["cust_firstname"]." ".$row["cust_lastname"]."</td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["date_of_travel"]."</td>
                                  <td>".$issueduser."</td>
                                  <td>".$dateissued ."</td>
                                  <td>".$row["status"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='voucherwork.php?ref=".$row["ref_num"]."'>Manage Voucher</a></td>
                                </tr>";

                          }
                          echo "</table></div>";
                    }
                    else
                      echo " No results found";
                              
                       



                      ?>


</script>
<script type="text/ng-template" id="pages/gallery.php"> 
              <h2>Gallery</h2>
              

               <?php
               $gallerycontent="";
              if(isset($_GET["search_image"]))
                        {   
                          $search_image = $_GET["search_image"];
                          $sql = "SELECT * FROM holiday_images 
                          WHERE imgname  LIKE '%".$search_image."%'  
                          ORDER BY img_id";   
                        }
                      else
                      {
                      $sql= "SELECT * FROM holiday_images ORDER BY img_id";
                      unset($_GET["search_image"]);
                      }
                    
                    $res = $conn->query($sql);
                    if ($res->num_rows) 
                    //if(5<4)
                    {    
                                  
                      while($row = $res->fetch_assoc()) 
                          {
                               

                              $gallerycontent.= "
                                      <a href='stuff/".$row["imgpath"]."'  data-fancybox='group' data-caption='".$row["imgname"]."'>
                                       <img src='stuff/".$row["imgpath"]."'>
                                       
                                      </a>
                                      
                                    ";

                          }
                    }
                    else
                      $gallerycontent = "No results found";
                       
                       
                    ?> 
              <div class ='row'>               
                    <div class="col-md-9">
                      <div class="input-group">
                        <form method='GET' action=''>
                        
                        <div class="col-md-9">
                        <input type="text" placeholder='Search image...' name ='search_image'  size='300' class="form-control" aria-label="...">
                        </div>

                        <div class="col-md-3">
                          <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Search</button>
                          </span>
                          
                        </div>

                        </form>
                          
                      </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                    <a class='btn btn-danger btn-md' role='button' href='#/galleryupload'>Upload</a>
                  </div>
                  <br> 
            <div class="container">
              <div class="row">
                <div class="col-lg-12">

                <div class='gallery'>
               <?php echo "$gallerycontent";?>
             </div> <!--gallery end-->
            </div>
          </div>
          </div> <!--container end-->
            
            
</script>

<script type="text/ng-template" id="pages/galleryupload.php"> 
              <h2>Upload Images</h2>



<div class='container'>

<div class='col-md-6'>

              <form method='POST' action='uploadimage.php'  enctype="multipart/form-data">

              <div class="form-group">
               <div class='alert alert-info' role='alert'>
                  <strong>Note</strong>: Only Entered Fields will be reflected.
              </div>

              <label for="imgname">Holiday Location</label>
              <input type="text" class="form-control" name='imgname' placeholder="Enter Holiday Location" id="imgname" required>
              </div>

              <div class="form-group">
              <label for="imgdesc">Holiday Description</label>
                <textarea class="form-control" name='imgdesc' placeholder="Enter Holiday Description" id="imgdesc" maxlength="450" rows="8" required></textarea>
              </div>
              <div id="textarea_feedback" style="color: red;"></div>
             
              <div class="form-group">
              <label for="fileToUpload">Choose Image</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
              </div>
              <div id="image_feedback" style="color: red;"><p><b>Note:</b> The Image size must not exceed 3MB.</p></div>

              <div class="col-md-3">
                  <span class="input-group-btn">
                     <button class="btn btn-primary" name='submit' type="submit">Upload</button>
                  </span>
              </div>    

<script>
  $('#imgdesc').ready(function() {
    var text_max = 450;
    $('#textarea_feedback').html(text_max + ' characters remaining');


    $('#imgdesc').keyup(function() {
        var text_length = $('#imgdesc').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
});
</script>

       
</script>




<script type="text/ng-template" id="pages/pricecalc.php"> 
              <h2>Price Calculator</h2>
       
       
<div class ='row'>               

  <div class="col-md-2">
    <div class="input-group">
      <form method='GET' action=''>
      <input type="hidden" placeholder='Type here...' value='Domestic' name ='search_param_calc' id='search_param_calc' size='300' class="form-control" aria-label="...">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Domestic</button>
        </span>
      </form>
</div>
</div>

<div class="col-md-2 col-md-pull-1">
    <div class="input-group">
      <form method='GET' action=''>
      <input type="hidden" placeholder='Type here...' value='International' name ='search_param_calc' id='search_param_calc' size='300' class="form-control" aria-label="...">
        <span class="input-group-btn">
          <button class="btn btn-danger" type="submit">International</button>
        </span>
      </form>
 </div>
</div>

</div>
<br>
<?php


if(isset($_GET["search_param_calc"]))
    $ref_type = $_GET["search_param_calc"];
else
    $ref_type ="Domestic";


?>

      <div class='col-md-12'> 
            <?php
              include 'pricecalc.php';
            ?>

          </div>


            
</script>
          
<script type="text/ng-template" id="pages/currencyconv.php"> 
              <h2>Currency Calculator</h2>
              
            
  <div class="col-md-9">
    <div class="input-group">
       
            <p>Enter Amount:
                <input type="text" ng-model="num1" ng-init="num1=0" class="form-control" aria-label="..." />
            </p>
            
            <p>Currency value :
                <input type="text" ng-model="num2" ng-init="num2=0" class="form-control" aria-label="..."/>
            </p>
              <br><br><br>
            <p>Amount in INR:</p>
            <div class="well"> Rs.  {{ num1 * num2 }} /-</div>
            
    </div>
</div>



</script>




<script type="text/ng-template" id="pages/itsubmitted.php"> 
              <h2>Submitted Itineraries</h2>
              
        
<div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-9">
      <input type="text" placeholder='Search here..' name ='search_param_submitted' id='search_param_submitted' size='300' class="form-control" aria-label="...">
      </div>

      <div class="col-md-3">
        <span class="input-group-btn">
          <button class="btn btn-danger" type="submit">Search</button>
        </span>
      </div>
      </form>
    
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->

</div>
<br>
                   

                     <?php

                    
                        if(isset($_GET["search_param_submitted"]))
                        {   
                          
                          $search_param_submitted = $_GET["search_param_submitted"];
                          $param_ref = (int)$search_param_submitted;
                          $param_ref = $param_ref - 5000;

                          $sql1 = "SELECT * FROM agent_form_data INNER JOIN login WHERE
                          (agent_form_data.currently_worked_by = login.userid) and (formstatus != 'pending' and formstatus!= 'smashed' and holi_type = '".$handle_type."') and 
                          (holi_dest LIKE '%".$search_param_submitted."%'
                          or ref_num LIKE '%".$param_ref."%')  
                          ORDER BY ref_num DESC";   

                        }
                      else
                      {
                        $sql1= "SELECT * FROM agent_form_data INNER JOIN login
                                WHERE agent_form_data.currently_worked_by = login.userid and  formstatus != 'pending' and formstatus!= 'smashed' and holi_type = '".$handle_type."' 
                                ORDER BY ref_num DESC";
                        unset($_GET["search_param_submitted"]);
                      }



                      $res = $conn->query($sql1) ;
                    if ($res->num_rows) 
                    {     echo " <div class='table-responsive'> <table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                  <th>GHRN NO</th>
                                  <th>Customer Name</th>
                                  <th>Destination</th>
                                  <th>Sent Date</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Employee</th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                </tr>";

                                $color = "";
                               
                      while($row = $res->fetch_assoc()) 
                          {
                              if($row["formstatus"] == "confirmed"){
                                $color = "#2ecc71";
                              }else{
                                $color = "#FFF";
                              }
                              echo " <tr style='background-color: $color;'>
                                  <td>GHRN".(5000+(int)$row["ref_num"])."</td>
                                  <td>".$row["cust_firstname"]." ".$row["cust_lastname"]."</td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["senttocustomerdate"]."</td>
                                  <td>".$row["date_of_travel"]."</td>
                                  <td>".$row["return_date_of_travel"]."</td>
                                  <td>".$row["username"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='itinerary_submitview.php?q=".$row["ref_num"]."&r=".$row["holi_type"]."'>View</a></td>
                                  <td><a class='btn btn-danger btn-sm' role='button' href='edit_agentform.php?q=".$row["ref_num"]."'>Modify</a></td>";
                                  /*if($row["formstatus"] == "confirmed")
                                    echo "
                                    <td>&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-ok' style='padding-right:15px;' aria-hidden='true'></span></td>
                                  </tr>";
                                  else
                                    echo "
                                    <td>&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class='btn btn-warning btn-sm' role='button' href='confirmpackage.php?qr=".$row["ref_num"]."'>Confirm</a></td>
                                  </tr>";*/

                          }
                          echo "</table></div>";
                    }
                    else
                      echo " No results found";
                              
                       



                      ?>
</script>


<script type="text/ng-template" id="pages/itrecent.php"> 
              <h2>Recent Itineraries</h2>

<?php
                    
                     $sql = "SELECT * FROM agent_form_data AS a INNER JOIN pending_itineraries AS p
                                ON p.ref_num = a.ref_num
                                WHERE p.user_id = '".$userid."'
                                ";
                    $res = $conn->query($sql);
                    if ($res->num_rows) 
                    {     echo "<table class='table table-hover table-responsive' style='background-color: white;'>
                                  <tr>
                                    <th>GHRN number</th>
                                    <th>Customer Name</th>
                                    <th>Destination</th>
                                    <th>Itinerary Created</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                  
                                  </tr>";
                                  
                      while($row = $res->fetch_assoc()) 
                          {
                              
                              echo " <tr>
                                 
                                  <td>".$row["ref_num"] ."</td>
                                  <td>".$row["cust_firstname"]." ".$row["cust_lastname"]." </td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["itinerary_created"]."</td>
                                  <td>".$row["status"]."</td>
                                <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='view_itinerary.php?q=".$row["ref_num"]."'>View</a></td>
                                 <td><a class='btn btn-danger btn-sm' role='button' href='edit_agentform.php?q=".$row["ref_num"]."'>Modify</a></td>
                               
                                </tr>";

                          }
                          echo "</table><br><br>";
                    }
                    else
                       echo "<table class='table table-hover table-responsive' style='background-color: white;'>
                                  <tr>
                                    <th>GHRN number</th>
                                    <th>Customer Name</th>
                                    <th>Destination</th>
                                    <th>Itinerary Created</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                  
                                  </tr>

                                  </table>
                                  <h4 style='text-align:center;'>No Previous Itineraries found</h4>
                                  <br><br>";
                              
                       
                    ?>




</script>


<script type="text/ng-template" id="pages/itsmashed.php"> 
              <h2>Deleted Itineraries</h2>

<div class ='row'>               
  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-9">
      <input type="text" placeholder='Type here...' name ='search_param_smashed'  size='300' class="form-control" aria-label="...">
      </div>

      <div class="col-md-3">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Search</button>
        </span>
      </div>
      </form>
    
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->

</div>
<br>                   

                     <?php
                     /*

                       $sql1 = "SELECT * FROM agent_form_data
                          WHERE holi_type= '".$handle_type."' AND 

                          holi_dest LIKE '%".$search_param_pending."%'
                          or ref_num LIKE '%".$search_param_pending."%'  
                          ORDER BY ref_num DESC";   
                          */

                    
                        if(isset($_GET["search_param_smashed"]))
                        {   
                          $search_param_smashed = $_GET["search_param_smashed"];
                          $sql1 = "SELECT * FROM agent_form_data WHERE
                          (formstatus = 'smashed' and holi_type = '".$handle_type."') and 
                          (holi_dest LIKE '%".$search_param_smashed."%'
                          or ref_num LIKE '%".$search_param_smashed."%')  
                          ORDER BY ref_num DESC";   
                        }
                      else
                      {
                        $sql1= "SELECT * FROM agent_form_data
                        WHERE formstatus = 'smashed' and holi_type = '".$handle_type."'
                        ORDER BY ref_num DESC";
                        unset($_GET["search_param_smashed"]);
                      }



                      $res = $conn->query($sql1) ;
                    if ($res->num_rows)


                    {     echo " <div class='table-responsive'> <table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                  <th>GHRN NO</th>
                                  <th>Destination</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Duration</th>
                                  <th>Type</th>
                                  <th></th>
                                  <th></th>
                                </tr>";
                               
                      while($row = $res->fetch_assoc()) 
                          {
                             
                              echo " <tr>
                                  <td>".$row["ref_num"]."</td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["date_of_travel"]."</td>
                                  <td>".$row["return_date_of_travel"]."</td>
                                  <td>".$row["duration"]."</td>
                                  <td>".$row["holi_type"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='view_itinerary.php?q=".$row["ref_num"]."'>View</a></td>
                                </tr>";

                              

                          }
                          echo "</table></div>";
                    }
                    else
                      echo " No results found";
                              
                       



                      ?>         




</script>

              
<script type="text/ng-template" id="pages/itpending.php"> 
              <h2>Pending Itineraries</h2>
              
<div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-9">
      <input type="text" placeholder='Type here...' name ='search_param_pending'  size='300' class="form-control" aria-label="...">
      </div>

      <div class="col-md-3">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Search</button>
        </span>
      </div>
      </form>
    
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->

</div>
<br>                   

                     <?php

                    
                        if(isset($_GET["search_param_pending"]))
                        {   
                          $search_param_pending = $_GET["search_param_pending"];
                          $ref_param = (int)$search_param_pending - 5000;
                          $sql1 = "SELECT * FROM agent_form_data WHERE
                          (formstatus = 'pending') and 
                          (holi_dest LIKE '%".$search_param_pending."%'
                          or ref_num LIKE '%".$ref_param."%')  
                          ORDER BY ref_num DESC";   
                        }
                        else
                        {
                          $sql1= "SELECT * FROM agent_form_data
                          WHERE holi_type ='".$handle_type."' and formstatus = 'pending'  
                          ORDER BY ref_num DESC ";
                          unset($_GET["search_param_pending"]);
                        }



                      $res = $conn->query($sql1) ;
                    if ($res->num_rows)
                    {     
                      echo " <div class='table-responsive'> <table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                  <th>GHRN no</th>
                                  <th>Customer Name</th>
                                  <th>Destination</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Duration</th>
                                  <th>Form Received on</th>
                                  <th></th>
                                  <th></th>
                                  <th>Currently worked by</th>
                                </tr>";
                               
                      while($row = $res->fetch_assoc()) 
                          {
                              $holi_type = $row["holi_type"];
                              if($holi_type == $handle_type){
                             
                                $datesent =date_create($row["datesent"]);
                                $datesent =date_format($datesent,"d-M-Y");

                              echo " <tr>
                                  <td>GHRN".(5000+(int)$row["ref_num"])."</td>
                                  <td>".$row["cust_firstname"]." ".$row["cust_lastname"]."</td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["date_of_travel"]."</td>
                                  <td>".$row["return_date_of_travel"]."</td>
                                  <td>".$row["duration"]."</td>
                                  <td>".$datesent."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='view_itinerary.php?q=".$row["ref_num"]."'>View</a></td>
                                  <td><a class='btn btn-success btn-sm' role='button' href='edit_agentform.php?q=".$row["ref_num"]."'>Create</a></td>
                                  <td>".$row["currently_worked_by"]."</td>

                                </tr>";

                              }

                          }
                          echo "</table></div>";
                    }
                    else
                      echo " No results found";
                              
                       



                      ?>
</script>




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
    type: "line",
    showInLegend: true,
    name: "Total Itineraries Quoted",
    markerType: "square",
    xValueFormatString: "DD MMM, YYYY",
    color: "#F08080",
    dataPoints: <?php echo "$dataPoints_itineraries_quoted";?>
  },
  {
    type: "line",
    showInLegend: true,
    name: "Total Itineraries Converted",
    lineDashType: "dash",
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
    type: "line",
    showInLegend: true,
    name: "Total Volume Quoted",
    markerType: "square",
    xValueFormatString: "DD MMM, YYYY",
    color: "#F08080",
    dataPoints: <?php echo "$dataPoints_volume_quoted";?>
  },
  {
    type: "line",
    showInLegend: true,
    name: "Total Volume Converted",
    lineDashType: "dash",
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

<script type="text/javascript">
    $("[data-fancybox]").fancybox({ });
</script>




<!--<script src='js/dashboard.js'></script>-->
   
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src='js/app.js'></script>
</body>
</html>
