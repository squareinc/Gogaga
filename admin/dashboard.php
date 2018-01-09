<?php

include "../config.php";
session_start();

if(!isset($_SESSION["userid"]))
{
  header('Location:../index.php');
}
else
{
    $userid = $_SESSION["userid"];
    $username = $_SESSION['username'];
    $password = $_SESSION["password"];
    $type = $_SESSION["type"];
    $handle_type =$_SESSION["handle_type"];

    if($handle_type!="Both")
    {
        header("location:../dashboard.php");
    }


    //$sql= "SELECT SUM(itq) AS itqsum,SUM(itc) AS itcsum,SUM(ivq) AS ivqsum,SUM(ivc) AS ivcsum FROM user_monthly_data WHERE year = '".$current_yr."'  ";
     $current_yr=date('Y');
     $present_month = date('m');
    

      $total_itineraries_quoted =$total_itineraries_converted=$total_volume_quoted=$total_volume_converted=0;
          
          $tot_itq1=$tot_itq2=$tot_itq3=$tot_itq4=$tot_itq5=$tot_itq6=$tot_itq7=$tot_itq8=$tot_itq9=$tot_itq10=$tot_itq11=$tot_itq12=0;
          $tot_itc1=$tot_itc2=$tot_itc3=$tot_itc4=$tot_itc5=$tot_itc6=$tot_itc7=$tot_itc8=$tot_itc9=$tot_itc10=$tot_itc11=$tot_itc12=0;
          $tot_ivq1=$tot_ivq2=$tot_ivq3=$tot_ivq4=$tot_ivq5=$tot_ivq6=$tot_ivq7=$tot_ivq8=$tot_ivq9=$tot_ivq10=$tot_ivq11=$tot_ivq12=0;
          $tot_ivc1=$tot_ivc2=$tot_ivc3=$tot_ivc4=$tot_ivc5=$tot_ivc6=$tot_ivc7=$tot_ivc8=$tot_ivc9=$tot_ivc10=$tot_ivc11=$tot_ivc12=0;
          $pr1=$pr2=$pr3=$pr4=$pr5=$pr6=$pr7=$pr8=$pr9=$pr10=$pr11=$pr12=0; 






     $sql= "SELECT * FROM user_monthly_data WHERE year =".$current_yr."";
     $res = $conn->query($sql);
      if ($res->num_rows) 
      {     
         

            while($row = $res->fetch_assoc()) 
             {  
               $total_itineraries_quoted = $total_itineraries_quoted + $row['itq'.$present_month];
               $total_itineraries_converted = $total_itineraries_converted + $row['itc'.$present_month];
               $total_volume_quoted = $total_volume_quoted + $row['ivq'.$present_month];
               $total_volume_converted = $total_volume_converted + $row['ivc'.$present_month];


               
               $tot_itq1 =$tot_itq1 +$row['itq01'];$tot_itc1 =$tot_itc1 +$row['itc01'];$tot_ivq1 =$tot_ivq1 +$row['ivq01'];$tot_ivc1 =$tot_ivc1 +$row['ivc01'];$pr1 =$pr1 +$row['pr01'];
               $tot_itq2 =$tot_itq2 +$row['itq02'];$tot_itc2 =$tot_itc2 +$row['itc02'];$tot_ivq2 =$tot_ivq2 +$row['ivq02'];$tot_ivc2 =$tot_ivc2 +$row['ivc02'];$pr2 =$pr2 +$row['pr02'];
               $tot_itq3 =$tot_itq3 +$row['itq03'];$tot_itc3 =$tot_itc3 +$row['itc03'];$tot_ivq3 =$tot_ivq3 +$row['ivq03'];$tot_ivc3 =$tot_ivc3 +$row['ivc03'];$pr3 =$pr3 +$row['pr03'];
               $tot_itq4 =$tot_itq4 +$row['itq04'];$tot_itc4 =$tot_itc4 +$row['itc04'];$tot_ivq4 =$tot_ivq4 +$row['ivq04'];$tot_ivc4 =$tot_ivc4 +$row['ivc04'];$pr4 =$pr4 +$row['pr04'];
               $tot_itq5 =$tot_itq5 +$row['itq05'];$tot_itc5 =$tot_itc5 +$row['itc05'];$tot_ivq5 =$tot_ivq5 +$row['ivq05'];$tot_ivc5 =$tot_ivc5 +$row['ivc05'];$pr5 =$pr5 +$row['pr05'];
               $tot_itq6 =$tot_itq6 +$row['itq06'];$tot_itc6 =$tot_itc6 +$row['itc06'];$tot_ivq6 =$tot_ivq6 +$row['ivq06'];$tot_ivc6 =$tot_ivc6 +$row['ivc06'];$pr6 =$pr6 +$row['pr06'];
               $tot_itq7 =$tot_itq7 +$row['itq07'];$tot_itc7 =$tot_itc7 +$row['itc07'];$tot_ivq7 =$tot_ivq7 +$row['ivq07'];$tot_ivc7 =$tot_ivc7 +$row['ivc07'];$pr7 =$pr7 +$row['pr07'];
               $tot_itq8 =$tot_itq8 +$row['itq08'];$tot_itc8 =$tot_itc8 +$row['itc08'];$tot_ivq8 =$tot_ivq8 +$row['ivq08'];$tot_ivc8 =$tot_ivc8 +$row['ivc08'];$pr8 =$pr8 +$row['pr08'];
               $tot_itq9 =$tot_itq9 +$row['itq09'];$tot_itc9 =$tot_itc9 +$row['itc09'];$tot_ivq9 =$tot_ivq9 +$row['ivq09'];$tot_ivc9 =$tot_ivc9 +$row['ivc09'];$pr9 =$pr9 +$row['pr09'];
               $tot_itq10 =$tot_itq10 +$row['itq10'];$tot_itc10 =$tot_itc10 +$row['itc10'];$tot_ivq10 =$tot_ivq10 +$row['ivq10'];$tot_ivc10 =$tot_ivc10 +$row['ivc10'];$pr10 =$pr10 +$row['pr10'];
               $tot_itq11 =$tot_itq11 +$row['itq11'];$tot_itc11 =$tot_itc11 +$row['itc11'];$tot_ivq11 =$tot_ivq11 +$row['ivq11'];$tot_ivc11 =$tot_ivc11 +$row['ivc11'];$pr11 =$pr11 +$row['pr11'];
               $tot_itq12 =$tot_itq12 +$row['itq12'];$tot_itc12 =$tot_itc12 +$row['itc12'];$tot_ivq12 =$tot_ivq12 +$row['ivq12'];$tot_ivc12 =$tot_ivc12 +$row['ivc12'];$pr12 =$pr12 +$row['pr12'];

              

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
                                          
                    $profit_graphdata = "[
                                          { x: new Date(".$current_yr.", 0, 1), y: ".$pr1." },
                                          { x: new Date(".$current_yr.", 1, 1), y: ".$pr2." },
                                          { x: new Date(".$current_yr.", 2, 1), y: ".$pr3." },
                                          { x: new Date(".$current_yr.", 3, 1), y: ".$pr4."},
                                          { x: new Date(".$current_yr.", 4, 1), y: ".$pr5." },
                                          { x: new Date(".$current_yr.", 5, 1), y: ".$pr6." },
                                          { x: new Date(".$current_yr.", 6, 1), y: ".$pr7." },
                                          { x: new Date(".$current_yr.", 7, 1), y: ".$pr8." },
                                          { x: new Date(".$current_yr.", 8, 1), y: ".$pr9." },
                                          { x: new Date(".$current_yr.", 9,1), y: ".$pr10." },
                                          { x: new Date(".$current_yr.", 10,1), y: ".$pr11." },
                                          { x: new Date(".$current_yr.", 11,1), y: ".$pr12." }
                                          ]";  
                                          $avgprofit = $pr1+$pr2+$pr3+$pr4+$pr5+$pr6+$pr7+$pr8+$pr9+$pr10+$pr11+$pr12;            
                                          $avgprofit = $avgprofit /12;












         
 }    
 $count_pending = 0;
$sql1= "SELECT COUNT(*) as cntt FROM agent_form_data
        WHERE formstatus = 'pending' ";
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
        WHERE formstatus = 'smashed' ";
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
  <link rel="icon" href="../images/logo_icon.png"/>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
  

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="../css/gallery.css">
   <!--   <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>-->
  <!--Script Tags-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script> 

<!-- fancybox CSS library -->
<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css">


<link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/paper/bootstrap.min.css">

<!-- fancybox JS library -->
<script src="../js/jquery.fancybox2.js"></script>

<script type="text/javascript" src="js/deleteitinerary.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


<script type="text/javascript">
  $('#notifbut').click(function(e)
  {

    alert("clicked");

  });

$(document).on("focus", "input[name='expirydate']", function() {

var selectedHotelRow = "input[name='expirydate']";

    console.log("selectedHotelRow:"+selectedHotelRow);

     //hotels checkoutdate daterangepicker          
  $(selectedHotelRow).daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');
        console.log("Year:" + years);
    });

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

<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>

<script type="text/javascript">
  sessionStorage.SessionName = "SessionAdminPass";

  $(document).ready(function(){
    val = sessionStorage.getItem("SessionAdminPass");
  if(val == "ok"){
    console.log("logged in!");
    $('#maincontrol').css("opacity", "1");
    $("#passBox").addClass("hidden");
  }else{
    console.log("failure!");
  } 
  });
 
</script>


</head>

<body ng-app='myApp' ng-controller="DashboardController" style='background-color:#FAF7F6;'>
 <!--Top Nav Bar-->

     <?php

      include "navbar.php";

     ?>


          
<!-- Main Content -->

<div class="container-fluid" id="maincontrol">

  
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar-offcanvas" id="sidebar">
              <div class="list-group">
                    <a href="dashboard1.php"  id='sample' class="list-group-item"><span class='glyphicon glyphicon-home' style='padding-right:15px;' aria-hidden='true'></span>Dashboard</a> 
                    <a href="javascript:void(0):#itinerary5" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu"><span class='glyphicon glyphicon-tasks' style='padding-right:15px;' aria-hidden='true'></span>Itineraries<span class="caret" style='position:absolute;top:17px;right:30px;'></span></a>
                            <div class="collapse" id="itinerary5">
                              <a href="../form2.php" class="list-group-item list-group-item" style='padding-left:30px;'>Request Form</a>
                              <a href="#/itsubmitted" class="list-group-item list-group-item" style='padding-left:30px;'>Submitted</a>
                              <a href="#/itpending" class="list-group-item list-group-item" style='padding-left:30px;'>Pending <span class="badge"><?php echo "$count_pending";?></span> </a>
                              <a href='#/itsmashed' class='list-group-item list-group-item' style='padding-left:30px;'>Deleted <span class="badge"><?php echo "$count_smashed";?></span> </a>

                            </div>
                      <a href="javascript:void(0):#tool5" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu"><span class='glyphicon glyphicon-cog' style='padding-right:15px;' aria-hidden='true'></span>Tools<span class="caret" style='position:absolute;top:17px;right:30px;'></span></a>
                            <div class="collapse" id="tool5">
                            <a href="#/pricecalc" class="list-group-item" style='padding-left:30px;'>Price Calculator</a>
                            <a href="#/currencyconv" class="list-group-item" style='padding-left:30px;'>Currency Converter</a>
                            <a href="#/gstdefault" class="list-group-item" style='padding-left:30px;'>GST Setter</a>
                            

                          </div>

                        <a href="#/case" class="list-group-item"><span class='glyphicon glyphicon-file' style='padding-right:15px;' aria-hidden='true'></span>Case Status</a>
                        

                          <a href="javascript:void(0):#partners" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu"><span class='glyphicon glyphicon-user' style='padding-right:15px;' aria-hidden='true'></span>Partners<span class="caret" style='position:absolute;top:17px;right:30px;'></span></a>
                            <div class="collapse" id="partners">
                            <a href="#/superpartner" class="list-group-item" style='padding-left:30px;'>Super Partners</a>
                            <a href="#/holidaypartner" class="list-group-item" style='padding-left:30px;'>Holiday Partners</a>
                            <a href="#/salespartner" class="list-group-item" style='padding-left:30px;'>Sales Partners</a>
                            <a href="#/uploadedquotations" class="list-group-item" style='padding-left:30px;'>Uploaded Quotations</a>

                          </div>


                         <a href="#/clients" class="list-group-item"><span class='glyphicon glyphicon-briefcase' style='padding-right:15px;' aria-hidden='true'></span>Clients</a>
                        <a href="#/voucher" class="list-group-item"><span class='glyphicon glyphicon-search' style='padding-right:15px;' aria-hidden='true'></span>Vouchers</a>
                        <a href="#/gallery" class="list-group-item"><span class='glyphicon glyphicon-picture' style='padding-right:15px;' aria-hidden='true'></span>Gallery</a>   
                        <a href="#/marketingflyers" class="list-group-item"><span class='glyphicon glyphicon-picture' style='padding-right:15px;' aria-hidden='true'></span>Marketing Flyers</a>            
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

       <div class="card card-inverse" style="float:left;padding:5px 10px 0px 17px;margin:10px;background-color:#0275d8;height:140px;width:250px; border-color: #333;">
        <div class="card-block">
          <h3 class="card-title" style="color: white;"><?php echo "$total_itineraries_converted";?></h3>
           <hr/>
          <p class="card-text"  style="color: white;">Total Itineraries Converted</p>
         
        </div>
      </div>

       <div class="card card-inverse" style="float:left;padding:5px 10px 0px 17px;margin:10px;background-color:#5cb85c;height:140px;width:250px; border-color: #333;">
        <div class="card-block">
          <h3 class="card-title" style="color: white;"><?php echo "$total_volume_quoted";?></h3>
           <hr/>
          <p class="card-text"  style="color: white;">Total Volume Quoted</p>
         
        </div>
      </div>

       <div class="card card-inverse" style="float:left;padding:5px 10px 0px 17px;margin:10px;background-color:#d9534f;height:140px;width:250px; border-color: #333;">
        <div class="card-block">
          <h3 class="card-title" style="color: white;"><?php echo "$total_volume_converted";?></h3>
           <hr/>
          <p class="card-text"  style="color: white;">Total Volume Converted</p>
         
        </div>
      </div>

  </div>
<br>
<!--Second row-->
<div class='row'>

<div class='col-md-9'>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>





 <div class="col-md-2 col-sm-4">
      <div class="card card-inverse" style="float:left;position:relative;right:20px;padding:20px;background-color:#f1c40f;height:365px;border-radius:5px;width:200px; border-color: #333;">
        <div class="card-block">
          <?php
              $sql1= "SELECT COUNT(*) as cntt FROM agent_form_data
                       WHERE payment_status = 'unpaid' ";
               $res = $conn->query($sql1);
              
                  if($res->num_rows) 
                  {
                    if($row = $res->fetch_assoc())
                    {   
                        $pendingpayments = $row["cntt"];
                    } 
                  }
      

          ?>
          <h3 class="card-title" style="text-align:center;color: white;"><?php echo "$pendingpayments";?></h3>
           <hr/>
          <h4 class="card-text"  style="text-align:center;">
                  <a href='dashboard.php#/case' style='color: white;'>Pending Payments</a>
          </h4>
         
        </div>

         <?php
          date_default_timezone_set('Asia/Kolkata');
              echo "<br><br><br><h3 style='text-align:center;color:white;'>" . date("h:i A")."</h3>";
          ?>
      </div>


</div>





</div>


<!--Third row-->
<div class='row'>
<br><br>
<div class='col-md-11'>
<div id='chartContainer1' style='margin-top:15px;height: 370px; width: 100%;'></div>


</div>

</div>
<br>
<!--Fourth row-->
<br>


<div class='row'>
  
  <div class='col-md-11'>
      <div id='chartContainer2' style='margin-top:15px;height: 370px; width: 100%;'></div>
  </div>
</div>
<br><br><br><br>

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
                                $row["formstatus"] = "deleted";
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
                          $search_case = explode("N", $search_case);
                          $ref_param = (int)$search_case[1];
                          $ref_param = $ref_param - 5000;
                          $sql1 = "SELECT * FROM agent_form_data WHERE
                          formstatus = 'confirmed' and ref_num = '$ref_param'
                          ORDER BY ref_num DESC";   
                        }
                      else
                      {
                        $sql1= "SELECT * FROM agent_form_data
                        WHERE formstatus = 'confirmed'
                        ORDER BY payment_status ASC";
                        unset($_GET["search_case"]);
                      }



                      $res = $conn->query($sql1) ;
                    if ($res->num_rows)


                    {     echo " <div class='table-responsive'> <table class='table table-hover table-bordered table-list' style='background-color: white;'>
                                  <tr>
                                  <th>GHRN NO</th>
                                  <th>Confirmed Date</th>
                                  <th>Trip Start Date</th>
                                  <th>Client Name</th>
                                  <th>Contact No.</th>
                                  <th>Total Package Cost</th>
                                  <th>Pending Payment</th>
                                  <th>Amount Received</th>
                                  <th>Destination</th>
                                  
                                  <th>Payment Status</th>
                                  <th>Voucher Status</th>
                                  <th>Agent Commission</th>
                                  <th>Status</th>
                                  <th>Cancel</th>
                                 
                                </tr>";
                               
                      while($row = $res->fetch_assoc()) 
                          {
                              $totalPackageCost = ""; 
                              $refNum = $row["ref_num"];
                              $pendingPayment = "";
                              $creditedAmount = "";
                              
                              $GHRN_number = 5000+(int)$refNum;
                              $GHRN_number = "GHRN".$GHRN_number;

                              $sqlTrans = "SELECT SUM(CREDIT) AS creditedamount FROM transactions WHERE GHRN_number = '".$GHRN_number."'"; 

                              $resTrans = $conn->query($sqlTrans) ;
                                if ($resTrans->num_rows){
                                  while($rowTrans = $resTrans->fetch_assoc()){
                                    $creditedAmount = $rowTrans["creditedamount"];
                                  }
                                }


                              if($row["holi_type"] == "Domestic")
                              {
                                $dest_place = "<p style='color:red'>".$row["holi_dest"]."</p>";
                                $sql2= "SELECT totcostfl FROM itinerary_domestic d INNER JOIN agent_form_data a ON d.ghrnno = a.ref_num
                                 WHERE a.formstatus = 'confirmed' AND a.ref_num = '".$refNum."'";
                                 $res2 = $conn->query($sql2) ;
                                 if ($res2->num_rows){
                                  while($row2 = $res2->fetch_assoc()) 
                                    {
                                      $totalPackageCost = $row2["totcostfl"];
                                      $pendingPayment = (int)$totalPackageCost-(int)$creditedAmount;

                                    }
                                 }
                      
                              }
                              elseif($row["holi_type"]  == "International")
                              {
                                $dest_place = "<p style='color:blue;'>".$row["holi_dest"]."</p>";
                                 $sql3 = "SELECT totcostfl FROM itinerary_inter d INNER JOIN agent_form_data a ON d.ghrno = a.ref_num
                                 WHERE a.formstatus = 'confirmed' AND a.ref_num = '".$refNum."'";
                                 //echo $sql3;
                                 $res3 = $conn->query($sql3);
                                 if ($res3->num_rows){
                                  while($row3 = $res3->fetch_assoc()) 
                                    {
                                      $totalPackageCost = $row3["totcostfl"];
                                      $pendingPayment = (int)$totalPackageCost-(int)$creditedAmount;
                                    }
                                 }
                              }

                              $pst = $row["payment_status"];
                              if($pst == "paid")
                              {
                                $pst = "<b style='color:green'>Paid</b>";
                              }
                              elseif($pst == "unpaid")
                              {
                                $pst = "<a class='btn btn-danger btn-sm' role='button' href='payitinerary.php?qr=".$row["ref_num"]."&t=".$row["holi_type"]."'>Pay</a>";
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

                              $agentst =$row["agent_com"];
                              if($agentst == "confirmed")
                              {
                                $agentst = "<b style='color:green'>Confirmed</b>";
                              }
                              elseif($agentst == "pending")
                              {
                               $agentst = "<a class='btn btn-danger btn-sm' role='button' href='agentconf.php?qr=".$row["ref_num"]."'>Pay</a>";
                              }

                              $balancePayment = (int)$totalPackageCost - (int)$pendingPayment;


                              echo " <tr>
                                  <td>GHRN".(5000+$row["ref_num"])."</td>
                                  <td>".$row["confirmeddate"]."</td>
                                  <td>".$row["date_of_travel"]."</td>
                                  <td>".$row["cust_firstname"]." ".$row["cust_lastname"]."</td>
                                  <td>".$row["contact_phone"]."</td>
                                  <td>".(int)$totalPackageCost."</td>
                                  <td>".(int)$pendingPayment."</td>
                                  <td>".$balancePayment."</td>
                                  <td>".$dest_place."</td>
                                  
                                  <td>".$pst."</td>
                                  <td>".$vst."</td>
                                  <td>".$agentst."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' href='../casestatus.php?q=".$row["ref_num"]."&r=".$row["holi_type"]."'>View</a></td>
                                  <td><a class='btn btn-danger' href='revertToSubmitted.php?q=".$row["ref_num"]."' role='button'>Cancel</a></td>
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
                          $sql = "SELECT * FROM superpartners 
                          WHERE name  LIKE '%".$search_sup."%'  
                          or phone LIKE '%".$search_sup."%' 
                          or email LIKE '%".$search_sup."%' 
                          or sno LIKE '%".$search_sup."%' 
                          ORDER BY name";   
                        }
                      else
                      {
                        $sql= "SELECT * FROM superpartners ORDER BY sno ASC";
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
                                  <td>".$row["sno"]."</td>
                                  <td>".$row["name"]." </td>
                                  <td>".$row["phone"]."</td>
                                  <td>".$row["email"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='../view_superpartner.php?q=".$row["sno"]."'>View</a></td>
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
                          $sql = "SELECT * FROM holidaypartners 
                          WHERE name  LIKE '%".$search_holp."%'  
                          or contact LIKE '%".$search_holp."%' 
                          or email LIKE '%".$search_holp."%' 
                          or sno LIKE '%".$search_holp."%' 
                          ORDER BY nameoncard";   
                        }
                      else
                      {
                        $sql= "SELECT * FROM holidaypartners ORDER BY sno ASC";
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
                                  <td>".$row["sno"]."</td>
                                  <td>".$row["name"]." </td>
                                  <td>".$row["phone"]."</td>
                                  <td>".$row["email"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='../view_holipartner.php?q=".$row["sno"]."'>View</a></td>
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
                          $sql = "SELECT * FROM salespartners 
                          WHERE sno  LIKE '%".$search_sale."%'  
                          or email LIKE '%".$search_sale."%' 
                          or name LIKE '%".$search_sale."%' 
                          or phone LIKE '%".$search_sale."%' 
                          ORDER BY sno DESC";   
                        }
                      else
                      {
                        $sql= "SELECT * FROM salespartners ORDER BY sno ASC";
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
                                   <td>".$row["sno"]." </td>
                                  <td>".$row["name"]." </td>
                                  <td>".$row["phone"]."</td>
                                  <td>".$row["email"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='../view_salespartner.php?q=".$row["sno"]."'>View</a></td>
                                </tr>";

                          }
                    }
                    else
                      echo "No results found";
                              
                       
                    ?>          
            
</script>



<script type="text/ng-template" id="pages/agentreport.php"> 
              <h2>Agent Commission Reports</h2>
<br><br>
<div class='col-md-9'>
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Pending Commissions</h3>
                </div>
                <div class="panel-body">
                    <div class='col-md-1 '><br>
                         <span class='input-group-btn'>
                          <a class='btn btn-primary btn-md' role='button' href='#/pendingcomm'>
                          <span class='glyphicon glyphicon-log-in' style='padding-right:6px;' aria-hidden='true'></span> 
                          Open
                          </a>
                         </span>
                    </div>        
                </div>
              </div>

              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Issued Statements</h3>
                </div>
                <div class="panel-body">
                   <div class='col-md-1 '><br>
                         <span class='input-group-btn'>
                          <a class='btn btn-primary btn-md' role='button' href='#/issuedstat'>
                          <span class='glyphicon glyphicon-log-in' style='padding-right:6px;' aria-hidden='true'></span> 
                          Open
                          </a>
                         </span>
                    </div> 
                </div>
              </div>
 </div>              

 </script>             


<script type="text/ng-template" id="pages/pendingcomm.php"> 
              <h2>Pending Commissions</h2>

          <br>
 <div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-6">
      <input type="text" placeholder='Search Commission...' size='300' name ='search_pcomm' class="form-control" aria-label="...">
      </div>

      <div class="col-md-3">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Search</button>
        </span>        
      </div>

       <div class="col-md-3">

          Super Partner Amount<p id="supAmount"></p>
           Holiday Partner Amount<p id="holAmount"></p>
            Sales Partner Amount<p id="salAmount"></p>       
      </div>
    
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->

</div><br><br>

                 <?php
                    
                        if(isset($_GET["search_pcomm"]))
                        {   
                          $search_pcomm = $_GET["search_pcomm"];
                          $sql = "SELECT * FROM commissions 
                          WHERE (status = 'pending') and (ghrno  LIKE '%".$search_pcomm."%'  
                          or clientname LIKE '%".$search_pcomm."%' 
                          or holitype LIKE '%".$search_pcomm."%' 
                          or holidest LIKE '%".$search_pcomm."%'
                          or sup LIKE '%".$search_pcomm."%'
                          or hol LIKE '%".$search_pcomm."%'
                          or sal LIKE '%".$search_pcomm."%') 
                          ORDER BY sno DESC";   
                        }
                      else
                      {
                        $sql= "SELECT * FROM commissions WHERE status = 'pending' ORDER BY sno DESC";
                        unset($_GET["search_pcomm"]);
                      }
                    
                      $res = $conn->query($sql) ;
                    if ($res->num_rows) 
                    {     echo "<div class='table-responsive'><table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                    <th></th>
                                    <th>Sno</th>
                                    <th>Client Name</th>
                                    <th>Holiday Type</th>
                                    <th>Destination</th>
                                    <th>Commission</th>
                                    <th>Super Partner</th>
                                    <th>Amount</th>
                                    <th></th>
                                    <th>Holiday Partner</th>
                                    <th>Amount</th>
                                    <th></th>
                                    <th>Sales Partner</th>
                                    <th>Amount</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  </tr>";
                                  $cnt_var=1;
                                   $supname = "";
                                   $holiname = "";
                                   $salname = "";
                      while($row = $res->fetch_assoc()) 
                          {
                              $sup_sno = $row["sup_sno"];
                              $holi_sno = $row["holi_sno"];
                              $sal_sno = $row["sal_sno"];
                             

                              $sql2 = "SELECT name FROM superpartners WHERE sno = '$sup_sno'";

                              $res2 = $conn->query($sql2);

                              if($row2 = $res2->fetch_assoc()){
                                $supname = $row2["name"];
                              }

                              $sql3 = "SELECT name FROM holidaypartners WHERE sno = '$holi_sno'";

                              $res3 = $conn->query($sql3);

                              if($row3 = $res3->fetch_assoc()){
                                $holiname = $row3["name"];
                              }

                              $sql4 = "SELECT name FROM salespartners WHERE sno = '$sal_sno'";

                              $res4 = $conn->query($sql4);

                              if($row4 = $res4->fetch_assoc()){
                                $salname = $row4["name"];
                              }

                              echo " <tr>
                                  <td><input type='checkbox' class='paybill' sup='".$row["sup"]."' hol='".$row["hol"]."' sal='".$row["sal"]."'></td>
                                  <td>".$cnt_var++."</td>
                                  <td>".$row["clientname"]."</td>
                                  <td>".$row["holitype"]." </td>
                                  <td>".$row["holidest"]."</td>
                                  <td><b style='color:red;'>".$row["commamt"]." INR</b></td>
                                  <td>".$supname."</td>

                                  <td>".$row["sup"]."</td>
                                  
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='viewstatement.php?q=".$row["ghrno"]."&cname=".$row["clientname"]."&dest=".$row["holidest"]."&holitype=".$row["holitype"]."&partnertype=superpartner&partnersno=".$row["sup_sno"]."'>View</a></td>
                                  <td>".$holiname." </td>

                                  <td>".$row["hol"]." </td>
                                  
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='viewstatement.php?q=".$row["ghrno"]."&cname=".$row["clientname"]."&dest=".$row["holidest"]."&holitype=".$row["holitype"]."&partnertype=holidaypartner&partnersno=".$row["holi_sno"]."'>View</a>
                                  </td>

                                  <td>".$salname." </td>

                                  <td>".$row["sal"]." </td>

                                  

                                  <td> <a class='btn btn-primary btn-sm' role='button' target='_blank' href='viewstatement.php?q=".$row["ghrno"]."&cname=".$row["clientname"]."&dest=".$row["holidest"]."&holitype=".$row["holitype"]."&partnertype=salespartner&partnersno=".$row["sal_sno"]."'>View</a></td>
                                  <td><a class='btn btn-danger btn-sm' role='button' href='agentconf2.php?qr=".$row["ghrno"]."'>Download</a>
                                  
                                </tr>";
                                $supname = "";
                                 $holiname = "";
                                 $salname = "";
                          }
                    }
                    else
                      echo "No results found";
                            
                       
                    ?> 
            
</div>
</script>

<script type="text/ng-template" id="pages/issuedstat.php"> 
              <h2>Issued Statements</h2>
              <br>
 <div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-6">
      <input type="text" placeholder='Search Commission...' size='300' name ='search_pcomm' class="form-control" aria-label="...">
      </div>

     <div class="col-md-3">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Search</button>
        </span>        
      </div>

       <div class="col-md-3">

          Super Partner Amount<p id="supAmountX"></p>
           Holiday Partner Amount<p id="holAmountX"></p>
            Sales Partner Amount<p id="salAmountX"></p>       
      </div>
    
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->

</div><br><br>

                 <?php
                    
                        if(isset($_GET["search_pcomm"]))
                        {   
                          $search_pcomm = $_GET["search_pcomm"];
                          $sql = "SELECT * FROM commissions 
                          WHERE (status = 'confirmed') and (ghrno  LIKE '%".$search_pcomm."%'  
                          or clientname LIKE '%".$search_pcomm."%' 
                          or holitype LIKE '%".$search_pcomm."%' 
                          or holidest LIKE '%".$search_pcomm."%'
                          or sup LIKE '%".$search_pcomm."%'
                          or hol LIKE '%".$search_pcomm."%'
                          or sal LIKE '%".$search_pcomm."%' )
                          ORDER BY sno DESC";   
                        }
                      else
                      {
                        $sql= "SELECT * FROM commissions WHERE status = 'confirmed' ORDER BY sno DESC";
                        unset($_GET["search_pcomm"]);
                      }
                    
                      $res = $conn->query($sql) ;
                    if ($res->num_rows) 
                    {     echo "<table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                    <th></th>
                                    <th>Sno</th>
                                    <th>Client Name</th>
                                    <th>Holiday Type</th>
                                    <th>Destination</th>
                                    <th>Commission</th>
                                    <th>Super Partner</th>
                                    <th>Holiday Partner</th>
                                    <th>Sales Partner</th>
                                    <th></th>
                                    <th></th>
                                  </tr>";
                                  $cnt_var=1;
                      while($row = $res->fetch_assoc()) 
                          {
                              
                              echo " <tr>
                              <td><input type='checkbox' class='paybillX' sup='".$row["sup"]."' hol='".$row["hol"]."' sal='".$row["sal"]."'></td>
                                  <td>".$cnt_var++."</td>
                                  <td>".$row["clientname"]."</td>
                                  <td>".$row["holitype"]." </td>
                                  <td>".$row["holidest"]."</td>
                                  <td><b style='color:red;'>".$row["commamt"]." INR</b></td>
                                  <td>".$row["sup"]."</td>
                                  <td>".$row["hol"]."</td>
                                  <td>".$row["sal"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href=''>View</a></td>
                                  <td><a class='btn btn-success btn-sm' role='button' target='_blank' href=''>Download</a></td>
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
          $refnums = $row["refnums"];
          $mailid = $row["mailid"];
          $profilepath = $row["profilepath"];
         }
      }   

            
          $profile_totiq =  $profile_totic = $profile_totvq= $profile_totvc=0;

             ?>
<div class='row'>
        <div class='col-md-3'>
                <div class="panel panel-default">
                <div class="panel-body">
                  
                    <?php echo " <img  src='../profile/".$profilepath."' width='100%' height='50%'>";?>
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
                        <td>".$type."</td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>International & Domestic</td>
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
                        <td>Reference Numbers</td>
                        <td>".$refnums."</td>
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


<?php
if($type='Admin' || $type='Accounts')
{

?><script type="text/ng-template" id="pages/create_user.php"> 
              <h2>Create User</h2>
             
<div class='container'>

<div class='col-md-6'>

              <form method='POST' action='account_settings.php'>
              <div class="form-group">
                <label for="ad_username">Enter Full name</label>
                <input type="text" class="form-control" name='ad_username' id="ad_username" placeholder="Ex.Prashanth Kethavarupu" required>
              </div>

              <div class="form-group">
              <label for="ad_type">Choose Type:</label>
                <select class="form-control" name='ad_type' id="ad_type" required>
                  <option>Member</option>
                  <?php
                    if(!empty($userid) && $type == 'Admin')
                        echo "<option>Accounts</option>";
                  ?>
                </select>
              </div>
              <div class="form-group">
              <label for="ad_handletype">Choose User Type:</label>
                <select class="form-control" name='ad_handletype' id="ad_handletype" required>
                  <option>International</option>
                  <option>Domestic</option>
                  <option>Both</option>
                </select>
              </div>

              <div class="form-group">
                <label for="ad_userid">Enter User ID </label>
                <input type="text" class="form-control" id="ad_userid" name='ad_userid' placeholder="Ex. user@gogagaholidays.in" required>
              </div> 
              

              <button type="submit" class="btn btn-primary" name='crac'>Create Account</button>
              <br><br><br><br><br>
          </form>
</div>
<div class='col-md-2'>
         

</div>

<div class='col-md-4'>
         

</div>
</div>

           
</script>

<script type="text/ng-template" id="pages/fintran.php"> 
              <h2>Financial Transactions</h2>

                     <?php
                          $limit=200;

                           $from_date = "";
                        if(isset($_GET["search_tran"]))
                        { 
                            if(isset($_GET["from_date"])){
                                if($_GET["from_date"]!='D' && $_GET["from_mon"]!='M' && $_GET["from_year"]!='Y') 
                                $from_date = $_GET["from_year"]."-".$_GET["from_mon"]."-".$_GET["from_date"];
                              else
                                $from_date = "2000-1-1";
                   

                              if($_GET["to_date"]!='D' && $_GET["to_mon"]!='M' && $_GET["to_year"]!='Y') 
                                $to_date = $_GET["to_year"]."-".$_GET["to_mon"]."-".$_GET["to_date"];
                              else
                                $to_date = date("Y-m-d");


                                $from_date = date_create($from_date);
                                $from_date=  date_format($from_date,"Y-m-d");
                                $to_date = date_create($to_date);
                                $to_date=  date_format($to_date,"Y-m-d");
                            }


                          $search_tran = $_GET["search_tran"];
                          $sql = "SELECT * FROM transactions
                          WHERE ";
                          if(!empty($from_date))
                          $sql.="(Transaction_date >= '$from_date' and Transaction_date <= '$to_date') and ";

                          $sql.="GHRN_number LIKE '%".$search_tran."%' 
                          ORDER BY Transaction_number DESC
                          LIMIT $limit
                          ";
                            
                          $_SESSION['search_tran_val']=$_GET["search_tran"];
                        }
                      else
                      {
                       $sql= "SELECT * FROM transactions 
                       ORDER BY Transaction_number DESC
                       LIMIT $limit
                       ";
                        unset($_GET["search_tran"]);
                      }


      
      $res = $conn->query($sql) ;
      if ($res->num_rows) 
      {    


        $table_records =$res->num_rows;
        $sdtb = "danger";

        if($table_records >100 && $table_records <280)
              $sdtb = "warning";
        elseif($table_records< 100)
              $sdtb = "success";  
                

          $table_head = "<div class='table-responsive'> <table id='trantable' class='table table-hover table-bordered table-stripped table-list' style='background-color: white;'>";
          
          $table_tran = " 
                   <tr style='font-size:12px;'>
                      <th>Transaction number</th>
                      <th>Transaction Date </th>
                      <th>GHRN Number</th>
                      <th>Transaction Particulars</th>
                      <th>Transaction type</th>
                      <th>Credit</th>
                      <th>Debit</th>
                      <th>Balance</th>

                  </tr>";
                     $credit_tot=$debit_tot =0;
       while($row = $res->fetch_assoc()) 
      {    $date=date_create($row["Transaction_date"]);
            $dfor=  date_format($date,"d-M-Y");
          $table_tran.="<tr style='font-size:12px;'>
              <td>".$row["Transaction_number"]."</td>
              <td>".$dfor."</td>
              <td>".$row["GHRN_number"]."</td>
              <td>".$row["Transaction_particulars"]."</td>
              <td>".$row["Transaction_type"]."</td>
              <td>".$row["Credit"]."</td>
              <td>".$row["Debit"]."</td>
              <td>".(int)$row["Balance"]."/-</td>
            </tr>
            ";
            $credit_tot = $credit_tot + (int)$row["Credit"];
            $debit_tot = $debit_tot +(int)$row["Debit"];
      }
           $table_tran.="<tr style='font-size:12px;'>
              <td style='border:none;background-color:#FAF7F6;'></td>
              <td style='border:none;background-color:#FAF7F6;'></td>
              <td style='border:none;background-color:#FAF7F6;'></td>
              <td style='border:none;background-color:#FAF7F6;'></td>
              <td style='border:none;background-color:#FAF7F6;'></td>
              <td><b style='color:green;'>".(int)$credit_tot."</b></td>
              <td><b style='color:red;'>".(int)$debit_tot."</b></td>
              <td style='border:none;background-color:#FAF7F6;'></td>
            </tr>
            ";
      $_SESSION['table_data'] =$table_tran;

      $table_tran.= "</table></div>";

      }
      else
      { 
        $sdtb="danger";
        $table_records ="0";
        $table_head="";
        $table_tran="";
        
      }
   $form_page ="
                   <div class ='row'>               
                        <div class='col-md-12'>
                              
                                <form method='GET' action=''>
                                  <div class='row'>
                                    <div class='col-md-6'>
                                      <div class='input-group'>
                                          <input type='text' placeholder='Search Transactions by GHRN number' size='300' name ='search_tran' class='form-control' aria-label='...'>
                                      </div>
                                    </div>
                                    
                                    <div class='col-md-1'>
                                        <span class='input-group-btn'>
                                          <button class='btn btn-primary' type='submit'>Search</button>
                                        </span>
                                    </div>
                                  </div>  
                                

                                <div class='row'>
                                     <div  class='col-md-3' style='padding-left:30px;'><br>
                                       <label for='trandate'>From</label>
                                        <select name='from_date' style='height:40px;' > 
                                          <option value='D'>D</option> <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option>       
                                        </select> 
                                    
                                        <select name='from_mon' style='height:40px;' > 
                                          <option value='M'>M</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option>         
                                          <option value='12'>Dec</option>
                                        </select>  
                                  
                                        <select name='from_year' style='height:40px;' > 
                                          <option value='Y'>Y</option>
                                          ";

                                          
                                                $y=date("Y");
                                                $x=2010;
                                              while($x <= $y) 
                                              {
                                               $form_page .= "<option>".$x."</option>";
                                                $x++;
                                              } 
                                         

                                  $form_page.="</select>
                                     </div>
                                      
                                    <div class='col-md-5'><br>
                                      <label for='trandate'>To</label>
                                        <select name='to_date' style='height:40px;' > 
                                          <option value='D'>D</option> <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option>       
                                        </select> 
                                    
                                        <select name='to_mon' style='height:40px;' > 
                                          <option value='M'>M</option><option value='1'>Jan</option><option value='2'>Feb</option><option value='3'>Mar</option><option value='4'>Apr</option><option value='5'>May</option><option value='6'>Jun</option><option value='7'>Jul</option><option value='8'>Aug</option><option value='9'>Sep</option><option value='10'>Oct</option><option value='11'>Nov</option>         
                                          <option value='12'>Dec</option>
                                        </select>  
                                  <select name='to_year' style='height:40px;' > 
                                          <option value='Y'>Y</option>
                                          ";

                                          
                                                $y=date("Y");
                                                $x=2010;
                                              while($x <= $y) 
                                              {
                                               $form_page .= "<option>".$x."</option>";
                                                $x++;
                                              } 
                                         

                                  $form_page.="</select>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;<a target='_blank' href='alltrans.php'>View All</a>
                                     </div>

                                    <div class='col-md-1'>
                                    <br>
                                        <span class='input-group-btn'>
                                          <a class='btn btn-".$sdtb." btn-sm' role='button' href='downloadtable.php'>
                                          <span class='glyphicon glyphicon-download-alt' style='padding-right:6px;' aria-hidden='true'></span> PDF</a>
                                        </span>
                                    </div>
                                    
                                    <div class='col-md-1'><br>
                                       <span class='input-group-btn'>
                                            <a class='btn btn-primary btn-sm' role='button' href='#/newtran'>
                                            <span class='glyphicon glyphicon-pencil' style='padding-right:6px;' aria-hidden='true'></span> New</a>
                                       </span>
                                    </div>

                                    <div class='col-md-1 '><br>
                                       <span class='input-group-btn'>
                                           <a class='btn btn-danger btn-sm' role='button' href='#/edittran'>
                                           <span class='glyphicon glyphicon-edit' style='padding-right:6px;' aria-hidden='true'></span> Edit</a>
                                       </span>
                                    </div>
                                  </div>

                                  </form>
                                                         
                            </div><!-- /col-md-12 -->
                          </div><!-- row -->
                        ";




      echo "$form_page";

      echo "<div class='row'>
            <div class='col-md-6'><b style='color:red;'>$table_records</b> rows found</div>

      </div><br>";
      echo "$table_head $table_tran";
?>

 </script>                   


<script type="text/ng-template" id="pages/newtran.php"> 


              <h2>New Transactions</h2>

        
<div class='container'>

<div class='col-md-6'>

              <form method='POST' action='trans_setting.php'>

              <div class="form-group">
                <label for="trans_date">Transaction Date</label><br>

                <input type="text" class="pull-right" style="background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;" name="trans_date" id="trans_date" value="2018-02-15" size="10">
                    <!-- <select id="day_start" name="tran_date" style='height:40px;' required> 
                                           <?php 
                                              /*  $x=1;
                                                
                                              while($x <= 31) 
                                              {
                                                echo "<option>".$x."</option>";
                                                $x++;
                                              } */
                                            ?>       
                                  </select> 
                        
                                  <select id="month_start" name="tran_mon" style='height:40px;' required> 
                                            <?php
                                               /* $y=array("Jan", "Feb", "Mar", "Apr",
                                                "May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

                                                  for ($i=0; $i <=11; $i++) { 
                                                        echo "<option value ='".($i+1)."'>".$y[$i]."</option>";    
                                                     }*/
                                                     
                                            ?>         
                                  </select>  
                        
                                  <select id="year_start" name="tran_year" style='height:40px;' required> 
                                            
                                              <?php 
                                               /* $x=date("Y");
                                                $y=$x+10;
                                              while($x <= $y) 
                                              {
                                                echo "<option>".$x."</option>";
                                                $x++;
                                              } */
                                            ?>

                                         

                                  </select>
 -->
              </div>

              <div class="form-group">
                <label for="trans_part">Transaction Particulars</label>
                <input type="text" class="form-control" name='trans_part'  placeholder="Enter Transaction Particulars" id="trans_part" required>
              </div>

              <div class="form-group">
              <label for="transtype">Regular Transaction</label>
              <input type="text" class="form-control" name='transtype' placeholder="Enter Transaction type" id="transtype">
               
              </div>
              <div class="form-group">
              <label for="ghrnnumber">Towards GHRN Number</label>
                <input type="text" class="form-control" name='ghrnnumber' placeholder="Enter GHRN number" id="ghrnnumber">
              </div>

              <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name='amount' placeholder="Enter Amount in rupees" required>
              </div> 
               <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="tran1" value="credit" required>
                     Credit
                    </label>
                  </div>
                  <br>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="tran1" value="debit" required>
                      Debit
                    </label>
                  </div>
                  <br>
              <button type="submit" name='transubmit' class="btn btn-primary">Upload Transaction</button>
              <br><br><br><br><br>
          </form>
</div>
<div class='col-md-2'>
         

</div>

<div class='col-md-4'>
         

</div>
</div>



</script>

<script type="text/ng-template" id="pages/edittran.php"> 
              <h2>Edit Transactions</h2>

        
<div class='container'>

<div class='col-md-6'>

              <form method='POST' action='trans_setting.php'>

              <div class="form-group">
              <label for="transnumber">Transaction Number * </label>
              <input type="text" class="form-control" name='transnum' placeholder="Enter Transaction Number" id="transnumber" required>
              </div>
              <hr>
              <div class='alert alert-info' role='alert'>
              <strong>Note</strong>: Only Entered Fields will be reflected.
            </div>
              <div class="form-group">
              <label for="ghrnnumber">GHRN Number</label>
                <input type="text" class="form-control" name='ghrnnumber' placeholder="Enter GHRN number" id="ghrnnumber">
              </div>

               <div class="form-group">
              <label for="trandate">Transaction Date</label><br>
              <input type="text" class="pull-right" style="background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;" name="trans_date" id="trans_date" value="2018-02-15" size="10">
               
              </div>

              <div class="form-group">
                <label for="trans_part">Transaction Particulars</label>
                <input type="text" class="form-control" name='trans_part'  placeholder="Enter Transaction Particulars" id="trans_part">
              </div>

              <div class="form-group">
              <label for="transtype">Transaction type</label>
              <input type="text" class="form-control" name='transtype' placeholder="Enter Transaction type" id="transtype">
               
              </div>
              <!--
              <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name='amount' placeholder="Enter Amount in rupees">
              </div> 
              <hr>
              <b>Change Transaction Method</b>
              <br><br>
               <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="tran1" value="credit">
                     Credit
                    </label>
                  </div>
                  <br>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="tran1" value="debit">
                      Debit
                    </label>
                  </div>
                  -->
                  <br>
              <button type="submit" name='editsubmit' class="btn btn-primary">Edit Transaction</button>
             <!-- <button type="submit" name='delsubmit' class="btn btn-danger">Delete Transaction</button>-->
              <br><br><br><br><br>
          </form>
</div>
<div class='col-md-2'>
         

</div>

<div class='col-md-4'>
         

</div>
</div>



</script>
             



<script type="text/ng-template" id="pages/account_settings.php"> 
              <h2>Account Settings</h2>
              
<div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-9">
      <input type="text" placeholder='Search user account...' size='300' name ='search_param_acc' class="form-control" aria-label="...">
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

                    
                        if(isset($_GET["search_param_acc"]))
                        {   
                          $search_param_acc = $_GET["search_param_acc"];
                          $sql3 = "SELECT * FROM login
                          WHERE username  LIKE '%".$search_param_acc."%'
                          or userid LIKE '%".$search_param_acc."%'  
                          or handle_type LIKE '%".$search_param_acc."%'
                          or type LIKE '%".$search_param_acc."%'  
                          ORDER BY type";   
                        }
                      else
                      {
                        $sql3= "SELECT * FROM login  
                        ORDER BY type";
                        unset($_GET["search_param_acc"]);
                      }

                      $res = $conn->query($sql3) ;
                    if ($res->num_rows) 
                    {     echo " <div class='table-responsive'> <table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                  <th>S.no</th>
                                  <th>User name</th>
                                  <th>Type</th>
                                  <th>User Type</th>
                                  <th>User ID</th>
                                  <th></th>
                                  <th></th> 
                                </tr>";
                       
                              $i=1;    
                      while($row = $res->fetch_assoc()) 
                        {    if($row["acc_status"]=="Active")
                                {$kval="danger";$but = "Disable";}
                             else
                                {$kval="success";$but="Enable";}   
                            

                             if(!empty($userid))
                             {       


                                $button_val ="<form action='account_settings.php' method='POST'>
                                                        <input type='hidden' name='endis' value='".$but."'>
                                                        <input type='hidden' name='endisuser' value='".$row["userid"]."'>
                                                        <span class='input-group-btn'>
                                                          <button class='btn btn-".$kval."' type='submit'>".$but."</button>
                                                        </span>
                                              </form>";
                                if($row["type"] != 'Admin')           
                                  echo "<tr>
                                      <td>".$i."</td>
                                      <td>".$row["username"]."</td>
                                      <td>".$row["type"]."</td>
                                      <td>".$row["handle_type"]."</td>
                                      <td>".$row["userid"]."</td>
                                      <td><a class='btn btn-primary btn-sm' role='button' href='reset.php?uid=".$row["userid"]."'>RESET PWD</a></td>
                                      <td>".$button_val."</td>
                                    </tr>";
                                    $i++;

                              





                              }     
                          }
                          echo "</table></div>";
                    }
                    else
                      echo " No results found";
                              
                       



                      ?>



            
</script>


<script type="text/ng-template" id="pages/agentaccounts.php"> 
              <h2>Agent Account Requests</h2>
              
<div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-9">
      <input type="text" placeholder='Search user account...' size='300' name ='search_param_acc' class="form-control" aria-label="...">
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

                    
                        if(isset($_GET["search_param_acc"]))
                        {   
                          $search_param_acc = $_GET["search_param_acc"];
                          $sql3 = "SELECT * FROM login
                          WHERE username  LIKE '%".$search_param_acc."%'
                          or userid LIKE '%".$search_param_acc."%'  
                          or handle_type LIKE '%".$search_param_acc."%'
                          or type LIKE '%".$search_param_acc."%'  
                          ORDER BY type";   
                        }
                      else
                      {
                        $sql3= "SELECT * FROM login WHERE acc_status = 'inactive' AND joindate >= '2018-01-06' AND (type = 'superpartner' OR type = 'holidaypartner' OR type = 'salespartner')
                        ORDER BY joindate DESC";

                        unset($_GET["search_param_acc"]);
                      }

                      $res = $conn->query($sql3) ;
                    if ($res->num_rows) 
                    {     echo " <div class='table-responsive'> <table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                  <th>S.no</th>
                                  <th>User name</th>
                                  <th>Type</th>
                                  
                                  <th>User ID</th>
                                  <th></th>
                                  <th></th> 
                                </tr>";
                       
                              $i=1;    
                      while($row = $res->fetch_assoc()) 
                        {    if($row["acc_status"]=="Active")
                                {$kval="danger";$but = "Disable";}
                             else
                                {$kval="success";$but="Enable";}   
                            

                             if(!empty($userid))
                             {       


                                $button_val ="<form action='account_settings.php' method='POST'>
                                                        <input type='hidden' name='endis' value='".$but."'>
                                                        <input type='hidden' name='endisuser' value='".$row["userid"]."'>
                                                        <span class='input-group-btn'>
                                                          <button class='btn btn-".$kval."' type='submit'>".$but."</button>
                                                        </span>
                                              </form>";

                                if($row["type"] != 'Admin')           
                                  echo "<tr>
                                      <td>".$i."</td>
                                      <td>".$row["username"]."</td>
                                      <td>".$row["type"]."</td>
                                     
                                      <td>".$row["userid"]."</td>
                                      <td><a class='btn btn-primary' role='button' href='viewagent.php?uid=".$row["userid"]."'>VIEW</a></td>
                                      
                                    </tr>";
                                    $i++;

                              





                              }     
                          }
                          echo "</table></div>";
                    }
                    else
                      echo " No results found";
                              
                       



                      ?>



            
</script>


<?php
}

?>


<script type="text/ng-template" id="pages/settings.php"> 
              <h2>Settings</h2>
  
<div class='container'>

<div class='col-md-6'>

              <form method='POST' action='../settings.php' enctype="multipart/form-data">
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
                <label for="refnums">Reference number(s) </label>
                <input type="text" class="form-control" name='refnums' placeholder="Enter Reference number(s)" id="refnums">
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
                          $search_voucher = explode("N", $search_voucher);
                          $ref_param = (int)$search_voucher[1];
                          $ref_param = $ref_param - 5000;
                          
                          $sql1 = "SELECT * FROM vouchertable v INNER JOIN agent_form_data a ON v.ref_num=a.ref_num WHERE v.ref_num LIKE '%$ref_param%' ORDER BY v.ref_num DESC";   
                        }
                      else
                      {
                        $sql1= "SELECT * FROM vouchertable v INNER JOIN agent_form_data a ON v.ref_num=a.ref_num ORDER BY v.ref_num DESC";
                        unset($_GET["search_voucher"]);
                      }

                      $res = $conn->query($sql1) ;
                    if ($res->num_rows)

                    {     echo " <div class='table-responsive'> <table class='table table-hover table-list' style='background-color: white;'>
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
                               $color = "";
                      while($row = $res->fetch_assoc()) 
                          {
                              $dateissued = date_create($row["issuedon"]);
                              $dateissued = date_format($dateissued,"d-M-Y");

                              $downloaded = $row["downloaded"];
                              if($downloaded == "yes"){
                                $color = "background-color: #f1c40f";
                              }else{
                                $color = "background-color: #fff";
                              }
                              echo " <tr style='".$color."'>
                                  <td>GHRN".(5000+$row["ref_num"])."</td>
                                  <td>".$row["cust_firstname"]." ".$row["cust_lastname"]."</td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["date_of_travel"]."</td>
                                  <td>".$row["currently_worked_by"]."</td>
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
                                      <a href='../stuff/".$row["imgpath"]."'  data-fancybox='group' data-caption='".$row["imgname"]."'>
                                       <img src='../stuff/".$row["imgpath"]."'>
                                       
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

              <form method='POST' action='../uploadimage.php'  enctype="multipart/form-data">

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




<!--Marketing Flyers-->


<script type="text/ng-template" id="pages/marketingflyers.php"> 
              <h2>Marketing Flyers</h2>
              

               <?php
               $gallerycontent="";
              if(isset($_GET["search_image"]))
                        {   
                          $search_image = $_GET["search_image"];
                          $sql = "SELECT * FROM marketing_flyers 
                          WHERE location  LIKE '%".$search_image."%'  
                          ORDER BY img_id";   
                        }
                      else
                      {
                      $sql= "SELECT * FROM marketing_flyers ORDER BY img_id";
                      unset($_GET["search_image"]);
                      }
                    
                    $res = $conn->query($sql);
                    if ($res->num_rows) 
                    //if(5<4)
                    {    
                                  
                      while($row = $res->fetch_assoc()) 
                          {
                               

                              $gallerycontent.= "
                                      <a href='../marketingflyers/".$row["imgpath"]."'  data-fancybox='group' data-caption='".$row["location"]."'>
                                       <img src='../marketingflyers/".$row["imgpath"]."'>
                                       
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
                    <a class='btn btn-danger btn-md' role='button' href='#/marketingflyersupload'>Upload</a>
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
 

              <h2>Upload Marketing Flyers</h2>



<div class='container'>

<div class='col-md-6'>

              <form method='POST' action='uploadmarketingflyers.php'  enctype="multipart/form-data">

              <div class="form-group">
               <div class='alert alert-info' role='alert'>
                  <strong>Note</strong>: Only Entered Fields will be reflected.
              </div>

              <label for="location">Holiday Location</label>
              <input type="text" class="form-control" name='location' placeholder="Enter Holiday Location" id="location" required>
              </div>

              <div class="form-group">
                <label>Expiry Date</label>
                <input type="text" class="pull-right" style="background: #fff; cursor: pointer;   width: 100%; margin-bottom: 10px;"  name="expirydate" placeholder="2017-09-01" size="7" required>

              </div>

             
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
              include '../pricecalc.php';
            ?>

          </div>


            
</script>


<script type="text/ng-template" id="pages/gstdefault.php"> 
              <h2>GST Setter</h2>

              <?php 
              //first query and get the current percenatage from itinerary_domestic
              if(isset($_POST["gst"])){
                //gst value is given from the input
                //convert the given string value to int value
                $gst = (int)$_POST["gst"];
                $sql = "ALTER TABLE `itinerary_domestic` CHANGE `ser_tax_perc` `ser_tax_perc` INT(60) NOT NULL DEFAULT '$gst'";

               if (($conn->query($sql))== true) {
                 //success..
                //update the international itinerary too.
                $sql = "ALTER TABLE `itinerary_inter` CHANGE `ser_tax_perc` `ser_tax_perc` INT(60) NOT NULL DEFAULT '$gst'";
                  if (($conn->query($sql))== true){
                    echo "<p>success</p>";
                  }

               }else{
                echo "<p>Error</p>";
               }
              }
              


              ?>
             
<div class ='row'>               
<div class="col-md-6">
<form method="POST" action="">
  <div class="form-group">
      <label><b>GST%</b></label>
      <input type="number" name="gst" id="gst" class="form-control"><br>
      <button class="btn btn-primary" type="submit">Update</button>
    </div>
</form>
</div>

</div>

<br>
            
</script>



<script type="text/ng-template" id="pages/uploadedquotations.php"> 
              <h2>Uploaded Quotations</h2>

              <?php 
              
              $sql1= "SELECT * FROM uploadedquotations ORDER BY date DESC";
                     

                      $res = $conn->query($sql1) ;
                    if ($res->num_rows) 
                    {      echo " <div class='table-responsive'> <table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                  <th>Sno</th>
                                  <th>Partner Name</th>
                                  <th>Uploaded File</th>
                                  <th>File Description</th>
                                  <th>Uploaded Date</th>
                                  
                                </tr>";
                               
                             
                                $sno = 1;
                      while($row = $res->fetch_assoc()) 
                          {

                            echo " <tr style='background-color: $color;'>
                                  <td>".$sno++."</td>
                                 <td>".$row["partnername"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' href='../partners/uploads/".$row["file_location"]."'>View</a></td>
                                  <td>".$row["file_desc"]."</td>
                                  <td>".$row["date"]."</td>
                                  ";

                          }
                          echo "</table></div>";
                    }
                    else
                      echo " No results found";


              ?>
             
<div class ='row'>               


</div>

<br>
            
</script>


          
<script type="text/ng-template" id="pages/currencyconv.php"> 
              <h2>Currency Calculator</h2>
              
            
  <div class="col-md-9">


  <form method="post" id="currency-form">     
    <div class="form-group">
    <label><b>From&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
      <select name="from_currency">
        <option value="INR">Indian Rupee</option>
        <option value="USD" selected="1">US Dollar</option>
        <option value="AUD">Australian Dollar</option>
        <option value="EUR">Euro</option>
        <option value="EGP">Egyptian Pound</option>
        <option value="CNY">Chinese Yuan</option>
          <option value="INR">Indian Rupee</option><option value="USD" selected="1">US Dollar</option><option value="AFA">Afghan Afghani</option><option value="ALL">Albanian Lek</option><option value="DZD">Algerian Dinar</option><option value="AOA">Angolan Kwanza</option><option value="ARS">Argentine Peso</option><option value="AMD">Armenian Dram</option><option value="AWG">Aruban Florin</option><option value="AUD">Australian Dollar</option><option value="AZN">Azerbaijani Manat</option><option value="BSD">Bahamian Dollar</option><option value="BHD">Bahraini Dinar</option><option value="BDT">Bangladeshi Taka</option><option value="BBD">Barbadian Dollar</option><option value="BYR">Belarusian Ruble</option><option value="BEF">Belgian Franc</option><option value="BZD">Belize Dollar</option><option value="BMD">Bermudan Dollar</option><option value="BTN">Bhutanese Ngultrum</option><option value="BTC">Bitcoin</option><option value="BOB">Bolivian Boliviano</option><option value="BAM">Bosnia-Herzegovina Convertible Mark</option><option value="BWP">Botswanan Pula</option><option value="BRL">Brazilian Real</option><option value="GBP">British Pound</option><option value="BND">Brunei Dollar</option><option value="BGN">Bulgarian Lev</option><option value="BIF">Burundian Franc</option><option value="KHR">Cambodian Riel</option><option value="CAD">Canadian Dollar</option><option value="CVE">Cape Verdean Escudo</option><option value="KYD">Cayman Islands Dollar</option><option value="XAF">Central African CFA Franc</option><option value="XPF">CFP Franc</option><option value="CLP">Chilean Peso</option><option value="CNY">Chinese Yuan</option><option value="COP">Colombian Peso</option><option value="KMF">Comorian Franc</option><option value="CDF">Congolese Franc</option><option value="CRC">Costa Rican Col�n</option><option value="HRK">Croatian Kuna</option><option value="CUC">Cuban Convertible Peso</option><option value="CZK">Czech Republic Koruna</option><option value="DKK">Danish Krone</option><option value="DJF">Djiboutian Franc</option><option value="DOP">Dominican Peso</option><option value="XCD">East Caribbean Dollar</option><option value="EGP">Egyptian Pound</option><option value="ERN">Eritrean Nakfa</option><option value="EEK">Estonian Kroon</option><option value="ETB">Ethiopian Birr</option><option value="EUR">Euro</option><option value="FKP">Falkland Islands Pound</option><option value="FJD">Fijian Dollar</option><option value="GMD">Gambian Dalasi</option><option value="GEL">Georgian Lari</option><option value="DEM">German Mark</option><option value="GHS">Ghanaian Cedi</option><option value="GIP">Gibraltar Pound</option><option value="GRD">Greek Drachma</option><option value="GTQ">Guatemalan Quetzal</option><option value="GNF">Guinean Franc</option><option value="GYD">Guyanaese Dollar</option><option value="HTG">Haitian Gourde</option><option value="HNL">Honduran Lempira</option><option value="HKD">Hong Kong Dollar</option><option value="HUF">Hungarian Forint</option><option value="ISK">Icelandic Kr�na</option><option value="IDR">Indonesian Rupiah</option><option value="IRR">Iranian Rial</option><option value="IQD">Iraqi Dinar</option><option value="ILS">Israeli New Sheqel</option><option value="ITL">Italian Lira</option><option value="JMD">Jamaican Dollar</option><option value="JPY">Japanese Yen</option><option value="JOD">Jordanian Dinar</option><option value="KZT">Kazakhstani Tenge</option><option value="KES">Kenyan Shilling</option><option value="KWD">Kuwaiti Dinar</option><option value="KGS">Kyrgystani Som</option><option value="LAK">Laotian Kip</option><option value="LVL">Latvian Lats</option><option value="LBP">Lebanese Pound</option><option value="LSL">Lesotho Loti</option><option value="LRD">Liberian Dollar</option><option value="LYD">Libyan Dinar</option><option value="LTL">Lithuanian Litas</option><option value="MOP">Macanese Pataca</option><option value="MKD">Macedonian Denar</option><option value="MGA">Malagasy Ariary</option><option value="MWK">Malawian Kwacha</option><option value="MYR">Malaysian Ringgit</option><option value="MVR">Maldivian Rufiyaa</option><option value="MRO">Mauritanian Ouguiya</option><option value="MUR">Mauritian Rupee</option><option value="MXN">Mexican Peso</option><option value="MDL">Moldovan Leu</option><option value="MNT">Mongolian Tugrik</option><option value="MAD">Moroccan Dirham</option><option value="MZM">Mozambican Metical</option><option value="MMK">Myanmar Kyat</option><option value="NAD">Namibian Dollar</option><option value="NPR">Nepalese Rupee</option><option value="ANG">Netherlands Antillean Guilder</option><option value="TWD">New Taiwan Dollar</option><option value="NZD">New Zealand Dollar</option><option value="NIO">Nicaraguan C�rdoba</option><option value="NGN">Nigerian Naira</option><option value="KPW">North Korean Won</option><option value="NOK">Norwegian Krone</option><option value="OMR">Omani Rial</option><option value="PKR">Pakistani Rupee</option><option value="PAB">Panamanian Balboa</option><option value="PGK">Papua New Guinean Kina</option><option value="PYG">Paraguayan Guarani</option><option value="PEN">Peruvian Nuevo Sol</option><option value="PHP">Philippine Peso</option><option value="PLN">Polish Zloty</option><option value="QAR">Qatari Rial</option><option value="RON">Romanian Leu</option><option value="RUB">Russian Ruble</option><option value="RWF">Rwandan Franc</option><option value="SVC">Salvadoran Col�n</option><option value="WST">Samoan Tala</option><option value="SAR">Saudi Riyal</option><option value="RSD">Serbian Dinar</option><option value="SCR">Seychellois Rupee</option><option value="SLL">Sierra Leonean Leone</option><option value="SGD">Singapore Dollar</option><option value="SKK">Slovak Koruna</option><option value="SBD">Solomon Islands Dollar</option><option value="SOS">Somali Shilling</option><option value="ZAR">South African Rand</option><option value="KRW">South Korean Won</option><option value="XDR">Special Drawing Rights</option><option value="LKR">Sri Lankan Rupee</option><option value="SHP">St. Helena Pound</option><option value="SDG">Sudanese Pound</option><option value="SRD">Surinamese Dollar</option><option value="SZL">Swazi Lilangeni</option><option value="SEK">Swedish Krona</option><option value="CHF">Swiss Franc</option><option value="SYP">Syrian Pound</option><option value="STD">S�o Tome Pr�ncipe Dobra</option><option value="TJS">Tajikistani Somoni</option><option value="TZS">Tanzanian Shilling</option><option value="THB">Thai Baht</option><option value="TOP">Tongan Pa?anga</option><option value="TTD">Trinidad Tobago Dollar</option><option value="TND">Tunisian Dinar</option><option value="TRY">Turkish Lira</option><option value="TMT">Turkmenistani Manat</option><option value="UGX">Ugandan Shilling</option><option value="UAH">Ukrainian Hryvnia</option><option value="AED">United Arab Emirates Dirham</option><option value="UYU">Uruguayan Peso</option><option value="UZS">Uzbekistani Som</option><option value="VUV">Vanuatu Vatu</option><option value="VEF">Venezuelan Bol�var</option><option value="VND">Vietnamese Dong</option><option value="XOF">West African CFA Franc</option><option value="YER">Yemeni Rial</option><option value="ZMK">Zambian Kwacha</option>
      </select> <br>
      <label><b>Amount</b></label> 
      <input type="text" placeholder="Currency" name="amount" id="amount" required />  <br>    
      <label><b>To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
      <select name="to_currency">
        <option value="INR" selected="1">Indian Rupee</option>
        <option value="USD">US Dollar</option>
        <option value="AUD">Australian Dollar</option>
        <option value="EUR">Euro</option>
        <option value="EGP">Egyptian Pound</option>
        <option value="CNY">Chinese Yuan</option>
        <option value="INR" selected="1">Indian Rupee</option><option value="USD">US Dollar</option><option value="AFA">Afghan Afghani</option><option value="ALL">Albanian Lek</option><option value="DZD">Algerian Dinar</option><option value="AOA">Angolan Kwanza</option><option value="ARS">Argentine Peso</option><option value="AMD">Armenian Dram</option><option value="AWG">Aruban Florin</option><option value="AUD">Australian Dollar</option><option value="AZN">Azerbaijani Manat</option><option value="BSD">Bahamian Dollar</option><option value="BHD">Bahraini Dinar</option><option value="BDT">Bangladeshi Taka</option><option value="BBD">Barbadian Dollar</option><option value="BYR">Belarusian Ruble</option><option value="BEF">Belgian Franc</option><option value="BZD">Belize Dollar</option><option value="BMD">Bermudan Dollar</option><option value="BTN">Bhutanese Ngultrum</option><option value="BTC">Bitcoin</option><option value="BOB">Bolivian Boliviano</option><option value="BAM">Bosnia Herzegovina Convertible Mark</option><option value="BWP">Botswanan Pula</option><option value="BRL">Brazilian Real</option><option value="GBP">British Pound</option><option value="BND">Brunei Dollar</option><option value="BGN">Bulgarian Lev</option><option value="BIF">Burundian Franc</option><option value="KHR">Cambodian Riel</option><option value="CAD">Canadian Dollar</option><option value="CVE">Cape Verdean Escudo</option><option value="KYD">Cayman Islands Dollar</option><option value="XAF">Central African CFA Franc</option><option value="XPF">CFP Franc</option><option value="CLP">Chilean Peso</option><option value="CNY">Chinese Yuan</option><option value="COP">Colombian Peso</option><option value="KMF">Comorian Franc</option><option value="CDF">Congolese Franc</option><option value="CRC">Costa Rican Col�n</option><option value="HRK">Croatian Kuna</option><option value="CUC">Cuban Convertible Peso</option><option value="CZK">Czech Republic Koruna</option><option value="DKK">Danish Krone</option><option value="DJF">Djiboutian Franc</option><option value="DOP">Dominican Peso</option><option value="XCD">East Caribbean Dollar</option><option value="EGP">Egyptian Pound</option><option value="ERN">Eritrean Nakfa</option><option value="EEK">Estonian Kroon</option><option value="ETB">Ethiopian Birr</option><option value="EUR">Euro</option><option value="FKP">Falkland Islands Pound</option><option value="FJD">Fijian Dollar</option><option value="GMD">Gambian Dalasi</option><option value="GEL">Georgian Lari</option><option value="DEM">German Mark</option><option value="GHS">Ghanaian Cedi</option><option value="GIP">Gibraltar Pound</option><option value="GRD">Greek Drachma</option><option value="GTQ">Guatemalan Quetzal</option><option value="GNF">Guinean Franc</option><option value="GYD">Guyanaese Dollar</option><option value="HTG">Haitian Gourde</option><option value="HNL">Honduran Lempira</option><option value="HKD">Hong Kong Dollar</option><option value="HUF">Hungarian Forint</option><option value="ISK">Icelandic Kr�na</option><option value="IDR">Indonesian Rupiah</option><option value="IRR">Iranian Rial</option><option value="IQD">Iraqi Dinar</option><option value="ILS">Israeli New Sheqel</option><option value="ITL">Italian Lira</option><option value="JMD">Jamaican Dollar</option><option value="JPY">Japanese Yen</option><option value="JOD">Jordanian Dinar</option><option value="KZT">Kazakhstani Tenge</option><option value="KES">Kenyan Shilling</option><option value="KWD">Kuwaiti Dinar</option><option value="KGS">Kyrgystani Som</option><option value="LAK">Laotian Kip</option><option value="LVL">Latvian Lats</option><option value="LBP">Lebanese Pound</option><option value="LSL">Lesotho Loti</option><option value="LRD">Liberian Dollar</option><option value="LYD">Libyan Dinar</option><option value="LTL">Lithuanian Litas</option><option value="MOP">Macanese Pataca</option><option value="MKD">Macedonian Denar</option><option value="MGA">Malagasy Ariary</option><option value="MWK">Malawian Kwacha</option><option value="MYR">Malaysian Ringgit</option><option value="MVR">Maldivian Rufiyaa</option><option value="MRO">Mauritanian Ouguiya</option><option value="MUR">Mauritian Rupee</option><option value="MXN">Mexican Peso</option><option value="MDL">Moldovan Leu</option><option value="MNT">Mongolian Tugrik</option><option value="MAD">Moroccan Dirham</option><option value="MZM">Mozambican Metical</option><option value="MMK">Myanmar Kyat</option><option value="NAD">Namibian Dollar</option><option value="NPR">Nepalese Rupee</option><option value="ANG">Netherlands Antillean Guilder</option><option value="TWD">New Taiwan Dollar</option><option value="NZD">New Zealand Dollar</option><option value="NIO">Nicaraguan C�rdoba</option><option value="NGN">Nigerian Naira</option><option value="KPW">North Korean Won</option><option value="NOK">Norwegian Krone</option><option value="OMR">Omani Rial</option><option value="PKR">Pakistani Rupee</option><option value="PAB">Panamanian Balboa</option><option value="PGK">Papua New Guinean Kina</option><option value="PYG">Paraguayan Guarani</option><option value="PEN">Peruvian Nuevo Sol</option><option value="PHP">Philippine Peso</option><option value="PLN">Polish Zloty</option><option value="QAR">Qatari Rial</option><option value="RON">Romanian Leu</option><option value="RUB">Russian Ruble</option><option value="RWF">Rwandan Franc</option><option value="SVC">Salvadoran Col�n</option><option value="WST">Samoan Tala</option><option value="SAR">Saudi Riyal</option><option value="RSD">Serbian Dinar</option><option value="SCR">Seychellois Rupee</option><option value="SLL">Sierra Leonean Leone</option><option value="SGD">Singapore Dollar</option><option value="SKK">Slovak Koruna</option><option value="SBD">Solomon Islands Dollar</option><option value="SOS">Somali Shilling</option><option value="ZAR">South African Rand</option><option value="KRW">South Korean Won</option><option value="XDR">Special Drawing Rights</option><option value="LKR">Sri Lankan Rupee</option><option value="SHP">St. Helena Pound</option><option value="SDG">Sudanese Pound</option><option value="SRD">Surinamese Dollar</option><option value="SZL">Swazi Lilangeni</option><option value="SEK">Swedish Krona</option><option value="CHF">Swiss Franc</option><option value="SYP">Syrian Pound</option><option value="STD">S�o Tome Pr�ncipe Dobra</option><option value="TJS">Tajikistani Somoni</option><option value="TZS">Tanzanian Shilling</option><option value="THB">Thai Baht</option><option value="TOP">Tongan Pa?anga</option><option value="TTD">Trinidad Tobago Dollar</option><option value="TND">Tunisian Dinar</option><option value="TRY">Turkish Lira</option><option value="TMT">Turkmenistani Manat</option><option value="UGX">Ugandan Shilling</option><option value="UAH">Ukrainian Hryvnia</option><option value="AED">United Arab Emirates Dirham</option><option value="UYU">Uruguayan Peso</option><option value="UZS">Uzbekistani Som</option><option value="VUV">Vanuatu Vatu</option><option value="VEF">Venezuelan Bol�var</option><option value="VND">Vietnamese Dong</option><option value="XOF">West African CFA Franc</option><option value="YER">Yemeni Rial</option><option value="ZMK">Zambian Kwacha</option>
      </select> <br><br> 
      <button type="submit" name="convert" id="convert" class="btn btn-primary">Convert</button>  
        
    </div>      
  </form> 
  
  <div class="form-group" id="converted_rate"></div>  
  <div id="converted_amount"></div>



    

       
    </div>
</div>



</script>

<script type="text/ng-template" id="pages/notification.php"> 
              <h2>Notifications</h2>
              
</script>


<script type="text/ng-template" id="pages/itsubmitted.php"> 
              <h2>Submitted Itineraries</h2>
              
        
<div class ='row'>               

  <div class="col-md-9">
    <div class="input-group">
      <form method='GET' action=''>
      
      <div class="col-md-9">
      <input type="text" placeholder='Type here...' name ='search_param_submitted' id='search_param_submitted' size='300' class="form-control" aria-label="...">
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
                          $search_param_submitted = explode("N", $search_param_submitted);
                          $param_ref = (int)$search_param_submitted[1];
                          $param_ref = $param_ref - 5000;

                  

                          $sql1 = "SELECT * FROM agent_form_data INNER JOIN login WHERE
                          (agent_form_data.currently_worked_by = login.userid) and
                          (formstatus != 'pending' and formstatus != 'smashed') and 
                          (ref_num LIKE '%".$param_ref."%')  
                          ORDER BY ref_num DESC";   

                        }
                      else
                      {
                        $sql1= "SELECT * FROM agent_form_data INNER JOIN login WHERE
                          (agent_form_data.currently_worked_by = login.userid) and formstatus != 'pending' and formstatus != 'smashed'
                                ORDER BY ref_num DESC";
                        unset($_GET["search_param_submitted"]);
                      }



                      $res = $conn->query($sql1) ;
                    if ($res->num_rows) 
                    {      echo " <div class='table-responsive'> <table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                  <th>GHRN NO</th>
                                  <th>Customer Name</th>
                                  <th>Customer Phone</th>
                                  <th>Destination</th>
                                  <th>Sent Date</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Employee</th>
                                  <th>Actions</th>
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
                                  <td>GHRN".(5000+$row["ref_num"])."</td>
                                 <td>".$row["cust_firstname"]." ".$row["cust_lastname"]."</td>
                                  <td>".$row["contact_phone"]."</td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["senttocustomerdate"]."</td>
                                  <td>".$row["date_of_travel"]."</td>
                                  <td>".$row["return_date_of_travel"]."</td>
                                  <td>".$row["username"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='view.php?q=".$row["ref_num"]."&r=".$row["holi_type"]."'>View</a></td>
                                  <td><a class='btn btn-warning btn-sm' role='button' href='backend.php?qr=".$row["ref_num"]."'>Modify</a></td>";
                                  if($row["formstatus"] != "confirmed")
                                   
                                  {
                                    
                                    echo "
                                    
                                  </tr>";
                                  }
                                  else{
                                    echo "
                                    
                                  </tr>";
                                  }



                          }
                          echo "</table></div>";
                    }
                    else
                      echo " No results found";
                              
                       



                      ?>
</script>


<script type="text/ng-template" id="pages/itsmashed.php"> 
              <h3>Deleted Itineraries</h3>

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
                          $param_ref = (int)$search_param_smashed;
                          $sql1 = "SELECT * FROM agent_form_data WHERE
                          (formstatus = 'smashed') and 
                          (ref_num LIKE '%".$param_ref."%')  
                          ORDER BY ref_num DESC";   
                        }
                      else
                      {
                        $sql1= "SELECT * FROM agent_form_data a LEFT JOIN deleted_itineraries d ON a.ref_num = d.ghrno
                        WHERE a.formstatus = 'smashed'
                        ORDER BY a.ref_num DESC";
                        unset($_GET["search_param_smashed"]);
                      }



                      $res = $conn->query($sql1) ;
                    if ($res->num_rows)


                    {     echo " <div class='table-responsive'> <table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                  <th>Ref.no</th>
                                  <th>Customer Name</th>
                                  <th>Destination</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Duration</th>
                                  <th>Type</th>
                                  <th></th>
                                  
                                  <th></th>
                                  <th>Reason</th>
                                </tr>";
                               
                      while($row = $res->fetch_assoc()) 
                          {
                             
                              echo " <tr>
                                  <td>".$row["ref_num"]."</td>
                                  <td>".$row["cust_firstname"]." ".$row["cust_lastname"]."</td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["date_of_travel"]."</td>
                                  <td>".$row["return_date_of_travel"]."</td>
                                  <td>".$row["duration"]."</td>
                                  <td>".$row["holi_type"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='../view_itinerary.php?q=".$row["ref_num"]."'>View</a></td>
                                  
                                  <td><a class='btn btn-danger btn-sm' role='button' href='smashit.php?qr=".$row["ref_num"]."'>Restore</a></td>
                                  <td>".$row["reason"]."</td>

                                </tr>";

                              

                          }
                          echo "</table></div>";
                    }
                    else
                      echo " No results found";
                              
                       



                      ?>         




</script>




<script type="text/ng-template" id="pages/itpending.php"> 
              <h3>Pending Itineraries</h3>
              
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

<!-- Button trigger modal -->


            <div class="modal fade" id="deleteitModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="documnent">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
              </div>
              <div class="modal-body">
                <p >Dear User, You are about to Delete the package,</p><p>please provide a valid reason, before confirming.</p>
                <div class="form-group">
                  <label for="deletereason"><b>Reason:</b></label><br>
                  <textarea name="deletereason" id="deletereason" placeholder="Enter Reason for Deleting itinerary" cols="50" rows="6" autofocus required></textarea>
                </div>
                
                <b><p id="pagetitleinmodal"></p></b>
                <p id="pagetitledeleteError"></p>
              </div>
              <div class="modal-footer">
                <button type="button" id="submitReason" class="btn btn-warning pull-left" onClick="#">Submit Reason</button>
                <a href='#' type="button" id="pagedeleteYes" class="btn btn-danger" disabled="disabled">Delete</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

      <br>
      <br>              

                     <?php
                     /*

                       $sql1 = "SELECT * FROM agent_form_data
                          WHERE holi_type= '".$handle_type."' AND 

                          holi_dest LIKE '%".$search_param_pending."%'
                          or ref_num LIKE '%".$search_param_pending."%'  
                          ORDER BY ref_num DESC";   
                          */

                    
                        if(isset($_GET["search_param_pending"]))
                        {  


                          $search_param_pending = $_GET["search_param_pending"];
                          $search_param_pending = explode("N", $search_param_pending);
                          $ref_param = (int)$search_param_pending[1];
                          $ref_param = $ref_param - 5000;


                          $sql1 = "SELECT * FROM agent_form_data WHERE
                          (formstatus = 'pending') and 
                          (ref_num LIKE '%".$ref_param."%')  
                          ORDER BY ref_num DESC";   
                        }
                      else
                      {
                        $sql1= "SELECT * FROM agent_form_data
                        WHERE formstatus = 'pending'
                        ORDER BY ref_num DESC";
                        unset($_GET["search_param_pending"]);
                      }



                      $res = $conn->query($sql1) ;
                    if ($res->num_rows)
                    {     echo " <div class='table-responsive'> <table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                  <th>GHRN no</th>
                                  <th>Customer Name</th>
                                  <th>Destination</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Duration</th>
                                  <th>Form Received on</th>
                                  <th>Currently worked by</th>
                                  <th>View</th>
                                  <th>Delete</th>
                                </tr>";
                               
                      while($row = $res->fetch_assoc()) 
                          {
                              
                                $datesent =date_create($row["datesent"]);
                                $datesent =date_format($datesent,"d-M-Y");
                             
                              echo " <tr>
                                  <td>GHRN".(5000+$row["ref_num"])."</td>
                                   <td>".$row["cust_firstname"]." ".$row["cust_lastname"]."</td>
                                  <td>".$row["holi_dest"]."</td>
                                  <td>".$row["date_of_travel"]."</td>
                                  <td>".$row["return_date_of_travel"]."</td>
                                  <td>".$row["duration"]."</td>
                                  <td>".$datesent."</td>
                                  <td>".$row["currently_worked_by"]."</td>
                                  <td><a class='btn btn-primary btn-sm' role='button' target='_blank' href='../view_itinerary.php?q=".$row["ref_num"]."'>View Form</a></td>
                                  
                                  <td><button type='button' name='deleteit' id='deleteit' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteitModal' role='button' onclick='passRefValue(".$row["ref_num"].");'>Delete</button></td>

                                </tr>";

                               

                          }
                          echo "</table></div>";
                    }
                    else
                      echo " No results found";
                              
                       



                      ?>
</script>



<script>
$(document).ready(function(){

  var supK = 0;
  var holK = 0;
  var salK = 0;
        $(".paybill").change(function() {
          console.log("clicked");
               if($(this).is(":checked")) {
                //'checked' event code
                 console.log("checked");
              var sup = $(this).attr("sup");         // Retrieves the text within <td>
              var hol = $(this).attr("hol");         // Retrieves the text within <td>

              var sal = $(this).attr("sal");       // Retrieves the text within <td>

              console.log("got this sup amount ");
              console.log(sup);
              console.log("got this hol amount ");
              console.log(hol);

              console.log("got this sal amount ");
              console.log(sal);

              supK = supK + parseInt(sup); 
              holK = holK + parseInt(hol); 
              salK = salK + parseInt(sal); 
              //now add and display

              $("#supAmount").text(supK);
              $("#holAmount").text(holK);
              $("#salAmount").text(salK);

                  
             
                return;
             }else if(!($(this).is(":checked"))){
              //'unchecked' event code
              //empty the json object
         console.log("unchecked");
              var sup = $(this).attr("sup");         // Retrieves the text within <td>
              var hol = $(this).attr("hol");         // Retrieves the text within <td>

              var sal = $(this).attr("sal");       // Retrieves the text within <td>




              //subtract them on uncheck

              supK = supK - parseInt(sup); 
              holK = holK - parseInt(hol); 
              salK = salK - parseInt(sal);


                //now add and display

              $("#supAmount").text(supK);
              $("#holAmount").text(holK);
              $("#salAmount").text(salK); 
                  

              //make the values as zero of sup, hol, sal
              console.log("got this sup amount ");
              console.log(sup);
              console.log("got this hol amount ");
              console.log(hol);

              console.log("got this sal amount ");
              console.log(sal);

      


             }
             


          });
});  



$(document).ready(function(){

  var supX = 0;
  var holX = 0;
  var salX = 0;
        $(".paybillX").change(function() {
          console.log("clicked");
               if($(this).is(":checked")) {
                //'checked' event code
                 console.log("checked");
              var sup = $(this).attr("sup");         // Retrieves the text within <td>
              var hol = $(this).attr("hol");         // Retrieves the text within <td>

              var sal = $(this).attr("sal");       // Retrieves the text within <td>

              console.log("got this sup amount ");
              console.log(sup);
              console.log("got this hol amount ");
              console.log(hol);

              console.log("got this sal amount ");
              console.log(sal);

              supX = supX + parseInt(sup); 
              holX = holX + parseInt(hol); 
              salX = salX + parseInt(sal); 
              //now add and display

              $("#supAmountX").text(supX);
              $("#holAmountX").text(holX);
              $("#salAmountX").text(salX);

                  
             
                return;
             }else if(!($(this).is(":checked"))){
              //'unchecked' event code
              //empty the json object
         console.log("unchecked");
              var sup = $(this).attr("sup");         // Retrieves the text within <td>
              var hol = $(this).attr("hol");         // Retrieves the text within <td>

              var sal = $(this).attr("sal");       // Retrieves the text within <td>




              //subtract them on uncheck

              supX = supX - parseInt(sup); 
              holX = holX - parseInt(hol); 
              salX = salX - parseInt(sal);


                //now add and display

              $("#supAmountX").text(supX);
              $("#holAmountX").text(holX);
              $("#salAmountX").text(salX); 
                  

              //make the values as zero of sup, hol, sal
              console.log("got this sup amount ");
              console.log(sup);
              console.log("got this hol amount ");
              console.log(hol);

              console.log("got this sal amount ");
              console.log(sal);

      


             }
             


          });
});  




$(".paybill").change(function() {
          console.log("clicked");
               if($(this).is(":checked")) {
                //'checked' event code
                 console.log("checked");
              var sup = $(this).closest("tr")   // Finds the closest row <tr> 
                                 .find("sup")     // Gets a descendent with class="nr"
                                 .text();         // Retrieves the text within <td>
              var hol = $(this).closest("tr")   // Finds the closest row <tr> 
                                 .find("hol")     // Gets a descendent with class="nr"
                                 .text();         // Retrieves the text within <td>

              var sal = $(this).closest("tr")   // Finds the closest row <tr> 
                                 .find("sal")     // Gets a descendent with class="nr"
                                 .text();         // Retrieves the text within <td>

              console.log("got this sup amount ");
              console.log(sup);
              console.log("got this hol amount ");
              console.log(hol);

              console.log("got this sal amount ");
              console.log(sal);
                  
             
                return;
             }else if(!($(this).is(":checked"))){
              //'unchecked' event code
              //empty the json object
              var uniqueno = $(this).closest("tr")   // Finds the closest row <tr> 
                                 .find(".uniqueno")     // Gets a descendent with class="nr"
                                 .text();         // Retrieves the text within <td>
              var bill_date = $(this).closest("tr")   // Finds the closest row <tr> 
                                 .find(".bill_date")     // Gets a descendent with class="nr"
                                 .text();         // Retrieves the text within <td>

              console.log("got this uniqueno ");
              console.log(uniqueno);
              console.log("got this bill_date ");
              console.log(bill_date);
                  
      


             }
             


          });

</script>



<script>

$(document).ready(function(){



var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: ""
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
    name: "Total Itineraries Quoted",
    markerType: "square",
    xValueFormatString: "DD MMM, YYYY",
    color: "#0275d8",
    dataPoints: <?php echo "$dataPoints_itineraries_quoted";?>
  },
  {
    type: "column",
    showInLegend: true,
    name: "Total Itineraries Converted",
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
    text: ""
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
    name: "Total Volume Quoted",
    markerType: "square",
    xValueFormatString: "DD MMM, YYYY",
    color: "#f1c40f",
    dataPoints: <?php echo "$dataPoints_volume_quoted";?>
  },
  {
    type: "column",
    showInLegend: true,
    name: "Total Volume Converted",
    lineDashType: "dash",
    color: "#5cb85c",
    dataPoints: <?php echo "$dataPoints_volume_converted";?>
  }]
});
chart1.render();







var chart2 = new CanvasJS.Chart("chartContainer2", {
  animationEnabled: true, 
  theme: "light2", 
  title:{
    text: "COMPANY NET PROFITS"
  },
  axisY: {
      crosshair: {
      enabled: true
    },
    stripLines: [{
      value: <?php echo "$avgprofit";?>,
      label: "Average"
    }]
  },
  data: [{
    yValueFormatString: "#,### INR",
    xValueFormatString: "YYYY",
    type: "spline",
    dataPoints: <?php echo "$profit_graphdata";?>
  }]
});
chart2.render();




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
   
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src='js/appp.js'></script>

<script type="text/javascript">
  
  $(document).on("focus", "input[name='trans_date']", function() {


     //hotels checkindate daterangepicker          
  $("input[name='trans_date']").daterangepicker({
        singleDatePicker: true,
        startDate: moment(),
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');
        console.log("Year:" + years);
        //change the selected date range of that picker

    });

});



</script>



</body>
</html>
