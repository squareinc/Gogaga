<?php
//gets an image id from another page.. it then processes and if found deletes it

include "config.php";
$target_dir = "../".dirname(__DIR__)."/stuff/";
$imagepath = $_GET["imgpath"];
$imagename = $_GET["imgname"];

if(isset($imagepath)&&isset($imagename)){
	//imagepath is given via the URL
	//now delete it from the database
	//then delete it manually from the folder i.e., delete the file
	 $imagepath = urldecode($imagepath);
	 //$imagename = explode('/', $imagepath);
	$sql = "DELETE FROM `holiday_images` WHERE imgname = '$imagename'";
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
		  	header('Location:dashboard.php#/gallery');
		  }
    }else{
    	echo "Image Cannot be Removed From Database";
    }


}






?>