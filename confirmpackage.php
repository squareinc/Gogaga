<?php
include "config.php";
if(isset($_GET["qr"]))
{
	session_start();
	$userid = $_SESSION["userid"];
	$ref_value = $_GET["qr"];

	$cur_year = date("Y");
	$cur_month = date("m");

   $sql = "SELECT * FROM agent_form_data 
   			WHERE ref_num = '".$ref_value."'";
   $res = $conn->query($sql);
   if ($res->num_rows) 
   {  
	   if($row = $res->fetch_assoc()) 
	   {	 $ref_type = $row["holi_type"];
			 $holi_dest = $row["holi_dest"];
			 $client_name = $row["cust_firstname"]." ".$row["cust_lastname"];

	   		if ($row["currently_worked_by"] == $userid)
	   		{

				if($ref_type=="International")
				{
				        // START OF ITCONVERTED
				        $sql = "SELECT * FROM itinerary_inter WHERE ghrno = '$ref_value'";
				        $res = $conn->query($sql) ;
				        if ($res->num_rows) 
				        {     
				           if($row = $res->fetch_assoc()) 
				           {  
				           		// Start of commissions initializations

							//ghrno commamt sup hol sal holitype holidest clientname
							//sno vchmon status

								$supname = $row["supname"];
								$supperc = $row["supperc"];
								$holiname = $row["holiname"];
								$holiperc = $row["holiperc"]; 
								$salname = $row["salname"];
								$salperc = $row["salperc"];
								$salname = $row["salname"];




				           		// End of commissions initializations
				                $itconv = (int)$row["itconv"];
				                $itquoted = (int)$row["itquoted"];
				                $ivconv = (int)$row["ivconv"];
				                $ivquoted = (int)$row["ivquoted"];

                                          $landcost = (float)$row["landcost"]; // Land cost
                                          $gghperc = (float)$row["gghperc"]; // Gogaga Commmission
                                          $gghpercval = ($gghperc/100) * $landcost; // Total Cost Commisions
                                          $landcostcom = $landcost + $gghpercval; 

                                          $flightprice = (float)$row["flightprice"]; // Flight Price
                                          $flight_loadperc = (float)$row["flight_loadperc"];   $flightloadval = ($flight_loadperc/100)*$flightprice;
                                         
                                          $ser_tax_perc = (float)$row["ser_tax_perc"]; 
                                          $ser_tax_val = ($ser_tax_perc/100)*$landcostcom; // Service Tax

				                
				                 $totprofit = $gghpercval + $ser_tax_val +$flightloadval ;

				                
				                if($itconv == 0 && $itconv <= $itquoted)
				                {
				                  $ivconv =$ivquoted;

				                }
				                else
				                {
				                  $ivconv = 0;
				                   $totprofit = 0;
				                }


				                if($itconv == 0)
				                {
				                    $sql ="UPDATE user_monthly_data 
				                                   SET itc".$cur_month." = itc".$cur_month." +1";
				                                   if($ivconv!=0)
				                                    $sql.=",ivc".$cur_month." = ivc".$cur_month." + ".$ivconv."  , pr".$cur_month." = pr".$cur_month." + ".$totprofit."  ";
				                                   $sql.="WHERE userid = '".$userid."' AND year = '".$cur_year."'
				                                    ";
				                            if(($conn->query($sql))== true)
				                            {

				                            }  

				                }
				                else
				                {

				                }


				                 $sql ="UPDATE itinerary_inter 	
				                                   SET itconv = itconv +1 , ivconv = ".$ivconv."
				                                   WHERE ghrno = '".$ref_value."'
				                                    ";
				                            if(($conn->query($sql))== true)
				                            {

				                            	 $sql ="UPDATE agent_form_data 	
				                                   SET formstatus = 'confirmed'
				                                   WHERE ref_num = '".$ref_value."'
				                                    ";
						                            if(($conn->query($sql))== true)
						                            {

						                            }
						                    }









				         }

				         header('Location:dashboard.php#/case');               

				    }
			    }
			    elseif($ref_type=="Domestic")
				{
				        // START OF ITCONVERTED
				        $sql = "SELECT * FROM itinerary_domestic WHERE ghrnno = '$ref_value'";
				        $res = $conn->query($sql) ;
				        if ($res->num_rows) 
				        {     
				           if($row = $res->fetch_assoc()) 
				           {  

							//ghrno commamt sup hol sal
							//sno	clientname	holitype holidest vchmon status

								$supname = $row["supname"];
								$supperc = $row["supperc"];
								$holiname = $row["holiname"];
								$holiperc = $row["holiperc"]; 
								$salname = $row["salname"];
								$salperc = $row["salperc"];
								$salname = $row["salname"];




				                $itconv = (int)$row["itconv"];
				                $itquoted = (int)$row["itquoted"];
				                $ivconv = (int)$row["ivconv"];
				                $ivquoted = (int)$row["ivquoted"];

				                   $landcost = (float)$row["landcost"]; // Land cost
                                          $gghperc = (float)$row["gghperc"]; // Gogaga Commmission
                                          $gghpercval = ($gghperc/100) * $landcost; // Total Cost Commisions
                                          $landcostcom = $landcost + $gghpercval; 

                                          $flightprice = (float)$row["flightprice"]; // Flight Price
                                          $flight_loadperc = (float)$row["flight_loadperc"];   $flightloadval = ($flight_loadperc/100)*$flightprice;
                                         
                                          $ser_tax_perc = (float)$row["ser_tax_perc"]; 
                                          $ser_tax_val = ($ser_tax_perc/100)*$landcostcom; // Service Tax
                            
				                
				                 $totprofit = $gghpercval + $ser_tax_val +$flightloadval ;

				                
				                if($itconv == 0 && $itconv <= $itquoted)
				                {
				                  $ivconv =$ivquoted;
				                }
				                else
				                {
				                  $ivconv = 0;
				                  $totprofit = 0;
				                }


				                if($itconv == 0)
				                {
				                    $sql ="UPDATE user_monthly_data 
				                                   SET itc".$cur_month." = itc".$cur_month." +1";
				                                   if($ivconv!=0)
				                                    $sql.=",ivc".$cur_month." = ivc".$cur_month." + ".$ivconv."  , pr".$cur_month." = pr".$cur_month." + ".$totprofit."  ";
				                                   $sql.="WHERE userid = '".$userid."' AND year = '".$cur_year."'
				                                    ";
				                            if(($conn->query($sql))== true)
				                            {

				                            }  

				                }
				                else
				                {

				                }


				                 $sql ="UPDATE itinerary_domestic 	
				                                   SET itconv = itconv +1 , ivconv = ".$ivconv."
				                                   WHERE ghrnno = '".$ref_value."'
				                                    ";
				                            if(($conn->query($sql))== true)
				                            {

				                            	 $sql ="UPDATE agent_form_data 	
				                                   SET formstatus = 'confirmed'
				                                   WHERE ref_num = '".$ref_value."'
				                                    ";
						                            if(($conn->query($sql))== true)
						                            {

						                            }
						                    }









				         }

				         header('Location:dashboard.php#/case');               

				    }
			    }
				        // END OF DOMESTIC IF
			    else
			    {

			    }


			}

			 $sql ="UPDATE agent_form_data 	
				    SET  payment_status = 'unpaid'
				    WHERE ref_num = '".$ref_value."'
				      ";
			 if(($conn->query($sql))== true) {


			 	$commperc = (float)$supperc + (float)$holiperc + (float)$salperc;
			 	$commamt = ($commperc/100)*$landcostcom;
			 	$tdsperc = 5;

			 	$supamt = ($supperc/100)*$landcostcom;
			 	$holiamt = ($holiperc/100)*$landcostcom;
			 	$salamt = ($salperc/100)*$landcostcom;

			 	$supamt = $supamt - ($tds/100)*$supamt;
			 	$holiamt = $holiamt - ($tds/100)*$holiamt;
			 	$salamt = $salamt - ($tds/100)*$salamt;

			 	$commamt = $commamt - ($tds/100)*$commamt;



			 $sql ="INSERT INTO commissions
			 	(ghrno, clientname, holitype, holidest, commamt, sup, hol, sal, status) 
			 	VALUES ('".$ref_value."','".$client_name."','".$ref_type."','".$holi_dest."','".$commamt."','".$supamt."','".$holiamt."','".$salamt."','pending')";
			 if(($conn->query($sql))== true) {
			 				header('Location:dashboard.php#/case');
			 			}
			 			else
			 			{
			 				header('Location:dashbo2ard.php#/case2');
			 			}







			 }
				                            

	   }
				
			else
				header('Location:error.php');		
 				






	   }
    }
    




?>