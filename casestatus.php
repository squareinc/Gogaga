<!DOCTYPE html>
<html lang="en">
<head>
  <title>Case Status</title>

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
        include 'config.php';
        if(isset($_GET["q"]))
         {  				$tobefilled = 'To be Filled';
						   $case_cnt = 0 ; 

                            $agent_com ="";
                            $voucher_status ="";
                            $payment_receipt= "";

                           $search_case = $_GET["q"];
                           $handle_type1 = $_GET["r"];
                           $visa = 0;
                           $tra_ins = 0;
                           $remit = 0;
                           $transp_amt = 0;

                          if($handle_type1 == "International")
                          { 
                              $sql = "SELECT * FROM itinerary_inter WHERE ghrno = '".$search_case."' ";
                                $res = $conn->query($sql) ;
                                if ($res->num_rows) 
                                {     
                                    if($row = $res->fetch_assoc()) 
                                        {
                                          $case_cnt ++;   
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
                                          $tra_ins =   $row["tr_ins"];
                                          $remit =   $row["remit"];
                                          $visa =   $row["visa"];
                                          $cruise_amt =  $row["cruise_amt"];
                                          $crsupname =  $row["crsupname"];
                                          $crsupperc =  $row["crsupperc"];
                                          $crholiname =   $row["crholiname"];
                                          $crholiperc =  $row["crholiperc"];
                                          $crsalname =  $row["crsalname"];
                                          $crsalperc =  $row["crsalperc"];
                                          $add_sername =  $row["add_sername"];
                                          $add_sercost =  $row["add_sercost"];

                                          $landcost = (float)$row["landcost"]; // Land cost
                                          $gghperc = (float)$row["gghperc"]; // Gogaga Commmission
                                          $gghpercval = ($gghperc/100) * $landcost; // Total Cost Commisions
                                          $landcostcom = $landcost + $gghpercval; 

                                          $flightprice = (float)$row["flightprice"]; // Flight Price
                                          $flight_loadperc = (float)$row["flight_loadperc"];   $flightloadval = ($flight_loadperc/100)*$flightprice;
                                          $flpriceloaded = $flightprice + $flightloadval; // Proposed flight price
                                         
                                          $ser_tax_perc = (float)$row["ser_tax_perc"]; 
                                          $ser_tax_val = ($ser_tax_perc/100)*$landcostcom; // Service Tax
                                          $totcost = (float)$row["totcost"]; // Total Land package cost 
                                          $totcostfl = (float)$row["totcostfl"]; // Total cost with flights
                                          $no_of_pax = $row["no_of_pax"];
                                          

                                        }  
                                        
                                        
                                        
                                        
                                        
                                }
                                else
                                    echo "No results found";
                          }
                        else
                          {
                              $sql = "SELECT * FROM itinerary_domestic WHERE ghrnno = '".$search_case."' ";
                                $res = $conn->query($sql) ;
                                if ($res->num_rows) 
                                {     
                                    if($row = $res->fetch_assoc()) 
                                        {
                                            $case_cnt ++;  
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

                                          $landcost = $row["landcost"]; // Land cost
                                          $gghperc = $row["gghperc"]; // Gogaga Commmission
                                          $gghpercval = ($gghperc/100) * $landcost;
                                          $landcostcom = $landcost + $gghpercval; // Total Cost Commisions

                                          $flightprice = $row["flightprice"]; // Flight Price
                                          $flight_loadperc = $row["flight_loadperc"];  $flightloadval = ($flight_loadperc/100)*$flightprice;
                                          $flpriceloaded = $flightprice + $flightloadval; // Proposed flight price
                                         
                                          $ser_tax_perc = $row["ser_tax_perc"]; 
                                          $ser_tax_val = ($ser_tax_perc/100)*$landcostcom; // Service Tax
                                          $totcost = $row["totcost"]; // Total Land package cost 
                                          $totcostfl = $row["totcostfl"]; // Total cost with flights
                                          $no_of_pax = $row["no_of_pax"];


                                        }
                                }
                                else
                                    echo "No results found";
                          }



                           $sql = "SELECT * FROM agent_form_data WHERE ref_num = '".$search_case."' ";
                                $res = $conn->query($sql) ;
                                if ($res->num_rows) 
                                {     
                                    if($row = $res->fetch_assoc()) 
                                        {   $case_cnt ++;  
                                            $cust_name =   $row["cust_firstname"]." ".$row["cust_lastname"];
                                            $holi_dest =  $row["holi_dest"];
                                            $date_of_travel =  $row["date_of_travel"];
                                            $return_date_of_travel =  $row["return_date_of_travel"];
                                            $duration = $row["duration"];
                                            $no_of_adults =  (int)$row["no_of_adults"];
                                            $no_of_childs = (int)$row["no_of_childs"];
                                            $no_of_infants =  (int)$row["no_of_infants"];
                                            $nopsg = $no_of_infants +$no_of_childs +$no_of_adults;
                                            $paidstatus= $row["payment_status"];

                                            $datesent = $row["datesent"];
                                            $voucher_status = $row["voucher_status"];
                                        }

                                }

                                
                          if($paidstatus == "paid")
                          {
                            $payment_receipt ="Paid";
                            $issue_voucher_link = "<a class='btn btn-success btn-lg' role='button' href='issuevoucher.php?qr=".$search_case."&rt=".$handle_type1."'>Issue Voucher</a>";
                          }
                          else
                          {
                              $payment_receipt="Unpaid";
                              $issue_voucher_link= "";
                          }




        }  


