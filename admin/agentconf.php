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

if (isset($_GET["qr"])) 
{	
	$refnum = $_GET["qr"];
	
$sqlset ="UPDATE commissions 
		  SET status = 'confirmed'
  		  WHERE ghrno = '".$refnum."' ";

			if(($conn->query($sqlset))== true)
			{
				$sqlset ="UPDATE agent_form_data 
				  SET agent_com = 'confirmed'
		  		  WHERE ref_num = '".$refnum."' ";

					if(($conn->query($sqlset))== true)
					{
						header('Location:dashboard.php#/case');
					}
			}
			else
				echo "Not Paid successfully";
}


?>