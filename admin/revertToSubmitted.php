<?php

//get params

require("config.php");

$ref_value = $_GET["q"];

if (isset($ref_value)) {
	//it is set
	$sql = "UPDATE `agent_form_data` SET `formstatus` = 'submitted' WHERE `agent_form_data`.`ref_num` = '$ref_value'";

	//$res = $conn->query($sql);
     if ($conn->query($sql) == true){
     	//success
     	//echo "success";
     	header('Location: dashboard.php#/case');
     }else{
     	//error
     	//echo "error";
     }
}
else{
	//echo "error";
}






?>