?>


<div class='container'>
<div class='col-md-11 col-md-push-1'>
		<div class="page-header">
		  <h1><img src="images/logo_1.png" width='200' height='auto'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <small>GHRN NUMBER :<?php $ref_str=5000+$ghrno;echo "GHRN$ref_str<br>";?></small></h1>


		</div>	
		<br>
 <?php echo "$issue_voucher_link<br>";?>

  <br><br>
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">SUBMISSIONS</h3>
    </div>
    <div class="panel-body">
      <?php

       echo "<div class='row'>
                    <table class='table table-hover table-list' style='background-color: white;'>

                                        
                                        <tr>
                                          <th>PAYMENT STATUS</th>
                                          <td>".$payment_receipt."</td>
                                        </tr>
                                        <tr>
                                          <th>HOLIDAY VOUCHERS</th>
                                          <td>".$voucher_status."</td>
                                        </tr>
                                         <tr>
                                          <th>AGENT COMMISSIONS</th>
                                          <td>".$agent_com."</td>
                                        </tr>    
                      </table>
              </div>";


          ?>




    </div>

  </div>





	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">Case Details</h3>
	  </div>
	  <div class="panel-body">
	  <?php  
    $datesent = date_create($datesent);
    $datesent  = date_format($datesent,"d-M-Y");

 echo "<div class='row'>
              <table class='table table-hover table-list' style='background-color: white;'>

                                  
                                  <tr>
                                    <th>QUOTE BASED ON</th>
                                    <td>".$calc."</td>
                                  </tr>
                                  <tr>
                                    <th>MEAL PLAN</th>
                                    <td>".$meal."</td>
                                  </tr>
                                   <tr>
                                    <th>REQUEST RECIEVED ON</th>
                                    <td>".$datesent."</td>
                                  </tr>    
                </table>
        </div>";
          ?>
	  		
	  </div>
	</div>
	<br>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">PACKAGE INCLUSIONS CONSIDERED</h3>
	  </div>
	  <div class="panel-body">
	    
  <?php  
 echo "<div class='row'>
            <table class='table table-hover table-list' style='background-color: white;'>
                <tr>
                    <th>VISA</th>
                    <td>".$visa." INR</td>
                </tr>
                <tr>
                  <th>REMITTANCE</th>
                  <td>".$remit." INR</td>
                </tr>
                <tr>
                  <th>TRAVEL INSURANCE</th>
                  <td>".$tra_ins." INR</td>
                </tr>
           </table>
	  </div>
	
	"
	?>
