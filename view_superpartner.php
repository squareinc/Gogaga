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

	$sql = "SELECT * FROM superpartner WHERE suppartnercode = '".$supcode."'";
    $res = $conn->query($sql) ;
    
    if ($res->num_rows) 
    { 
       if($row = $res->fetch_assoc()) 
       {		

           $date =  $row["date"];
           $sup_name =  $row["name"];
           $fathername =  $row["fathername"];
           $dob =  $row["dob"];
           $addr =  $row["addr"];
           $maritialstatus =  $row["maritialstatus"];
           $landmark =  $row["landmark"];
           $yrsofstay =  $row["yrsofstay"];
           $phone =  $row["phone"];
           $email =  $row["email"];

           $areaofbusopr =  $row["areaofbusopr"];
           $firmname =  $row["firmname"];
           $typefirm =  $row["typefirm"];
           $tradeaddr =  $row["tradeaddr"];
           $nearlandmark =  $row["nearlandmark"];
           $nooftradeyrs =  $row["nooftradeyrs"];
           $ofcphone =  $row["ofcphone"];
           $ofcdet =  $row["ofcdet"];
           $ofcsft =  $row["ofcsft"];
           $faceofc =  $row["faceofc"];
           $ofcloc =  $row["ofcloc"];
           $ofcaddr =  $row["ofcaddr"];
           $ofcnearlmark =  $row["ofcnearlmark"];

           $tradebankdet =  $row["tradebankdet"];
           $bankaccno =  $row["bankaccno"];
           $branchaddr =  $row["branchaddr"];

           $feepymtdet =  $row["feepymtdet"];
           $modepmt =  $row["modepmt"];
           $chqdd =  $row["chqdd"];
           $issuedbnk =  $row["issuedbnk"];
           $neftimps =  $row["neftimps"];
           $bnkname =  $row["bnkname"];
           $creditcard =  $row["creditcard"];
           $issuingbnk =  $row["issuingbnk"];


		 }

		 }


			
 }

 }
 
 ?>   
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Super Partners</title>

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
		  <h1><img src="images/logonew.png"><br><small><b>Super Partner : </b>&nbsp;&nbsp;&nbsp; <?php echo "   $sup_name";?></small></h1>
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
	  					<?php echo "$supcode";?>
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
	  					<?php echo "$addr";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Stayed for </b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$yrsofstay";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Landmark</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$landmark";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Maritial Satus</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$maritialstatus";?>
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
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Business Details</h3>
	  </div>
	  <div class="panel-body">
	        	
	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Firm Name</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$firmname";?>
	  				</div>
	  			</div>
	  			<br>
	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Firm Type</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$typefirm";?>
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
	  					<b>Area of Business Operation</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$areaofbusopr";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Nearest Landmark </b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$nearlandmark";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Number of Years in Trade</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$nooftradeyrs";?>
	  				</div>
	  			</div>
	  			<br>

	    </div>
	</div>
	<br>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Office Details</h3>
	  </div>
	  <div class="panel-body">			
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Office Phone number</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$ofcphone";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Proposed Office Details</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$ofcdet";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Office SFT</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$ofcsft";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Facing of office</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$faceofc";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Location of office</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$ofcloc";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Office Address</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$ofcaddr";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Nearest Landmark</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$ofcnearlmark";?>
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
	  					<b>Trade Bank Details(For Commission Payout)</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$tradebankdet";?>
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
	  					<b>Branch Address</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$branchaddr";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Fee Payment Details</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$feepymtdet";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Mode of Payment</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$modepmt";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Cheque/DD Date</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$chqdd";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Issued Bank</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$issuedbnk";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>NEFT/IMPS</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$neftimps";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Bank Name</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$bnkname";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Credit Card</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$creditcard";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Issuing Bank</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$issuingbnk";?>
	  				</div>
	  			</div>
	  			<br>

	  </div>
	</div>
	<br>
</div>
</div>






</body>
</html>

