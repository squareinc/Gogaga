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

    if($handle_type!="Both")
	  header('Location:../index.php');
}

if(isset($_GET["uid"]))
{	//$us ="smashed";
	$userid = $_GET["uid"];
}	
$sqlset ="UPDATE login 
		  SET password = '".md5($userid)."'
  		  WHERE userid = '".$userid."' ";

			if(($conn->query($sqlset))== true)
			{
			  header('Location:dashboard.php#/account_settings');
			}
			else
				echo "$userid , $  Not Perfomed successfully";


?>