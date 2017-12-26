<!DOCTYPE html>
<html lang="en">
<head>
  <title>Itinerary Data</title>

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

<body ng-app='myApp' ng-controller="DashboardController">
<?php
								/*form_filled_by,holi_partner_name,holi_partner_loc,sales_partner_name,
								sales_partner_loc,cust_firstname,cust_lastname,contact_areacode,
								contact_phone,preferred_time,cust_addr,cust_email,trip_start_loc,holi_dest,
								holi_type,date_of_travel,return_date_of_travel,duration,no_of_adults,no_of_childs,
								no_of_infants,travel_mode,travel_from,travel_to,type_hotel,acc_type,
								no_rooms,additional_details,food_pref,specific_food_pref,
								sight_pref,budget,lead_status
								*/
include "config.php";
$ref = $_GET["q"];
$holi_type = $_GET["r"];
if($holi_type == "Domestic")
{
	$sql = "SELECT * FROM itinerary_domestic WHERE ghrnno = '".$ref."'";
                      $res = $conn->query($sql) ;
                    if ($res->num_rows) 
                    { 
                    	 if($row = $res->fetch_assoc()) 
                          {		

                          		$ghrno =$row["ghrnno"];
                          		$supname =  $row["supname"];
                          		$supperc =  $row["supperc"];
								$holiname =   $row["holiname"];
								$holiperc =  $row["holiperc"];
								$salname =  $row["salname"];
								$salperc =   $row["salperc"];

								$calc =   $row["calc"];
								$meal =  $row["meal"];
								$transp =  $row["transp"];
								$transp_amt =  $row["transp_amt"];
								$tra_ins =   $row["tra_ins"];

								$hotelcontent = "";
								$sql = "SELECT * FROM hotels_domestic WHERE ghrno = '".$ref."'  ORDER BY sno";
								 $res = $conn->query($sql) ;
			                    if ($res->num_rows) 
			                    { 
			                    	 while($row = $res->fetch_assoc()) 
			                          {	

										$hotelcontent .= "<tr style='font-size:12px;'>
										                        <td>".$row["location"]."</td>
										                        <td>".$row["checkindate"]."</td>
										                        <td>".$row["checkoutdate"]."</td>
										                        <td>".$row["vendor"]."</td>
										                        <td>".$row["hotel"]."</td>
										                        <td>".$row["rooms"]."</td>
										                        <td>".$row["nights"]."</td>
										                        <td>".$row["meal"]."</td>
										                        <td>".$row["prices"]."</td>
										                        <td>".$row["status"]."</td>
										                      </tr>";

			                          }
			                     }
			                     $flightcontent= "";
			                     $sql = "SELECT * FROM flights_info WHERE ghrno = '".$ref."'  ORDER BY sno";
								 $res = $conn->query($sql) ;
			                    if ($res->num_rows) 
			                    { 
			                    	 while($row = $res->fetch_assoc()) 
			                          {	
									
										 $flightcontent .= "<tr style='font-size:12px;'>
										                        <td>".$row["airline"]."</td>
										                        <td>".$row["airport"]."</td>
										                        <td>".$row["arrdep"]."</td>
										                        <td>".$row["airdur"]."</td>
										                        <td>".$row["airdates"]."</td>
										                        <td>".$row["airprice"]." rs x ".$row["airtrav"]." persons = ".$row["airprice"]*$row["airtrav"]."</td>
										                      </tr>";
			                          }
			                     }




                          }
                    } 
                    else
                    {
                    	echo "No form data";
                    }
     }
     elseif ($holi_type == "International") {
          	$sql = "SELECT * FROM itinerary_inter WHERE ghrno = '".$ref."'";
                      	$res = $conn->query($sql) ;
	                    if ($res->num_rows) 
	                    { 
	                    	 if($row = $res->fetch_assoc()) 
	                          {	

                          		$ghrno =$row["ghrno"];
                          		$supname =  $row["supname"];
                          		$supperc =  $row["supperc"];
								$holiname =   $row["holiname"];
								$holiperc =  $row["holiperc"];
								$salname =  $row["salname"];
								$salperc =   $row["salperc"];

								$calc =   $row["calc"];
								$meal =  $row["mealplan"];
								$transp =  $row["transp"];
								$transp_amt =  $row["transp_amt"];
								
								$remit =   $row["remit"];
								$visa =   $row["visa"];
								$cruise_amt =   $row["cruise_amt"];
								$crsupname =   $row["crsupname"];
								$crsupperc =   $row["crsupperc"];
								$crholiname =   $row["crholiname"];
								$crholiperc =   $row["crholiperc"];
								$crsalname =   $row["crsalname"];
								$crsalperc =   $row["crsalperc"];
								$add_sername =   $row["add_sername"];
								$add_sercost =   $row["add_sercost"];
								$tra_ins =   $row["tr_ins"];

								$hotelcontent = "";
							     
							    $sql = "SELECT * FROM hotels_inter WHERE ghrnno = '$ref'";

						        $res = $conn->query($sql) ;
						        if ($res->num_rows) 
							    {     
							        while($row = $res->fetch_assoc()) 
							       {      
							             $hotelcontent.="
							                      <tr style='font-size:12px;'>
							                        <td>".$row["location"]."</td>
							                        <td>".$row["checkindate"]."</td>
							                        <td>".$row["checkoutdate"]."</td>
							                        <td>".$row["vendor"]."</td>
							                        <td>".$row["hotel"]."</td>
							                        <td>".$row["meal"]."</td>
							                        <td>".$row["prices"]."</td>
							                        <td><b style='color:red;'>".$row["status"]."</b></td>
							                        
							                     </tr>
										       ";
						            }
						        }
			                     $flightcontent= "";
			                     $sql = "SELECT * FROM flights_info WHERE ghrno = '".$ref."'  ORDER BY sno";
								 $res = $conn->query($sql) ;
			                    if ($res->num_rows) 
			                    { 
			                    	 while($row = $res->fetch_assoc()) 
			                          {	
									
										 $flightcontent .= "<tr style='font-size:12px;'>
										                        <td>".$row["airline"]."</td>
										                        <td>".$row["airport"]."</td>
										                        <td>".$row["arrdep"]."</td>
										                        <td>".$row["airdur"]."</td>
										                        <td>".$row["airdates"]."</td>
										                     	<td>".$row["airprice"]." rs x ".$row["airtrav"]." persons = ".$row["airprice"]*$row["airtrav"]."</td>
										                      </tr>";
			                          }
			                     }






	                          		

	                          }
	                     }
	                     else
	                     	echo "No form data";
          } 
          else
          	echo "No form data";    

