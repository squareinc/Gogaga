<?php
//gets an image id from another page.. it then processes and if found deletes it

include "config.php";
$target_dir = "marketingflyers/";
$imagepath = $_GET["imgpath"];

if(isset($imagepath)){
	//imagepath is given via the URL
	//now delete it from the database
	//then delete it manually from the folder i.e., delete the file
	 $imagepath = urldecode($imagepath);
	 $imagename = explode('/', $imagepath);
	 print_r($imagename);
	$sql = "DELETE FROM `marketing_flyers` WHERE `marketing_flyers`.`imgpath` = '".$imagename[2]."'";
	echo $sql;
	if(($conn->query($sql))== true)
    {                       
          //echo "Image Removed From Database Successfully";

          //$target_file = $target_dir.$imagepath;
          //now delete it from file..
          if (!unlink($imagepath))
		  {
		  echo ("Error deleting $imagepath");
		  }
		else
		  {
		  //echo ("Deleted $imagepath");
		  	//after deleting image redirect
		  	header('Location:dashboard.php#/marketingflyers');
		  }
    }else{
    	echo "marketing flyer Cannot be Removed From Database";
    }


}






?>