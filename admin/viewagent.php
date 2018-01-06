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
<script src="../js/jquery.fancybox.js"></script>

<script type="text/javascript" src="js/deleteitinerary.js"></script>
<script type="text/javascript" src="js/agents.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


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

<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>


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
                              <a href="../form2.php" class="list-group-item list-group-item" style='padding-left:30px;'>Request Form</a>
                              <a href="#/itsubmitted" class="list-group-item list-group-item" style='padding-left:30px;'>Submitted</a>
                              <a href="#/itpending" class="list-group-item list-group-item" style='padding-left:30px;'>Pending </a>
                              <a href='#/itsmashed' class='list-group-item list-group-item' style='padding-left:30px;'>Deleted </a>

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
                        <a href="https://www.google.co.in/maps" target='_blank' class="list-group-item"><span class='glyphicon glyphicon-map-marker' style='padding-right:15px;' aria-hidden='true'></span>Maps</a>
                            


              </div>
        </div><!--/.sidebar-offcanvas-->


         <!--Page Content -->
        <div class="col-md-10 sm-10 col-md-push-0">
              <h3>New Agent</h3>

              <?php
              if(isset($_GET["uid"])){
              	//if userid is given.. then use this id to display 
              	//agent data like his name, phone number, partner type and ennable button
              	//and then after clicking all ok create account..
              	//load the data into respective partner table

              	$userid = $_GET["uid"];
              	//first display information
              	$sql = "SELECT * FROM login WHERE userid = '$userid'";

              	$res = $conn->query($sql);

              	if($res->num_rows){
              		if($row = $res->fetch_assoc()){
              			//get the data
              			$name = $row["username"];
              			$phone = $row["contact"];
              			$partnertype = $row["type"];
              		}
              	}


              }

              if(isset($_POST["create"])){
              	//start creating account
              	//first update the same details in login table
              	//and then the respective details in respective table
              	if(isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["partnertype"]) && isset($_POST["assignto"])){
              		//all fields set.. good to go
              		$name = $_POST["name"];
              		$phone = $_POST["phone"];
              		$partnertype = $_POST["partnertype"];
              		$assignto = $_POST["assignto"];

              		$date = date('Y-m-d');

              		$sql = "UPDATE login SET username = '$name', contact = '$phone', type = '$partnertype', acc_status = 'active' WHERE userid = '$userid'";
              		//echo $sql;
              		//$res = $conn->query($sql);
              		//print_r($res);

	              	if($conn->query($sql) == true){
	              		//success
	              		//now insert into respective tables..

	              		switch ($partnertype) {
	              			case "salespartner":
	              				//insert into salespartner
	              			    $sql = "INSERT INTO salespartners (name,phone,email,date_of_joining,holiday_partner_sno)
	              			    	VALUES('$name','$phone','$userid','$date','$assignto')";
	              			    	//echo $sql;
	              			    if($conn->query($sql) == true)
                    			{
                    				//success
                    				//echo "success";
                    				header('Location:dashboard.php#/agentaccounts');
                    			}else{
                    				//error
                    				//echo "error";

                    			}

	              				break;

	              			case "holidaypartner":
	              				//insert into salespartner
	              			    $sql = "INSERT INTO holidaypartners (name,phone,email,date_of_joining,super_partner_sno)
	              			    	VALUES('$name','$phone','$userid','$date','$assignto')";

	              			    if($conn->query($sql) == true)
                    			{
                    				//success
                    			}

	              				break;

	              			case "superpartner":
	              				//insert into salespartner
	              			    $sql = "INSERT INTO superpartners (name,phone,email,date_of_joining)
	              			    	VALUES('$name','$phone','$userid','$date')";

	              			    if($conn->query($sql) == true)
                    			{
                    				//success
                    			}

	              				break;
	              			
	              			default:
	              				# code...
	              				break;
	              		}
	              	}else{
	              		//error
	              	}


              	}

              }


              ?>

              <form method="POST" action="" class="col-md-6">
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
	              	<label for="partnertype">Partner Type</label>
	              	<script>getAgent('<?php echo $partnertype; ?>');</script>
	              	<select class="form-control" name="partnertype" onchange="getAgent(this.value);" required>
		        		<option value="">Select Partner Type</option>
		        		<option value="salespartner" <?php if(isset($partnertype)){ if($partnertype == "salespartner") echo "selected"; } ?> >Sales Partner</option>
		        		<option value="holidaypartner" <?php if(isset($partnertype)){ if($partnertype == "holidaypartner") echo "selected"; } ?> >Holiday Partner</option>
		        		<option value="superpartner" <?php if(isset($partnertype)){ if($partnertype == "superpartner") echo "selected"; } ?> >Super Partner</option>
        			</select>
              	</div>
              	 	<div class="form-group">
	              	<label for="assignto">Assign To</label>
	              	<select class="form-control" name="assignto" id="assignto" required>
		        		
        			</select>
              	</div>

              	<button class="btn btn-success" name="create">Create Account</button>
              </form>

        </div><!--/.col-xs-12.col-sm-9-->

        


 
       
      </div><!--/row-->



<?php

}//end
?>