<!DOCTYPE html>
<html lang="en">
<head>
  <title>Scheduled itinerary Data</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--CSS Tags-->
  <link rel="icon" href="images/logo_icon.png"/>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--Script Tags-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php
              
include "config.php";
$ref = $_GET["q"];
$datait = "";
//$ref = (int)$ref - 5000;
$sql = "SELECT * FROM itdaywise WHERE ghrnno = '".$ref."' ORDER BY rowno ";
                    $res = $conn->query($sql) ;
                    if ($res->num_rows) 
                    { 
                       while($row = $res->fetch_assoc()) 
                          {   
                          
                              $datait.= "<div class='panel panel-primary'>
                                    <div class='panel-heading'>
                                      <h3 class='panel-title'>Day ".$row["day"]."</h3>
                                    </div>
                                    <div class='panel-body'>
                                        
                                          <div class='row'>
                                            <div class='col-md-4'>
                                              <b>Title </b>
                                            </div>
                                            <div class='col-md-8'>
                                              ".$row["title"]."
                                            </div>
                                          </div>
                                          <br>
                                          <div class='row'>
                                            <div class='col-md-4'>
                                              <b>Hotel Name</b>
                                            </div>
                                            <div class='col-md-8'>
                                              ".$row["hotelname"]."
                                            </div>
                                          </div>
                                          <br>

                                          <div class='row'>
                                            <div class='col-md-4'>
                                              <b>Hotel Address</b>
                                            </div>
                                            <div class='col-md-8'>
                                              ".$row["hoteladdr"]."
                                            </div>
                                          </div>
                                          <br>
                                          <div class='row'>
                                            <div class='col-md-4'>
                                              <b>Description</b>
                                            </div>
                                            <div class='col-md-8'>
                                              ".$row["description"]."
                                            </div>
                                          </div>
                                          <br>
                                    </div>
                                  </div>";





                          }
                    } 
                    else
                    {
                      echo "No Form Data";
                    }     

?>

<div class='container'>

  <div class='col-md-9 col-md-push-1'>
    <div class="page-header">
      <h1><img src="images/logonew.png"><br><small>GHRN NO : <?php echo "GHRN".(5000+$ref);?></small></h1>
    </div>
        <?php echo "$datait";?>
  </div>
</div>
  




</body>
</html>