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
    $type = $_SESSION["type"];
    $handle_type =$_SESSION["handle_type"];

if($handle_type != "Both")
	header('Location:../index.php');
}

if (isset($_GET["qr"])&&isset($_GET["t"])) 
{	
	$refnum = $_GET["qr"];
	$reftype = $_GET["t"];
	
$sqlset ="UPDATE agent_form_data 
		  SET payment_status = 'paid'
  		  WHERE ref_num = ".$refnum." ";

			if(($conn->query($sqlset))== true)
			{
				//successful in updating 
				//now update individual hotels and flights

				//check if reftype is domestic or international
				if($reftype == "Domestic"){
					//domestic hotels

					$sql ="UPDATE hotels_domestic 
					  SET status = 'paid'
			  		  WHERE ghrno = ".$refnum." ";

			  		  if(($conn->query($sql))== true)
						{
							//successfully updated status to paid in domestic hotels
							//echo "";
						}

						//now update the transport payment
					$sql4 ="UPDATE itinerary_domestic 
					  SET transpstatus = 'paid'
			  		  WHERE ghrnno = ".$refnum." ";

			  		  if(($conn->query($sql4))== true)
						{
							//successfully updated status to paid in domestic hotels
							//echo "";
						}

					//now update the travel insurance payment
					$sql4 ="UPDATE itinerary_domestic 
					  SET travinsstatus = 'paid'
			  		  WHERE ghrnno = ".$refnum." ";

			  		  if(($conn->query($sql4))== true)
						{
							//successfully updated status to paid in domestic hotels
							//echo "";
						}

					//now update the travel insurance payment
					$sql4 ="UPDATE itinerary_domestic 
					  SET paidstatus = 'paid'
			  		  WHERE ghrnno = ".$refnum." ";

			  		  if(($conn->query($sql4))== true)
						{
							//successfully updated status to paid in domestic hotels
							//echo "";
						}						

				}else if($reftype == "International"){
					//international hotels

					$sql2 ="UPDATE hotels_inter 
					  SET status = 'paid'
			  		  WHERE ghrnno = ".$refnum." ";

			  		  if(($conn->query($sql2))== true)
						{
							//successfully updated status to paid in domestic hotels
						}

							//now update the transport payment
					$sql4 ="UPDATE itinerary_inter 
					  SET transpstatus = 'paid'
			  		  WHERE ghrno = ".$refnum." ";

			  		  if(($conn->query($sql4))== true)
						{
							//successfully updated status to paid in domestic hotels
							//echo "";
						}

					//now update the travel insurance payment
					$sql4 ="UPDATE itinerary_inter 
					  SET travinsstatus = 'paid'
			  		  WHERE ghrno = ".$refnum." ";

			  		  if(($conn->query($sql4))== true)
						{
							//successfully updated status to paid in domestic hotels
							//echo "";
						}

					//now update the remittance payment
					$sql4 ="UPDATE itinerary_inter 
					  SET remitstatus = 'paid'
			  		  WHERE ghrno = ".$refnum." ";

			  		  if(($conn->query($sql4))== true)
						{
							//successfully updated status to paid in domestic hotels
							//echo "";
						}

					//now update the travel insurance payment
					$sql4 ="UPDATE itinerary_inter 
					  SET visastatus = 'paid'
			  		  WHERE ghrno = ".$refnum." ";

			  		  if(($conn->query($sql4))== true)
						{
							//successfully updated status to paid in domestic hotels
							//echo "";
						}

					//now update the travel insurance payment
					$sql4 ="UPDATE itinerary_inter 
					  SET cruisestatus = 'paid'
			  		  WHERE ghrno = ".$refnum." ";

			  		  if(($conn->query($sql4))== true)
						{
							//successfully updated status to paid in domestic hotels
							//echo "";
						}

					//now update the travel insurance payment
					$sql4 ="UPDATE itinerary_inter 
					  SET addserstatus = 'paid'
			  		  WHERE ghrno = ".$refnum." ";

			  		  if(($conn->query($sql4))== true)
						{
							//successfully updated status to paid in domestic hotels
							//echo "";
						}

					//now update the travel insurance payment
					$sql4 ="UPDATE itinerary_inter 
					  SET paidstatus = 'paid'
			  		  WHERE ghrno = ".$refnum." ";

			  		  if(($conn->query($sql4))== true)
						{
							//successfully updated status to paid in domestic hotels
							//echo "";
						}

				}
				
				//now update the flights payments

				$sql3 ="UPDATE flights_info 
					  SET flightstatus = 'paid'
			  		  WHERE ghrno = ".$refnum." ";

			  		  if(($conn->query($sql3))== true)
						{
							//successfully updated status to paid in domestic hotels
						}

				header('Location:dashboard.php#/case');
			}
			else
				echo "Not Paid successfully";
}


?>