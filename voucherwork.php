<?php
require("config.php");
session_start();

$removeClass = "";

if(isset($_POST["save"]))
{

  $ref_value= $_GET["ref"];
  $reftype = $_SESSION["vref_type"]; 
  //$_SESSION["vref_val"] = $ref_value;

  $tourmng = $_POST["tourmng"];
  $confir_no = $_POST["confir_no"];
  $paxnames = $_POST["paxnames"];

 $sql = "UPDATE vouchertable 
    SET tourmng='".$tourmng."',
    confir_no='".$confir_no."',
    paxnames='".$paxnames."'
    WHERE ref_num ='".$ref_value."'";
      if(($conn->query($sql))== true)
      {
      
      }
      else
        header('Location:nopage.php');



  $sno=1;
    if(isset($_POST['hoteladdr'])){

      //clean and santize the input data

      if($reftype == "Domestic")
      {
           foreach ( $_POST['hoteladdr'] as $key=>$hoteladdr) {
            $hoteladdr = mysqli_real_escape_string($conn,$hoteladdr);
                        $checkintime = $_POST['checkin'][$key];
                        $checkouttime = $_POST['checkout'][$key];

                      $sql = "UPDATE hotels_domestic 
                             SET hoteladdr ='".$hoteladdr."',
                             checkintime ='".$checkintime."',
                             checkouttime ='".$checkouttime."'
                            WHERE ghrno ='".$ref_value."' and sno=".$sno." ";
                            if(($conn->query($sql))== true)
                            {
                                $removeClass = "removed";
                            }
                              $sno++;

                       }

          }
          else
          {
              foreach ( $_POST['hoteladdr'] as $key=>$hoteladdr) {
                $hoteladdr = mysqli_real_escape_string($conn,$hoteladdr);
                        $checkintime = $_POST['checkin'][$key];
                        $checkouttime = $_POST['checkout'][$key];

                      $sql = "UPDATE hotels_inter 
                             SET hoteladdr ='".$hoteladdr."',
                             checkintime ='".$checkintime."',
                             checkouttime ='".$checkouttime."'
                            WHERE ghrnno ='".$ref_value."' and sno=".$sno." ";
                            if(($conn->query($sql))== true)
                            {
                             $removeClass = "removed";   
                            }
                              $sno++;

                       }
          }

          header("Location: voucherwork.php?ref=$ref_value&saved=true");
        }
        else
            echo "NOT PRESENT";



}    


//updating the status as vouchered

if(isset($_POST["submitf"])){
$ref_value= $_GET["ref"];

 $sql = "UPDATE vouchertable 
    SET status = 'Vouchered'
    WHERE ref_num ='".$ref_value."'";
      if(($conn->query($sql))== true)
      {
      
      }
      else
        header('Location:nopage.php');

      //

  $sql = "UPDATE agent_form_data 
         SET voucher_status ='Vouchered'
        WHERE ref_num ='".$ref_value."' ";
        if(($conn->query($sql))== true)
        {
        
        }
        else
          header('Location:nopage.php');


}


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

//save i.e, update data





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
    <form method='POST' class="form-inline" enctype="multipart/form-data">

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
                <button type="submit" name='save' class="btn btn-success">Save</button>
                <a href="voucherfinal.php" name='view' id="view" class="btn btn-warning" disabled="disabled">View</a>
                <button type="submit" name='submitf' id="submit" class="btn btn-danger" disabled="disabled">Submit</button>
              </div>
        </div>
            
            <br><br>

  </div>

<?php

if($removeClass == "removed"){
  echo "<script>//enable other buttons
  $('#view').removeClass('disabled');
  $('#submit').removeClass('disabled');

</script>";
}
if (isset($_GET["saved"])) {
  if($_GET["saved"] == "true"){
    //saved i.e, clicked
    echo "<script>
    $('#view').attr('disabled',false);
    $('#submit').attr('disabled',false);

    </script>";
  }

}

?>


</body>
</html>