<?php
require("config.php");
session_start();



if(isset($_GET["ref"]))
{
  $ref_value= $_GET["ref"];
  $_SESSION["vref_val"] = $ref_value;
          
                $sql = "SELECT * FROM vouchertable WHERE ref_num = '$ref_value' ";

                $res = $conn->query($sql) ;
                if ($res->num_rows) 
                {     
                   if($row = $res->fetch_assoc()) 
                   {      
                          $tourmng =$row["tourmng"];
                          $confir_no =$row["confir_no"];
                          $paxnames =$row["paxnames"];
                          $reftype =$row["reftype"];
                          $_SESSION["vref_type"] = $reftype; 
                    }
                }

// Scheduled Itinerary
  $schitinerary="";
if($reftype == "International")
{
   $sql = "SELECT * FROM hotels_inter WHERE ghrnno = '$ref_value' ORDER BY sno";

                $res = $conn->query($sql) ;
                if ($res->num_rows) 
                {     
                   while($row = $res->fetch_assoc()) 
                   {      
                          $hotel= $row["hotel"];
                          $hoteladdr= $row["hoteladdr"];
                          $checkindate= $row["checkindate"];
                          $checkoutdate= $row["checkoutdate"];
                          $checkintime= $row["checkintime"];
                          $checkouttime= $row["checkouttime"];
                         

                         $schitinerary.="
                                                <div class ='row'>

                                                    <div class='col-md-3'>  
                                                    <div class='form-group'>
                                                      <label for='ittitle'>Hotel Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <p>".$hotel."</p>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='itdate'>Dates &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                        
                                                      <p>".$checkindate." TO ".$checkoutdate."</p>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     </div>
                                                    
                                                   
                                                      <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='checkin'>Check in Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='checkin[]'  id='checkin' value='".$checkintime."' aria-label='...'>
                                                    </div>
                                                    </div>
                                                    <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='checkout'>Check out Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='checkout[]'  id='checkout' value='".$checkouttime."' aria-label='...'>
                                                    </div>
                                                    </div>
                                                    
                                                    <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='hoteladdr'>Hotel Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <textarea rows='3' cols='60' class='form-control' name='hoteladdr[]' id='hoteladdr' aria-label='...'>".$hoteladdr."</textarea>
                                                    </div>
                                                    </div>
                                                    
                                                   
                                                     


                                                  </div><hr>";
                    }
                }

 } 
 else
 {
   $sql = "SELECT * FROM hotels_domestic WHERE ghrno = '$ref_value' ORDER BY sno";

                $res = $conn->query($sql) ;
                if ($res->num_rows) 
                {     
                   while($row = $res->fetch_assoc()) 
                   {      
                          $hotel= $row["hotel"];
                          $hoteladdr= $row["hoteladdr"];
                          $checkindate= $row["checkindate"];
                          $checkoutdate= $row["checkoutdate"];
                          $checkintime= $row["checkintime"];
                          $checkouttime= $row["checkouttime"];
                         

                         $schitinerary.="
                                                <div class ='row'>

                                                    <div class='col-md-3'>  
                                                    <div class='form-group'>
                                                      <label for='ithotel'>Hotel Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <p>".$hotel."</p>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='itdate'>Dates &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                        
                                                      <p>".$checkindate." TO ".$checkoutdate."</p>
                                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     </div>
                                                    
                                                   
                                                      <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='checkin'>Check in Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='checkin[]'  id='checkin' value='".$checkintime."' aria-label='...'>
                                                    </div>
                                                    </div>
                                                    <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='checkout'>Check out Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <input type='text' class='form-control' name='checkout[]'  id='checkout' value='".$checkouttime."' aria-label='...'>
                                                    </div>
                                                    </div>
                                                    
                                                    <div class='col-md-3'>
                                                    <div class='form-group'>
                                                      <label for='hoteladdr'>Hotel Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                         <textarea rows='3' cols='60' class='form-control' name='hoteladdr[]' id='hoteladdr' aria-label='...'>".$hoteladdr."</textarea>
                                                    </div>
                                                    </div>
                                                    
                                                   
                                                     


                                                  </div><hr>";
                    }
                }


 }

}




?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Voucher Design</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--CSS Tags-->
  <link rel="icon" href="images/logo_icon.png"/>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/paper/bootstrap.min.css">

  <!--Script Tags-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src='js/app.js'></script>
<script src="jquery-2.2.1.js"></script>

</head>

<body>
  <div class='container'>
    <h1>Voucher Design</h1>
    <form action='voucherfinal.php' method='POST' class="form-inline" enctype="multipart/form-data">

      <fieldset class='first_set'>
        <legend>Voucher Details</legend>     
        <div class='col-md-9 col-md-push-1'>
        
          <div class ='row'>      
            <div class="form-group">
              <label for="paxnames" style='width:300px;'>Enter Pax Names &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <textarea rows='5' cols='50' class="form-control" name='paxnames' id="paxnames"  aria-label="..."><?php echo $paxnames ;?></textarea>
            </div>
          </div>

          <br>
         
       
           <div class ='row'>      
            <div class="form-group">
              <label for="tourmng" style='width:300px;'>Enter Tour manager Name & Contact &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <textarea rows='5' cols='50' class="form-control" name='tourmng' id="tourmng" aria-label="..."><?php echo $tourmng ;?></textarea>
            </div>
          </div>
         
          <br>
           <div class ='row'>      
            <div class="form-group">
              <label for="confir_no" style='width:300px;'>Enter Confirmation Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <textarea rows='5' cols='50' class="form-control" name='confir_no' id="confir_no" aria-label="..."><?php echo $confir_no ;?></textarea>
            </div>
          </div>

          <br>
        </div>
      </fieldset>
      <br>
      	<fieldset class='second_set'>
        <legend> Details of Itinerary</legend>     
        <div class='col-md-11 col-md-push-1' id='itcontainer'>
           <br>
      
          <?php echo "$schitinerary";?>
        </div>
        
        
      </fieldset>


      <br>
       <div class='row'>
              <div class ='col-md-3 col-md-push-5'>
                <button type="submit" name='submitf' class="btn btn-primary">Submit</button>
              </div>
        </div>
            
            <br><br>

  </div>

</body>
</html>