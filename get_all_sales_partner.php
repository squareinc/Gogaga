<?php

include "config.php";
$partnertype = $_POST["partnertype"];

//super partner's sno is provided
//using this number get all his holiday partners

if(isset($partnertype)){
	$query = "SELECT sno, name FROM ".$partnertype." ORDER BY sno ";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
    	//we got some results.. display them in html format..
    	echo "<option value=''>Select ".$partnertype."</option>";
    	while($row=mysqli_fetch_assoc($result)){

    		echo "<option value='".$row["sno"]."'>".$row["name"]."</option>";
    	}

    }else{
    	echo "<option value=''>No ".$partnertype."</option>";
    }

}




?>