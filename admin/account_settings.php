<?php
include "../config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
		if(isset($_POST["crac"]))
		{
			  		$username = $_POST["ad_username"];
					$userid = $_POST["ad_userid"];
					$password =  $_POST["ad_userid"];
					$type =  $_POST["ad_type"];
					$handle_type =  $_POST["ad_handletype"];
					if(!empty($username) && !empty($userid) && !empty($password) && !empty($type) && !empty($handle_type) )
					{

								session_start();
								$password =md5($password);
								
							   $sql = "INSERT INTO login (username,userid,acc_status,password,type,handle_type) 
							   VALUES('".$username."','".$userid."','Active','".$password."','".$type."','".$handle_type."')";
							   if(($conn->query($sql))== true)
							  	{
								   		$cur_year = date('Y');
								   		echo "Account created successfully";

										   $sql = "INSERT INTO user_monthly_data (userid,year) 
										   VALUES('".$userid."','".$cur_year."')";
										   if(($conn->query($sql)) == true)
										   {
										   	echo "Added user_monthly_data";
										   }


				  			    }
								else
								{
										
									echo "Account not created";
								}
					}
					else
						echo "Empty fields error";
			echo "<a href='dashboard.php#/create_user'>Click here to go back</a>";	

		}
		elseif (isset($_POST["endis"]))
		{		
				$userid = $_POST["endisuser"];
				$but = $_POST["endis"];
				echo "User id -$userid<br>";
				echo "Button Clicked  -$but<br>";
					if($but=="Enable")
						$stat = "Active";
					else
						$stat ="Inactive";

				$sql = "UPDATE login SET acc_status ='".$stat."' WHERE userid = '".$userid."'";

				  if(($conn->query($sql))== true)
				  	{
					 		 header('Location:dashboard.php#/account_settings');
				    }
				   else
						echo "<br>Failed Update<a href='dashboard.php#/account_settings'>Click here to go back</a>";		    

		}
		else
		{
			echo "Nothing happened";
			//header('Location:unkownpasge.php');
		}



}
else
{
	echo "-";
}




?>