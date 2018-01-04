<?php

include "config.php";
$sno = $_POST["sno"];

//super partner's sno is provided
//using this number get all his holiday partners

if(isset($sno)){
	$query = "SELECT sno, name FROM salespartners WHERE holiday_partner_sno = '".$sno."' ORDER BY sno ";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
    	//we got some results.. display them in html format..
    	echo "<option value=''>Select Sales Partner</option>";
    	while($row=mysqli_fetch_assoc($result)){

    		echo "<option value='".$row["sno"]."'>".$row["name"]."</option>";
    	}

    }else{
    	echo "<option value=''>No Sales Partner</option>";
    }

}




?>