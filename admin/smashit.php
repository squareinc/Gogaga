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
}

if(isset($_GET["q"]))
{	$status ="smashed";
	$refnum = $_GET["q"];
}	
elseif (isset($_GET["qr"])) 
{	$status ="pending";
	$refnum = $_GET["qr"];
}
$sqlset ="UPDATE agent_form_data 
		  SET formstatus = '".$status."',
		  	  currently_worked_by ='None'
  		  WHERE ref_num = ".$refnum." ";

			if(($conn->query($sqlset))== true)
			{
				if($status =='pending')
				{
					echo "Restored successfully<br>";
					header('Location:dashboard.php#/itsmashed');
				}
				else
				{
					echo "Smashed successfully<br>";
					header('Location:dashboard.php#/itpending');
				}

			}
			else
				echo "Not Perfomed successfully";


?>