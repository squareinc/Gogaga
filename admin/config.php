 <?php
 // define variables and set to empty values
$servername = "localhost";
$username = "gogagx2b_test";
$password = "78600786";
$db_name  = "gogagx2b_test";
// Create connection


try
{
if($conn = new mysqli($servername, $username, $password,$db_name) or die("Failed to connect database"))
	{
	
	}
else
	throw new Exception('Unable to connect');
}

catch(Exception $e)

{

    echo $e->getMessage();

}


?>

