<?php
include "../config.php";
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
	   		header('Location:itinerary_work.php');	
 				

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