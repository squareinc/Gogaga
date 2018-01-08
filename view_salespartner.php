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
    $handle_type =$_SESSION["handle_type"];

 if(isset($_GET["q"]))
 {
 	$supcode =$_GET["q"];

	$sql = "SELECT * FROM salespartners WHERE sno = '".$supcode."'";
    $res = $conn->query($sql) ;
    
    if ($res->num_rows) 
    { 
       if($row = $res->fetch_assoc()) 
       {		
       		$sno = $row["sno"];
       		$name = $row["name"]; 
       		$phone = $row["phone"]; 
       		$email = $row["email"]; 
       		$district = $row["district"]; 
       		$state = $row["state"];
       		$bankac = $row["bankac"];
       		$bankname = $row["bankname"];
       		$date_of_joining = $row["date_of_joining"]; 

		 }

		 }


			
 }

 }
 
 ?>   
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sales Partners</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--CSS Tags-->
  <link rel="icon" href="images/logo_icon.png"/>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/paper/bootstrap.min.css">
  <!--Script Tags-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<div class='container'>
<div class='col-md-9 col-md-push-1'>
		<div class="page-header">
		  <h1><img src="images/logonew.png"><br><small><b>Sales Partner : </b>&nbsp;&nbsp;&nbsp; <?php echo "   $name";?></small></h1>
		</div>
		<br><br>

	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Personal Details</h3>
	  </div>
	  <div class="panel-body">
	        	
	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Partner Code</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$sno";?>
	  				</div>
	  			</div>
	  			<br>
	    	
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Address</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$district";?>
	  					<?php echo "$state";?>
	  				</div>
	  			</div>
	  			<br>
	  	
	  		
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Contact</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$phone";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Email</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$email";?>
	  				</div>
	  			</div>
	  			<br>
	  </div>
	</div>
	<br>


	<br>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Bank Details</h3>
	  </div>
	  <div class="panel-body">			
	  		
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Account number</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$bankac";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Bank Name</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$bankname";?>
	  				</div>
	  			</div>
	  			<br>
	  			
	  			<br>

	  </div>
	</div>
	<br>
</div>
</div>






</body>
</html>

