<?php
include "config.php";
if(isset($_GET["qr"]))
{
	session_start();
	$_SESSION["ref_value"]= $_GET["qr"];
	$userid = $_SESSION["userid"];
	$username = $_SESSION["username"];
	$ref_num = $_SESSION["ref_value"];

   $sql = "SELECT holi_type,currently_worked_by FROM agent_form_data 
   			WHERE ref_num = ".$ref_num."";
   $res = $conn->query($sql);

   if ($res->num_rows) 
   {   
	   if($row = $res->fetch_assoc()) 
	   {	
	   		$_SESSION["ref_type"] = $row["holi_type"];
	   		
			   		if ($row["currently_worked_by"] == "None" )
			   		{
				   		$sql = "UPDATE agent_form_data
				   		 		 SET currently_worked_by = '".$userid."' 
				   		 		 WHERE ref_num = ".$ref_num."";
						 if(($conn->query($sql))== true)
						{
							echo "Success";
						}	
						else
							header('Location:itinerary_error.php');



						date_default_timezone_set('Asia/Kolkata');
						$itinerary_created =  date("d-M-y").",".date("h:i a");
							
							if($row["holi_type"] == "International")
								$sql = "UPDATE itinerary_inter SET itcreated = '".$itinerary_created."', workedby='".$userid."' WHERE ghrno = '".$ref_num."'  ";
							else
								$sql = "UPDATE itinerary_domestic SET itcreated = '".$itinerary_created."' , workedby='".$userid."' WHERE ghrnno = '".$ref_num."' ";

								if(($conn->query($sql))== true)
									header('Location:itinerary_work.php');
								else
								//	echo " Pending Not inserted";
									  header('Location:itinerary_error.php');
					}
					elseif ($row["currently_worked_by"] == $userid)
								header('Location:itinerary_work.php');
					else
							header('Location:itinerary_error.php');		
 				






	   }
    }
    else
	  //  echo "No Row";
   header('Location:itinerary_error.php');

} 
else
//echo "Not GET";   
  header('Location:itinerary_error.php');





?>