</div>
</div>
	<br>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">CASE DETAILS</h3>
	  </div>
	  <div class="panel-body">
	  		<?php
	  		 echo "<div class='row'>

              <table class='table table-hover table-list' style='background-color: white;'>
                                   <tr>
                                    <th>REFEERENCE NUMBER</th>
                                   <td>".$search_case."</td>
                                    
                                  </tr>
                                  <tr>
                                    <th>CLIENT NAME</th>
                                   <td>".$cust_name."</td>
                                    
                                  </tr>
                                  <tr>
                                    <th>DESTINATION</th>
                                    <td>".$holi_dest."</td>
                                  </tr>
                                   <tr>
                                   <th>NUMBER OF PASSENGERS</th>
                                   <td>".$nopsg."</td>
                                  </tr>
                                  <tr>
                                   <th>TRAVEL DATES</th>
                                   <td>".$date_of_travel." - ".$return_date_of_travel."</td>
                                  </tr>
                                  <tr>
                                   <th>TRIP DURATION</th>
                                   <td>".$duration."</td>
                                  </tr>
                        </table></div>";
                       ?>


	  </div>
	</div>
	
	<br><br>
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">CALCULATIONS</h3>
	  </div>
	  <div class="panel-body">
	   
<?php

echo "
		<div class='row'>

              <table class='table table-hover table-list' style='background-color: white;'>
                                  
                                  <tr>
                                    <th>LAND COST</th>
                                   <td><b style='color:red;'>".(int)$landcost." INR</b></td>
                                    
                                  </tr>
                                  <tr>
                                    <th>GOGAGA COMMISSION</th>
                                    <td>".$gghperc." % </td>
                                  </tr>
                                   <tr>
                                   <th>SUPER PARTNER</th>
                                   <td><b>".$supname." </b>- ".$supperc."% </td>
                                  </tr>
                                   <tr>
                                    <th>HOLIDAY PARTNER</th>
                                   <td><b>".$holiname."</b> - ".$holiperc."%</td>
                                    
                                  </tr>
                                  <tr>
                                    <th>SALES PARTNER</th>
                                   <td><b>".$salname."</b> - ".$salperc."%</td>
                                    
                                  </tr>
                                  <tr>
                                    <th>TOTAL COST INCL COMMISSIONS</th>
                                    <td>".(int)$landcostcom." INR</td>
                                  </tr>
                                   <tr>
                                   <th>ACTUAL FLIGHT COST</th>
                                   <td>".(int)$flightprice." INR</td>
                                  </tr>
                                  <tr>
                                   <th>PROPOSED FLIGHT COST</th>
                                   <td>".(int)$flpriceloaded." INR</td>
                                  </tr>
                                  <tr>
                                   <th>SERVICE TAX</th>
                                   <td>".(int)$ser_tax_val." INR</td>
                                  </tr>
                                   <tr>
                                   <th>VISA COST</th>
                                   <td>".(int)$visa." INR</td>
                                  </tr>
                                   <tr>
                                   <th>TRAVEL INSURANCE</th>
                                   <td>".(int)$tra_ins." INR</td>
                                  </tr>
                                  <tr>
                                   <th>TOTAL LAND PACKAGE COST</th>
                                   <td><b style='color:red;'>".(int)$totcost." INR</b></td>
                                  </tr>
                                  <tr>
                                   <th>TOTAL LAND PACKAGE COST INCLUDING FLIGHTS</th>
                                   <td><b style='color:red;'>".(int)$totcostfl." INR</b></td>
                                  </tr>
                     </table>
                 </div>


";




?>

	  </div>
	</div>
	
		<br>
		<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title">NET COMMISSIONS</h3>
	  </div>
	  <div class="panel-body">
	    <?php

      $totprofit = $gghpercval + $ser_tax_val +$flightloadval ;
	    	echo "

			<div class='row'>
              <table class='table table-hover table-list' style='background-color: white;'>
                                  <tr>
                                   <th>COM RAW</th>
                                   <td>".(int)$gghpercval." INR</td>
                                  </tr>
                                  <tr>
                                   <th>PROFIT ON SERVICE TAX</th>
                                   <td>".(int)$ser_tax_val." INR </td>
                                  </tr>
                                   <tr>
                                   <th>ADS PROFIT</th>
                                   <td>".(int)$flightloadval." INR</td>
                                  </tr>
                                   <tr>
                                   <th>TOTAL PROFIT</th>
                                   <td><b style='color:green;'>".(int)$totprofit." INR</b></td>
                                  </tr>
              </table>
            </div>
                                 


	    	";

	    ?>
	</div>
	</div>
	<br>
	
		
	<br>
		

</div>

</div>











</body>
</html>