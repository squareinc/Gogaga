<?php

include "config.php";

if(isset($_POST["ref"])&&isset($_POST["reason"])){
	$ref = $_POST["ref"];
	$reason = $_POST["reason"];
	//echo "ref no:".$ref;
	$reason = mysqli_real_escape_string($conn,$reason);
	$sql = "UPDATE agent_form_data SET salesmanager = '$reason', remarkstatus = 'accepted' WHERE ref_num = '$ref'";

	if (($conn->query($sql))== true){
       //echo "<p>success</p>";
		  $response_array['status'] = 'success';
		  header('Content-type: application/json');
		  echo json_encode($response_array);
		  //header('Location:dashboard.php#/itsubmitted');
	
    }

   else{
      //echo "<p>Error</p>";
   		 $response_array['status'] = 'error';
		  header('Content-type: application/json');
		  echo json_encode($response_array);
	
   }
}else{
	$response_array['status'] = 'error';
		  header('Content-type: application/json');
		  echo json_encode($response_array);
	
}




?>