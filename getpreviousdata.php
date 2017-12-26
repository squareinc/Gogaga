<?php

include "config.php";
$refno = $_POST["refno"];

if (isset($refno)) {
	$query = "SELECT * FROM itdaywise WHERE ghrnno = '".$refno."' ORDER BY rowno ";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
    	$i=1;
    	while($row=mysqli_fetch_assoc($result)){
    		//echo $row["day"];
    		//echo "<br>";
    		//echo $row["description"];
    		//$response_array['day'] = $row["day"];
    		//$response_array['description'] = $row["description"];
    		$rows[] = $row;
    	}

    	//now encode it in JSON format and send back to the page
    	header('Content-type: pagelication/json');
		print json_encode($rows);
		
  
	}else {
		echo "error getting data";
		/*$response_array['status'] = 'error';
		  header('Content-type: application/json');
		  echo json_encode($response_array);*/
	}
}else{
	echo "please provide valid refno";
}




?>