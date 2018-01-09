<?php

include "config.php";

if(isset($_GET["q"])){
	$ref = $_GET["q"];

	//$reason = $_POST["reason"];
	//echo "ref no:".$ref;
	//$reason = mysqli_real_escape_string($conn,$reason);

	$sql = "UPDATE agent_form_data SET remarkstatus = 'rejected' WHERE ref_num = '$ref'";

	if (($conn->query($sql))== true){
       //echo "<p>success</p>";
		  /*$response_array['status'] = 'success';
		  header('Content-type: application/json');
		  echo json_encode($response_array);*/

		  header('Location:dashboard.php#/itsalecancelled');
	
    }

   else{
      //echo "<p>Error</p>";
   		 /*$response_array['status'] = 'error';
		  header('Content-type: application/json');
		  echo json_encode($response_array);*/
	
   }
}else{
	/*$response_array['status'] = 'error';
		  header('Content-type: application/json');
		  echo json_encode($response_array);*/
	
}




?>