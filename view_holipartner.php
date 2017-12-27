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

	$sql = "SELECT * FROM holidaypartner WHERE holipartner = '".$partnercode."'";
    $res = $conn->query($sql) ;
    
    if ($res->num_rows) 
    { 
       if($row = $res->fetch_assoc()) 
       {		

           $feepaid =  $row["feepaid"];
           $supptnr =  $row["supptnr"];
           $date =  $row["date"];
           $nameoncard =  $row["nameoncard"];
           $dadname =  $row["dadname"];
           $panno =  $row["panno"];
           $dob =  $row["dob"];
           $maritial =  $row["maritial"];
           $dstopr =  $row["dstopr"];
           $resaddr =  $row["resaddr"];
           $notradeyrs =  $row["notradeyrs"];
           $contact =  $row["contact"];
           $email =  $row["email"];
           $tradename =  $row["tradename"];
           $typeorg =  $row["typeorg"];
           $otherfields =  $row["otherfields"];
           $typetrade =  $row["typetrade"];
           $tradeaddr =  $row["tradeaddr"];
           $bnkname =  $row["bnkname"];
           $accno =  $row["accno"];
           $ifsc =  $row["ifsc"];
           $feeamt =  $row["feeamt"];
           $inwrds =  $row["inwrds"];
           $pmtmode =  $row["pmtmode"];
           $chqdd =  $row["chqdd"];
           $chqdate =  $row["chqdate"];
           $onlinetrans =  $row["onlinetrans"];
           $transidbnk =  $row["transidbnk"];
           $dtrans =  $row["dtrans"];
           $creditcard =  $row["creditcard"];
           $issuingbank =  $row["issuingbank"];


		 }

		 }


			
 }

 }
 
 ?>   
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Holiday Partners</title>

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
		  <h1><img src="images/logonew.png"><br><small><b>Holiday Partner : </b>&nbsp;&nbsp;&nbsp; <?php echo "   $nameoncard";?></small></h1>
		</div>
		<br><br>

	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Personal Details</h3>
	  </div>
	  <div class="panel-body">
	        	
	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Holiday Partner Code</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$partnercode";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Super Partner</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$supptnr";?>
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
	  					<b>Father's Name</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$dadname";?>
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
	  					<?php echo "$contact";?>
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
	  					<?php echo "$maritial";?>
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
	  					<b>If Other Please Specify</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$otherfields";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Type of Trade</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$typetrade";?>
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
	  					<?php echo "$notradeyrs";?>
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
	  					<?php echo "$bnkname";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Account number</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$accno";?>
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
	  					<b>Fee Amount</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$feeamt";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>In Words</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$inwrds";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Mode of Payment</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$pmtmode";?>
	  				</div>
	  			</div>
	  			<br>
	  			
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Cheque/DD No</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$chqdd";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Cheque/DD Date</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$chqdate";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Online Deposit Transfer</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$onlinetrans";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Transaction ID From Bank</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$transidbnk";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Date of Transaction</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$dtrans";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>If Paying from Credit Card</b>
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
	  					<?php echo "$issuingbank";?>
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

