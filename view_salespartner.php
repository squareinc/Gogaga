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
 	$partnercode =$_GET["q"];

	$sql = "SELECT * FROM salespartner WHERE salpartnercode = '".$partnercode."'";
    $res = $conn->query($sql) ;
    
    if ($res->num_rows) 
    { 
       if($row = $res->fetch_assoc()) 
       {		
       		$mail =  $row["mail"];
           $feepaid =  $row["feepaid"];
           $reccom =  $row["reccom"];
           $actcom =  $row["actcom"];

           $date =  $row["date"];
           $holipartnername =  $row["holipartnername"];
           $dstopr =  $row["dstopr"];
           $stopr =  $row["stopr"];
           $salpartnername =  $row["salpartnername"];
           $fathername =  $row["fathername"];
           $panno =  $row["panno"];
           $dob =  $row["dob"];
           $marstat =  $row["marstat"];
           $resaddr =  $row["resaddr"];
           $phone =  $row["phone"];
           $persmail =  $row["persmail"];
           $tradename =  $row["tradename"];
           $typeorg =  $row["typeorg"];
           $typetrad =  $row["typetrad"];
           $tradeaddr= $row["tradaddr"];
           $no_of_yrtrade =  $row["no_of_yrtrade"];
           $ofc_phn =  $row["ofc_phn"];
           $ofc_mailid =  $row["ofc_mailid"];
           $bankinfo =  $row["bankinfo"];
           $bankaccno =  $row["bankaccno"];
           $ifsc =  $row["ifsc"];
           $busloc =  $row["busloc"];
           $mobno =  $row["mobno"];
           $email =  $row["email"];
           $profrefname =  $row["profrefname"];
           $profmob =  $row["profmob"];
           $profmailid =  $row["profmailid"];


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
		  <h1><img src="images/logonew.png"><br><small><b>Sales Partner : </b>&nbsp;&nbsp;&nbsp; <?php echo "  $salpartnername";?></small></h1>
		</div>
		<br><br>

	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Personal Details</h3>
	  </div>
	  <div class="panel-body">
	        	
	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Sales Partner Code</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$partnercode";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Holiday Partner name</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$holipartnername";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Recruitment Com</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$reccom";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Activation Com</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$actcom";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>District of Operation</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$dstopr";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>State of Operation</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$stopr";?>
	  				</div>
	  			</div>
	  			<br>
	  		
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Father's Name</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$fathername";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Date</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$date";?>
	  				</div>
	  			</div>
	  			<br>
	    	   <div class='row'>
	  				<div class='col-md-4'>
	  					<b>Date of Birth</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$dob";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Residential Address</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$resaddr";?>
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
	  					<?php echo "$persmail";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Pancard number</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$panno";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Marital Status</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$marstat";?>
	  				</div>
	  			</div>
	  			<br>
	  				<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Fee Paid</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$feepaid";?>
	  				</div>
	  			</div>
	  			<br>
	  				<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Mail</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$mail";?>
	  				</div>
	  			</div>
	  			<br>
	  </div>
	</div>
	<br>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Business Details</h3>
	  </div>
	  <div class="panel-body">
	        	
	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Trade Name</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$tradename";?>
	  				</div>
	  			</div>
	  			<br>
	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Type of Organization</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$typeorg";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Type of Trade</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$typetrad";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Trade Address</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$tradeaddr";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Number of Years in Trade</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$no_of_yrtrade";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Office Phone</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$ofc_phn";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Official Mail ID</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$ofc_mailid";?>
	  				</div>
	  			</div>
	  			<br>
	    </div>
	</div>
	<br>
	
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Bank Details</h3>
	  </div>
	  <div class="panel-body">			
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Bank Name & Address</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$bankinfo";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Account number</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$bankaccno";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>IFSC Code</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$ifsc";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Business Location</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$busloc";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Mobile</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$mobno";?>
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
	  			
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Professional Reference Name</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$profrefname";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Professional Reference Mobile</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$profmob";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Professional Reference Mail</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$profmailid";?>
	  				</div>
	  			</div>
	  	  </div>
	</div>
	<br>
</div>
</div>






</body>
</html>