?>

<div class='container'>
<div class='col-md-11 col-md-push-1'>
		<div class="page-header">
		  <h1><img src="images/logonew.png"><br><small>GHRN Number : <?php echo "GHRN".(5000+$ghrno);?></small></h1>
		</div>

		<?php
			echo "<a class='btn btn-primary btn-sm' role='button' href= 'edit_agentform.php?q=$ghrno'>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<a class='btn btn-danger btn-sm' role='button' href= 'duplicate_form.php?q=$ghrno'>Duplicate</a>";
			//echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Form Received on : $datesent</b>";

		?>
		<br><br>

	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Partner Details</h3>
	  </div>
	  <div class="panel-body">
	    

	    	
	    		<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Super Partner Details</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<div class='col-md-9'><b>Name </b> : <?php echo "$supname";?></div>
	  					<div class='col-md-3'><b>Percentage </b> : <?php echo "$supperc";?></div>
	  				</div>
	  			</div>
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Holiday Partner Details</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<div class='col-md-9'><b>Name </b> : <?php echo "$holiname";?></div>
	  					<div class='col-md-3'><b>Percentage </b> : <?php echo "$holiperc";?></div>
	  				</div>
	  			</div>
	  			<br>
				<div class='row'>
	  				<div class='col-md-4'>
	  					<b>Sales Partner Details</b>
	  				</div>
	  				<div class='col-md-8'>
	  					<div class='col-md-9'><b>Name </b> : <?php echo "$salname";?></div>
	  					<div class='col-md-3'><b>Percentage </b> : <?php echo "$salperc";?></div>
	  				</div>
	  			</div>
	  			
	  		
	  </div>
	</div>
	<br>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Itinerary Details</h3>
	  </div>
	  <div class="panel-body">
	    

	    
	    		<div class='row'>
	  				
	  				<div class='col-md-8'>
	  					<div class='col-md-6'><b>Calculation by </b> : <?php echo "$calc";?></div>
	  					<div class='col-md-6'><b>Meal Plan </b> : <?php echo "$meal";?></div>
	  				</div>
	  			</div>
	  			
	  				<br>	
	  			<div class='row'>
	  				<div class='col-md-8'>
	  					<div class='col-md-6'><b>Transportation Amount </b> : <?php echo "$transp_amt INR";?></div>
	  					<div class='col-md-6'><b>Travel insurance </b> : <?php echo "$tra_ins INR";?></div>
	  				</div>
	  			</div>
	  		
	  			<?php
	  				if($holi_type == "International"){

						?>	
						<br>						
				<div class='row'>
	  				<div class='col-md-8'>
	  					<div class='col-md-6'><b>Remittance Amount </b> : <?php echo "$remit INR";?></div>
	  					<div class='col-md-6'><b>Visa </b> : <?php echo "$visa INR";?></div>
	  				</div>

	  			</div>
	  			
	  			
	  			
		  			<br>
		  			<?php
	  				if(!empty($add_sername) && !empty($add_sercost)){

						?>	
	  			<div class='row'>
	  				<div class='col-md-8'>
	  					<div class='col-md-6'><b>Additional Service </b> : <?php echo "$add_sername";?></div>
	  					<div class='col-md-6'><b>Amount </b> : <?php echo "$add_sercost INR";?></div>
	  				</div>
	  			</div>
	  			<br>
	  				<?php
					}	
		  			?>
		  		
	  			
				<?php
				}	
	  			?>
	  		



	  		
	  </div>
	</div>
	<br>
	<?php
	  				if(!empty($cruise_amt)){
	  			?>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Cruise Details</h3>
	  </div>
	  <div class="panel-body">
	  				
	  			<br>
	  			<div class='row'>
	  				<div class='col-md-6'>
	  					<div class='col-md-8'><b>Cruise Amount </b> : <?php echo "$cruise_amt INR";?></div>
	  				</div>
	  				<br>
	  				<div class='col-md-10 col-md-push-1'>
				  		
				  		<br>
				  	<div class='row'>
			  				<div class='col-md-6'>
			  					<b>Cruise Super Partner Details</b>
			  				</div>
			  				<div class='col-md-6'>
			  					<div class='col-md-8'><b>Name </b> : <?php echo "$crsupname sadasda";?></div>
			  					<div class='col-md-4'><b>Percentage </b> : <?php echo "$crsupperc";?></div>
			  				</div>
			  			</div>
			  			<br>
			  			<div class='row'>
			  				<div class='col-md-6'>
			  					<b> Cruise Holiday Partner Details</b>
			  				</div>
			  				<div class='col-md-6'>
			  					<div class='col-md-8'><b>Name </b> : <?php echo "$crholiname";?></div>
			  					<div class='col-md-4'><b>Percentage </b> : <?php echo "$crholiperc";?></div>
			  				</div>
			  			</div>
			  			<br>
						<div class='row'>
			  				<div class='col-md-6'>
			  					<b>Cruise Sales Partner Details</b>
			  				</div>
			  				<div class='col-md-6'>
			  					<div class='col-md-8'><b>Name </b> : <?php echo "$crsalname";?></div>
			  					<div class='col-md-4'><b>Percentage </b> : <?php echo "$crsalperc";?></div>
				  				</div>
				  			</div>
				  		</div>
			  		</div>
			  		


	  </div>
	</div>
	<?php
					}	
		  			?>
	<br>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Hotel Details</h3>
	  </div>
	  <div class="panel-body">
	    <div class='table-responsive'>
	    <?php 
			if($holi_type == "Domestic")
			{
		?> 
                   <table id= 'container' class='table table-hover table-responsive table-list' style='background-color: white;'>
                      <tr style='font-size:11px;'>  
                         <th>LOCATION</th>
                         <th>CHECKINDATE</th>
                         <th>CHECKOUTDATE</th>
                         <th>VENDOR</th>
                         <th> HOTEL NAME</th>
                         <th>NO.ROOMS</th>
                         <th> NO.NIGHTS</th>
                         <th> MEAL PLAN</th>
                         <th> PRICES</th>
                         <th> STATUS</th>
                      </tr>
                      	<?php echo "$hotelcontent";?>
                
                   </table>

            <?php
			}
			else
			{?>
				<table id= 'container' class='table table-hover table-responsive table-list' style='background-color: white;'>
                      <tr style='font-size:11px;'>  
                         <th>LOCATION</th>
                         <th>CHECKINDATE</th>
                         <th>CHECKOUTDATE</th>
                         <th>VENDOR</th>
                         <th> HOTEL NAME</th>
                         <th> MEAL PLAN</th>
                         <th> PRICES</th>
                         <th> STATUS</th>
                      </tr>
                      	<?php echo "$hotelcontent";?>
                
                   </table>

			<?php
			}
			?>
                   
         </div>
	
	  </div>
	</div>
	
		<br>
		<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Flight Details</h3>
	  </div>
	  <div class="panel-body">
	     <div class='table-responsive'> 
                   <table id= 'container' class='table table-hover table-responsive table-list' style='background-color: white;'>
                      <?php
                      	if(!empty($flightcontent))
		                 echo "<tr style='font-size:11px;'>
		                       <th>AIRLINES</th>
		                       <th>AIPORTS</th>
		                       <th>ARRIVAL & DEPARTURE</th>
		                       <th>DURATION</th>
		                        <th>DATES</th>
		                        <th>PRICE</th>
		                      </tr>";
		                      else
		                      	echo "<i>No Flight Details</i>";

                      	echo "$flightcontent";?>
                
                   </table>
                   
         </div>
	</div>
	</div>
	<br>
	
		
	<br>
		

</div>

</div>











</body>
</html>