<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Data</title>

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
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/paper/bootstrap.min.css">
</head>

<body ng-app='myApp' ng-controller="DashboardController">
<?php
							
include "config.php";
$ref = $_GET["q"];

$sql = "SELECT * FROM agent_form_data WHERE ref_num = ".$ref."";
                      $res = $conn->query($sql) ;
                    if ($res->num_rows) 
                    { 
                    	 if($row = $res->fetch_assoc()) 
                          {		
                          		$ref_num =  $row["ref_num"];
                          		$form_filled_by =  $row["form_filled_by"];
								$holi_partner_name =   $row["holi_partner_name"];
								$holi_partner_loc =  $row["holi_partner_loc"];
								$sales_partner_name =  $row["sales_partner_name"];
								$sales_partner_loc =   $row["sales_partner_loc"];
								//Customer Details
								$cust_firstname =   $row["cust_firstname"];
								$cust_lastname =  $row["cust_lastname"];
								$contact_phone =  $row["contact_phone"];
								$preferred_time =  $row["preferred_time"];
								$cust_addr =   $row["cust_addr"];
								$cust_email =   $row["cust_email"];
								//Holiday Details
								$trip_start_loc =  $row["trip_start_loc"];
								$holi_dest =  $row["holi_dest"];
								$holi_type =  $row["holi_type"];
								$date_of_travel =  $row["date_of_travel"];
								$return_date_of_travel =  $row["return_date_of_travel"];
								$duration = $row["duration"];
								$no_of_adults =  $row["no_of_adults"];
								$no_of_childs = $row["no_of_childs"];
								$no_of_infants =  $row["no_of_infants"];
								$child_ages =  $row["child_ages"];
								//Mode of Travel
								$travel_mode =   $row["travel_mode"];
								$travel_from =  $row["travel_from"];
								$travel_to =   $row["travel_to"];
								//Accomodation Details
								$type_hotel =   $row["type_hotel"];
								$acc_type =   $row["acc_type"];
								$no_rooms =   $row["no_rooms"];
								$additional_details = $row["additional_details"];
								$food_pref =  $row["food_pref"];
								$specific_food_pref = $row["specific_food_pref"];
								$sight_pref =   $row["sight_pref"];
								$budget =   $row["budget"];
								$lead_status =   $row["lead_status"];
								$datesent =   date_create($row["datesent"]);
								$datesent = date_format($datesent,"d-M-Y");
                          		

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
		  <h1><img src="images/logonew.png"><br><small>GHRN NO : <?php echo "GHRN".(5000+$ref_num);?></small></h1>
		</div>
	
		<?php
			echo "<a class='btn btn-primary btn-sm' role='button' href= 'edit_agentform.php?q=$ref_num'>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<a class='btn btn-danger btn-sm' role='button' target='_blank' href= 'duplicate_form.php?q=$ref_num'>Duplicate</a>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Form Received on : $datesent</b>";

		?>
			<br><br>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Customer Details</h3>
	  </div>
	  <div class="panel-body">
	    

	    	
	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Customer Name</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$cust_firstname $cust_lastname";?>
	  				</div>
	  			</div>
	  			<br>
	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Address</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$cust_addr";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Contact</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$contact_phone";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Preferred Time to call</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$preferred_time";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Email</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$cust_email";?>
	  				</div>
	  			</div>
	  			<br>
	  		
	  </div>
	</div>
	<br>
		<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Holiday Details</h3>
	  </div>
	  <div class="panel-body">
	    

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Start Location</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$trip_start_loc";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Destination</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$holi_dest";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Holiday Type</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$holi_type";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Number of Travellers</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "Adults : $no_of_adults <br><br>
	  								Childrens : $no_of_childs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

	  									if(!empty($child_ages))
	  										echo "Childrens Ages :  $child_ages";

	  								echo "<br><br>
	  								Infants : $no_of_infants <br>
	  								";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Tentative Date of Travel</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$date_of_travel";?>
	  				</div>
	  			</div>
	  			<br>
	  			
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Return Date of Travel</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$return_date_of_travel";?>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Duration</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$duration";?>
	  				</div>
	  			</div>
	  			<br>
	
	  </div>
	</div>
		<br>
		<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Partner Details</h3>
	  </div>
	  <div class="panel-body">
	    

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Form filled by</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$form_filled_by";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Holiday Partner Name</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$holi_partner_name";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Location</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$holi_partner_loc";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Sales Partner Name</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$sales_partner_name";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Location</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$sales_partner_loc";?>
	  				</div>
	  			</div>
	
	  </div>
	</div>
	<br>
	
		<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Mode of Travel</h3>
	  </div>
	  <div class="panel-body">
	    

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Travel mode</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$travel_mode";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>From</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$travel_from";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>To</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$travel_to";?>
	  				</div>
	  			</div>
	  			<br>

	  </div>
	</div>
	<br>
	
		<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Accomodation Details</h3>
	  </div>
	  <div class="panel-body">
	    

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Type of Hotel</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$type_hotel";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Accomodation Type</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$acc_type";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Number of rooms</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$no_rooms";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Additional Details</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$additional_details";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Food Preferences</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$food_pref";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Specific Food preference</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$specific_food_pref";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Sight Seeing preferences</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$sight_pref";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Budget</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "<b style='color:red;'>$budget  INR</b>";?>
	  				</div>
	  			</div>
	  			<br>

	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Lead Status</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<?php echo "$lead_status";?>
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