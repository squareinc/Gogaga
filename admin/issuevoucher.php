<?php
include "config.php";
if(isset($_GET["qr"]))
{
	session_start();
	$ref_num =  $_GET["qr"];
	$ref_type =  $_GET["rt"];
	$userid = $_SESSION["userid"];
	
	$issuedon = date("Y-m-d");

	$status = "Pending";

  	   $sql = "SELECT * FROM vouchertable WHERE ref_num = '".$ref_num."' ";
       $res = $conn->query($sql) ;
        if ($res->num_rows) 
         {     
       		if($row = $res->fetch_assoc()) 
              {
              	header('Location:dashboard.php#/voucher');
              }
         }
	else
		{
				$sql = "INSERT INTO vouchertable (ref_num,reftype,userid,issuedon,status)
	 			VALUES('".$ref_num."','".$ref_type."','".$userid."','".$issuedon."','Pending')
				 		";
						if(($conn->query($sql))== true)
						{
						header('Location:dashboard.php#/voucher');
						}
						else
						  header('Location:nopage.php');
		}	
}		

?>